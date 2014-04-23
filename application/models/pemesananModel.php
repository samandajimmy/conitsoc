<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PemesananModel extends CI_Model {

    private $tab_category = 'kategori';
    private $tab_customer = 'customer';
    private $tab_items = 'pemesanan_produk';
    private $tab_orders = 'pemesanan';
    private $tab_products = 'produk';
    private $tab_status = 'statuspemesanan';
    private $tab_user = 'user';

    public function pesanan_available($id, $id_user) {
        $return = FALSE;
        $this->db->where('id', $id);
        $this->db->where('is_confirm', 0);
        $this->db->where('idUser', $id_user);
        $query = $this->db->get('pemesanan');
        if ($query->num_rows() > 0) {
            $return = TRUE;
        }
        return $return;
    }

    public function get_all_pesanan() {
        $this->db->select('p.*');
        $this->db->select('s.tarif');
        $this->db->select('s.id_state');
        $this->db->select('s.id_city');
        $this->db->select('u.username');
        $this->db->select('u.email');
        $this->db->select('sp.namaStatus');
        $this->db->from('pemesanan AS p');
        $this->db->join('shipping AS s', 'p.idShipping = s.id', 'inner');
        $this->db->join('user AS u', 'p.idUser = u.id', 'inner');
        $this->db->join('statuspemesanan AS sp', 'p.idStatus = sp.id', 'inner');
        if ($_POST) {
            if ($_POST['ID'])
                $this->db->like('p.noPemesanan', $_POST['ID']);
            if ($_POST['status'])
                $this->db->where('p.idStatus', $_POST['status']);
            if ($_POST['konfirmasi'])
                $this->db->where('p.is_confirm', $_POST['konfirmasi']);
            if ($_POST['email'])
                $this->db->like('u.email', $_POST['email']);
            if ($_POST['date']['from'] && $_POST['date']['to']) {
                $this->db->where('p.tglPemesanan >=', $_POST['date']['from']);
                $this->db->where('p.tglPemesanan <=', $_POST['date']['to']);
            }
            if ($_POST['range']['from'] && $_POST['range']['to']) {
                $this->db->where('p.biayaPemesanan >=' . $_POST['range']['from']);
                $this->db->where('p.biayaPemesanan <=' . $_POST['range']['to']);
            }
        }
        $this->db->order_by('p.date_confirm DESC, p.tglPemesanan DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_status_drop() {
        $query = $this->db->get('statuspemesanan');
        $data[''] = 'Pilih satu';
        if ($query->result()) {
            foreach ($query->result() as $row) {
                $data[$row->id] = $row->namaStatus;
            }
        }
        return $data;
    }

    public function send_invoice_email($id) {
        $config = Array(
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_port' => 465,
            'smtp_user' => "samandajimmyr@gmail.com",
            'smtp_pass' => "superbubur",
            'mailtype' => "html",
            'charset' => 'utf-8',
            'wordwrap' => 'false',
            'priority' => '1'
        );
        $data['detail'] = $this->get_pemesanan_detail($id);
        $data['produk'] = $this->getItemsList($id);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $msg = $this->load->view('user/email', $data, true);
        $this->email->from('samandajimmyr@gmail.com', 'Jimmy Samanda');
        $this->email->to($data['detail'][0]->email);
        $this->email->subject('Conitso Online Invoice');
        $this->email->message($msg);
        $this->email->send();
        $this->generate_invoice_pdf($id);
    }

    public function generate_invoice_pdf($id) {
        $data['detail'] = $this->get_pemesanan_detail($id);
        $data['produk'] = $this->getItemsList($id);
        $html = $this->load->view('user/email', $data, true);
        $this->load->library('pdf');
        $file_location = FCPATH . '\invoice\invoice-' . $data['detail'][0]->noPemesanan . '.pdf';
        ini_set('memory_limit', '32M');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($file_location, 'F'); // save to file because we can
    }

    public function get_pemesanan_detail($id) {
        $this->db->select('*');
        $this->db->select('pemesanan.id AS id_pemesanan');
        $this->db->from('pemesanan');
        $this->db->join('statuspemesanan', 'pemesanan.idStatus = statuspemesanan.id', 'inner');
        $this->db->join('shipping', 'pemesanan.idShipping = shipping.id', 'inner');
        $this->db->where('pemesanan.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_city_name($id) {
        $query = $this->db->get_where('master_city', array('city_id' => $id))->result();
        return $query[0]->city_name;
    }

    public function get_state_name($id) {
        $query = $this->db->get_where('master_state', array('state_id' => $id))->result();
        return $query[0]->state_name;
    }
    
    public function get_email_user($id) {
        $query = $this->db->get_where('user', array('id' => $id))->result();
        return $query[0]->email;
    }

    public function get_cust_detail($id, $is_alt) {
        if ($is_alt) {
            $query = $this->db->get_where('alt_customer', array('id' => $id));
        } else {
            $query = $this->db->get_where('customer', array('id' => $id));
        }
        return $query->result();
    }

    public function get_shipping_detail($id) {
        $query = $this->db->get_where('shipping', array('id' => $id));
        return $query->result();
    }

    public function get_is_alt($id) {
        $query = $this->db->get_where($this->tab_orders, array('id' => $id));
        $data = $query->result();
        return $data[0]->is_alt;
    }

    public function getOrdersDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_orders, array('noPemesanan' => $id));
        return $query->result();
    }

    public function getOrderDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_orders, array('id' => $id));
        return $query->result();
    }

    public function getCustomerOrders($idCustomer) {
        $this->db->select('*');
        $this->db->select('p.id AS id_pemesanan');
        $this->db->from('pemesanan AS p');
        $this->db->join('statuspemesanan AS sp', 'p.idStatus = sp.id', 'inner');
        $this->db->where('p.idUser', $idCustomer);
        $this->db->order_by('p.tglPemesanan', 'desc');
        $this->db->limit(2);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllOrders() {
        $this->db->select('*');
        $this->db->select($this->tab_orders . '.id AS id_pemesanan');
        $this->db->from($this->tab_orders);
        $this->db->join($this->tab_status, $this->tab_orders . '.idStatus = ' . $this->tab_status . '.id', 'inner');
        $this->db->join($this->tab_customer, $this->tab_orders . '.idCustomer = ' . $this->tab_customer . '.id', 'inner');
        $this->db->order_by($this->tab_orders . '.tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getConfirmedOrders() {
        $this->db->select('*');
        $this->db->select($this->tab_orders . '.id AS id_pemesanan');
        $this->db->from($this->tab_orders);
        $this->db->join($this->tab_status, $this->tab_orders . '.idStatus = ' . $this->tab_status . '.id', 'inner');
        $this->db->join($this->tab_customer, $this->tab_orders . '.idCustomer = ' . $this->tab_customer . '.id', 'inner');
        $this->db->where($this->tab_status . '.id = 2');
        $this->db->order_by($this->tab_orders . '.tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNotConfirmedOrders() {
        $this->db->select('*');
        $this->db->select($this->tab_orders . '.id AS id_pemesanan');
        $this->db->from($this->tab_orders);
        $this->db->join($this->tab_status, $this->tab_orders . '.idStatus = ' . $this->tab_status . '.id', 'inner');
        $this->db->join($this->tab_customer, $this->tab_orders . '.idCustomer = ' . $this->tab_customer . '.id', 'inner');
        $this->db->where($this->tab_status . '.id = 1');
        $this->db->order_by($this->tab_orders . '.tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function saveOrders($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_orders, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $result = $this->getOrderDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_orders, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
    }

    public function deleteOrders($id) {
        $result = $this->getOrderDetail($id);
        if (count($result) > 0) {
            $query = $this->db->get_where($this->tab_items, array('idPemesanan' => $id));
            $items = $query->result();
            foreach ($items as $row) {
                $this->db->query('DELETE FROM pemesanan_produk WHERE id=' . $row->id);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM pemesanan WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteOrdersSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getOrderDetail($id);
            if (count($result) > 0) {
                $query = $this->db->get_where($this->tab_items, array('idPemesanan' => $id));
                $items = $query->result();
                foreach ($items as $row) {
                    $this->db->query('DELETE FROM pemesanan_produk WHERE id=' . $row->id);
                }
                $this->db->trans_start();
                $this->db->query('DELETE FROM pemesanan WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function getItemsDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_items, array('id' => $id));
        return $query->result();
    }

    public function get_item_id($id_pesanan) {
        $this->db->where('idPemesanan', $id_pesanan);
        $data = $this->db->get('pemesanan_produk')->result();
        foreach ($data as $row) {
            $param[] = array(
                'id_produk' => $row->idProduk,
                'qty' => $row->jumlahPemesananProduk
            );
        }
        return $param;
    }

    public function getItemsList($idOrders) {
        $this->db->select('*');
        $this->db->select($this->tab_items . '.id AS id_pemprod');
        $this->db->from($this->tab_items);
        $this->db->join($this->tab_products, $this->tab_items . '.idProduk = ' . $this->tab_products . '.id', 'inner');
        $this->db->where($this->tab_items . '.idPemesanan = ' . $idOrders);
        $query = $this->db->get();
        $param = $query->result();
        foreach ($param as $row) {
            $price = $row->hargaProduk;
            if ($row->discountProduk > 0) {
                $price = $row->stlhDiscount;
            }
            $data[] = array(
                'id' => $row->id,
                'qty' => $row->jumlahPemesananProduk,
                'price' => $price,
                'name' => $row->namaProduk,
                'gambar' => $row->gambarProduk,
                'berat' => $row->beratPemesananProduk,
                'subtotal' => $row->hargaPemesananProduk,
                'gambar' => $row->gambarProduk,
                'subtotalberat' => $row->beratPemesananProduk * $row->jumlahPemesananProduk
            );
        }
        return $data;
    }

    public function getItemsOrders($idOrders) {
        $query = $this->db->get_where($this->tab_items, array('idOrders' => $idOrders));
        return $query->result();
    }

    public function saveItems($id, $data) {
        if ($id == NULL) { //save the profile
            $this->load->model('produkModel');
            $this->load->model('kategoriModel');
            $this->load->model('merkModel');
            $prod = $this->produkModel->getProdukDetail($data['idProduk']);
            $kategori = $this->kategoriModel->get_nama_kategori($prod[0]->idKategori);
            $merk = $this->merkModel->get_nama_merk($prod[0]->idMerk);
            $update_qty = $prod[0]->jml_stok - $data['jumlahPemesananProduk'];
            $data['namaProduk'] = $prod[0]->namaProduk;
            $data['hargaProduk'] = $prod[0]->hargaProduk;
            $data['discountProduk'] = $prod[0]->discountProduk;
            $data['stlhDiscount'] = $prod[0]->stlhDiscount;
            $data['gambarProduk'] = $prod[0]->gambarProduk;
            $data['kategori'] = $kategori;
            $data['merk'] = $merk;
            if ($this->db->insert($this->tab_items, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $this->db->update('produk', array('jml_stok' => $update_qty), array('id' => $data['idProduk']));
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_items, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
    }

    public function get_latest_order($day) {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('tglPemesanan BETWEEN NOW() - INTERVAL ' . $day . ' DAY AND NOW()');
        $this->db->order_by('tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function get_latest_confirm($day) {
        $this->db->select('*');
        $this->db->from('pemesanan');
        $this->db->where('date_confirm BETWEEN NOW() - INTERVAL ' . $day . ' DAY AND NOW()');
        $this->db->order_by('date_confirm', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function delete_permanently($id) {
        $result = $this->getOrderDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM pemesanan WHERE id=' . $id);
            $this->db->query('DELETE FROM pemesanan_produk WHERE idPemesanan=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

}

?>
