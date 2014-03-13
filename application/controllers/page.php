<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Page extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        $this->load->model('userModel');
        $this->load->model('kategoriModel');
        $this->load->model('merkModel');
        $this->load->model('produkModel');
        $this->load->model('banner_model');
        $this->load->model('shipping_model');
        $this->load->model('pemesananModel');
    }

    public function index() {

        //print_r($data);
        //die();
        $this->load->view('templateUser', $data);
    }

    public function page_login() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Silahkan Login';
        $data['view'] = 'user/login_page';
        $this->load->view('templateUser', $data);
    }

    public function home() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Home';
        $data['all_produk'] = $this->produkModel->get_best_seller();
        $data['slide_promo'] = 'user/slide_promo';
        $data['slide_best_seller'] = 'user/slide_best_seller';
        $data['slide_hot_product'] = 'user/slide_hot_product';
        $data['view'] = 'user/home';
        $this->load->view('templateUser', $data);
    }

    public function produk_detail($id_produk) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Detail Produk';
        $data['detail_produk'] = $this->produkModel->getProdukDetail($id_produk);
        $data['action'] = site_url('page/keranjang_beli');
        $data['spesifikasi_produk'] = $this->produkModel->get_spesifikasi_produk($id_produk);
        $data['slide_hot_product'] = 'user/slide_hot_product';
        $data['view'] = 'user/produk_detail';
        $this->load->view('templateUser', $data);
    }

    public function download_invoice($id_invoice) {
        if ($id_invoice) {
            $this->load->helper('download');
            $data = file_get_contents(base_url('invoice/invoice-' . $id_invoice . '.pdf'));
            force_download('conitso-invoice-' . $id_invoice . '.pdf', $data);
        }
    }

    public function keranjang_beli($id = NULL, $action = NULL) {
        if ($action == NULL) {
            $action = 'add';
        }
        switch ($action) {
            case 'add':
                if ($id == NULL) {
                    $id = $this->input->post('id_produk');
                    $jml = $this->input->post('unit');
                } else {
                    $jml = '1';
                }
                if ($id > 0) {
                    $prod = $this->produkModel->getProdukDetail($id);
                    $spek = $this->produkModel->get_berat_produk($prod[0]->id);
                    $harga = $prod[0]->hargaProduk;
                    if ($prod[0]->discountProduk > 0) {
                        $harga = $prod[0]->stlhDiscount;
                    }
                    $cart = array(
                        'id' => $id,
                        'qty' => $jml,
                        'price' => $harga,
                        'name' => $prod[0]->namaProduk,
                        'berat' => $spek[0]->isiSpesifikasi,
                        'options' => array(
                            'gambar' => $prod[0]->gambarProduk,
                        ),
                    );
                    $this->cart->insert($cart);
                }
                break;
            case 'update':
                $rowid = $this->input->post('rowid');
                $qty = $this->input->post('jumlah');
                $i = 0;
                while ($i < count($rowid)) {
                    $cart[$i] = array(
                        'rowid' => $rowid[$i],
                        'qty' => $qty[$i],
                    );
                    $i++;
                }
                $this->cart->update($cart);
                redirect('page/keranjang_beli');
                break;
            case 'delete':
                if ($id == -1) {
                    $this->cart->destroy();
                    redirect('page/home');
                } else {
                    $data = array(
                        'rowid' => $id,
                        'qty' => 0,
                    );
                    $this->cart->update($data);
                    redirect('page/keranjang_beli');
                }
                break;
            case 'success':
                $data['success'] = TRUE;
                $is_alt = $this->pemesananModel->get_is_alt($id);
                $data['pemesanan']['detail'] = $this->pemesananModel->get_pemesanan_detail($id, $is_alt);
                $data['pemesanan']['produk'] = $this->pemesananModel->getItemsList($id);
        }
        $data['notif'] = $this->session->flashdata('notif');
        $data['cart'] = $this->cart->contents();
        $data['action'] = site_url('page/keranjang_beli/-1/update');
        $data['title'] = 'Keranjang Belanja Anda';
        $data['view'] = 'user/keranjang_belanja';
        $this->load->view('templateUser', $data);
    }

    public function transaksi_selesai() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Terima Kasih';
        $data['view'] = 'user/transaksi_selesai';
        $this->load->view('templateUser', $data);
    }

    public function pesan_produk() {
        $cart = $this->cart->contents();
//$this->session->userdata('logged_in') && 
        if ($cart != NULL) {
            $data['pesanan'] = $this->cart->contents();
            //$data['customer'] = $this->customerModel->getCustomerDetail($this->session->userdata('id'));
            $data['title'] = 'Informasi Pesanan';
            $data['view'] = 'user/pesan_produk';
            print_r($data);
            die();
            $this->load->view('templateUser', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda belum memiliki akun, silahkan daftar akun anda sekarang');
            redirect('page/home');
        }
    }

    public function daftar_produk($sort = NULL, $type = NULL) {
        if ($sort != NULL) {
            $data = $this->produkModel->produkPagination('daftar_produk', $sort, $type, $cari = NULL, $price = NULL);
            $data['notif'] = $this->session->flashdata('notif');
            $data['action1'] = site_url('user/productsSearch');
            $data['action2'] = site_url('user/productsPrice');
            $data['produk'] = $data['result'];
            $data['kategori'] = $this->kategoriModel->getAllKategori();
            $data['merk'] = $this->kategoriModel->get_kategori_merk($sort);
            $data['title'] = 'Daftar Produk';
            $data['view'] = 'user/daftar_produk';
            $this->load->view('templateUser', $data);
        } else {
            print_r('cacing');
            die();
            //redirect('user/errorPage');
        }
    }

    public function daftar_pesanan() {
        if ($this->session->userdata('logged_in')) {
            $data['action'] = site_url('#');
            $data['pesanan'] = $this->pemesananModel->getCustomerOrders($this->session->userdata('id'));
        }
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Daftar Pesanan';
        $data['view'] = 'user/daftar_pesanan';
        $this->load->view('templateUser', $data);
    }

    public function shipping_data($id_user = NULL) {
        //header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/x-json; charset=utf-8');
        $is_exist = $this->userModel->is_exist($id_user);
        if (!$is_exist) {
            $data = FALSE;
        } else {
            $data['detail'] = $this->userModel->getProfileDetail($id_user);
            $data['provinsi'] = $this->userModel->get_provinsi_drop();
            if ($data['detail'][0]->provinsi) {
                $data['kota'] = $this->userModel->get_kota_drop($data['detail'][0]->provinsi);
            } else {
                $data['kota'] = $this->userModel->all_kota_drop();
            }
            $data['kota_all'] = $this->userModel->all_kota_drop();
        }
        echo(json_encode($data));
    }

    public function get_kota_drop($id_provinsi = NULL) {
        //header("Access-Control-Allow-Origin: *");
        header('Content-Type: application/x-json; charset=utf-8');
        $data = $this->userModel->get_kota_drop($id_provinsi);
        echo(json_encode($data));
    }

    public function register() {
        $param = 0;
        if ($this->session->userdata('logged_in')) { // logged in
            redirect('');
        } else if ($param) {      // logged in, not activated
            redirect('/auth/send_again/');
        } else {
            $this->form_validation->set_rules('email', 'Email', 'trim|required|xss_clean|valid_email');
            $this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|min_length[5]|max_length[10]|alpha_dash');
            $this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean|alpha_dash');
            $this->form_validation->set_rules('conf_pass', 'Confirm Password', 'trim|required|xss_clean|matches[password]');
            $this->form_validation->set_rules('term', 'Term & Condition', 'required');
            $data['errors'] = array();

            if ($this->form_validation->run()) {
                $user = array(
                    'username' => $this->input->post('username'),
                    'password' => do_hash($this->input->post('password'), 'MD5'),
                    'email' => $this->input->post('email'),
                    'hash' => do_hash(rand(0, 1000), 'MD5'),
                    'tipeUser' => 1,
                );
                $checkUsername = $this->userModel->getSameName($user['username']);
                $checkEmail = $this->userModel->getSameEmail($user['email']);
                if ($checkUsername) {
                    if ($checkEmail) {
                        $idUser = $this->userModel->saveUser($id = NULL, $user);
                        if ($idUser) {
                            $profile = array(
                                'idUser' => $idUser
                            );
                            $this->userModel->saveProfile($id = NULL, $profile);
                            $this->userModel->userSendingEmail($idUser);
                        }
                        redirect('page/home');
                    } else {
                        $this->session->set_flashdata('notif', 'email telah digunakan');
                        redirect('page/register');
                    }
                } else {
                    $this->session->set_flashdata('notif', 'username telah digunakan');
                    redirect('page/register');
                }
            }
            $data['notif'] = $this->session->flashdata('notif');
            $data['title'] = 'Became A Member';
            $data['view'] = 'user/register';
            $data['action'] = '#';
            $this->load->view('templateUser', $data);
        }
    }

    public function checkout() {
        $cart = $this->cart->contents();
        if ($cart) {
            $idUser = $this->input->post('idUser');
            $idCustomer = $this->userModel->get_customer_id($idUser);
            if (!(($this->input->post('provinsi') && $this->input->post('kota')) || ($this->input->post('provinsi1') && $this->input->post('kota1')))) {
                $this->session->set_flashdata('notif', 'silahkan isi provinsi dan kota anda berada terlebih dahulu');
                redirect('page/keranjang_beli/' . $cart['id']);
            }
            if ($_POST['type_address']) {
                $alt_customer = array(
                    'nama_jelas' => $this->input->post('nama_jelas'),
                    'no_telepon' => $this->input->post('no_telepon'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat'),
                    'provinsi' => $this->input->post('provinsi'),
                    'kota' => $this->input->post('kota'),
                    'kode_pos' => $this->input->post('kode_pos'),
                    'idCustomer' => $idCustomer,
                    'idUser' => $idUser,
                );
                $id_alt = $this->userModel->saveAltCustomer($id = NULL, $alt_customer);
                if ($id_alt) {
                    $id_customer = $id_alt;
                    $id_shipping = $this->shipping_model->get_id_shipping($alt_customer['kota']);
                    $is_alt = 1;
                } else {
                    $this->session->set_flashdata('notif', 'data other address gagal disimpan, silahkan tunggu beberapa saat');
                    redirect('page/keranjang_beli/' . $cart['id']);
                }
            } else {
                $profile = array(
                    'nama_jelas' => $this->input->post('nama_jelas1'),
                    'no_telepon' => $this->input->post('no_telepon1'),
                    'jenis_kelamin' => $this->input->post('jenis_kelamin'),
                    'alamat' => $this->input->post('alamat1'),
                    'provinsi' => $this->input->post('provinsi1'),
                    'kota' => $this->input->post('kota1'),
                    'kode_pos' => $this->input->post('kode_pos1'),
                    'idUser' => $idUser,
                );
                $this->userModel->saveProfile($idCustomer, $profile);
                $id_customer = $idCustomer;
                $id_shipping = $this->shipping_model->get_id_shipping($profile['kota']);
                $is_alt = 0;
            }
            if (!$id_shipping) {
                $this->session->set_flashdata('notif', 'kota tujuan anda tidak tersedia silahkan pilih kota tujuan yang tersedia');
                redirect('page/keranjang_beli/' . $cart['id']);
            }
            $tarif = $this->shipping_model->get_tarif_shipping($id_shipping);
            $biaya = $this->cart->total() + ($tarif * $this->cart->totalberat());
            $pesanan = array(
                'noPemesanan' => random_string('nozero', 5),
                'tglPemesanan' => date('Y-m-d H:i:s'),
                'biayaPemesanan' => $biaya,
                'jmlPemesanan' => $this->cart->total_items(),
                'beratPemesanan' => $this->cart->totalberat(),
                'biayaPengiriman' => $tarif * $this->cart->totalberat(),
                'is_alt' => $is_alt,
                'idStatus' => 1,
                'idCustomer' => $id_customer,
                'idUser' => $this->session->userdata('id'),
                'idShipping' => $id_shipping,
            );
            $this->pemesananModel->saveOrders($id, $pesanan);
            $orders = $this->pemesananModel->getOrdersDetail($pesanan['noPemesanan']);
            $i = 0;
            foreach ($cart as $row) {
                $produk[$i] = array(
                    'idPemesanan' => $orders[0]->id,
                    'idProduk' => $row['id'],
                    'jumlahPemesananProduk' => $row['qty'],
                    'hargaPemesananProduk' => $row['subtotal'],
                    'beratPemesananProduk' => $row['berat'],
                );
                $this->pemesananModel->saveItems($id, $produk[$i]);
                $i++;
            }
            $this->cart->destroy();
            $this->pemesananModel->send_invoice_email($orders[0]->id);
            $this->session->set_flashdata('notif', 'Data pesanan anda telah diinputkan, segera lakukan konfirmasi pembayaran untuk menyelesaikan proses transaksi, terima kasih');
            redirect('page/keranjang_beli/' . $orders[0]->id . '/' . 'success');
        }
    }

    //authentication method
    private function _authenticate($username, $password) {
        $query = $this->db->get_where('user', array('username' => $username));
        $res = $query->result();
        $act = $res[0]->isActive;
        if (count($res) == 1) {
            if ($act == 1) {
                if ($res[0]->password == do_hash($password, 'md5')) {
                    $newdata = array(
                        'id' => $res[0]->id,
                        'username' => $res[0]->username,
                        'logged_in' => TRUE,
                        'tipeUser' => $res[0]->tipeUser,
                    );
                    $this->session->set_userdata($newdata);
                    $respond = 1;
                } else {
                    $respond = 0;
                }
            } else {
                $respond = 2;
            }
        } else {
            $respond = 3;
        }
        return $respond;
    }

    public function login() {
//retrieve post value
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        if ($username == NULL || $password == NULL) {
            $this->session->set_flashdata('notif', 'isi username dan password anda terlebih dahulu!!');
            redirect('page/page_login');
        }

        switch ($this->_authenticate($username, $password)) {
            case 0:
                $this->session->set_flashdata('notif', 'password yang anda masukkan salah!!');
                redirect('page/page_login');
                break;
            case 1:
                $this->session->set_flashdata('notif', 'Selamat datang!!');
                redirect('page/home');
                break;
            case 2:
                $this->session->set_flashdata('notif', 'username yang anda masukkan belum melakukan proses aktivasi melalui email!!');
                redirect('page/page_login');
                break;
            case 3:
                $this->session->set_flashdata('notif', 'username yang anda masukkan belum terdaftar, silahkan lakukan registrasi terlebih dahulu!!');
                redirect('page/page_login');
                break;
        }
    }

//logout action
    public function logout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('page/home');
    }

}

?>