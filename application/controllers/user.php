<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel');
        $this->load->model('pemesananModel');
        $this->load->model('produkModel');
    }

    public function index() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == -1) {
            redirect('user/adminDashboard');
        } else {
            $this->load->helper('form');
            $data['notif'] = $this->session->flashdata('notif');
            $this->load->view('loginPage', $data);
        }
    }

    public function view_customer() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == -1) {
            if ($_POST) {
                $data['user'] = $this->userModel->get_filter_user($_POST);
            } else {
                $data['user'] = $this->userModel->get_all_customer();
            }
            $data['notif'] = $this->session->flashdata('notif');
            $data['provinsi'] = $this->userModel->get_provinsi_drop();
            $data['kota'] = $this->userModel->get_kota_drop(0);
            $data['action'] = site_url('user/userSave');
            $data['title'] = 'Customer';
            $data['view'] = 'admin/view_customer';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function get_user_ajax($id_user) {
        header('Content-Type: application/x-json; charset=utf-8');
        $param = $this->userModel->get_all_user_detail($id_user);
        $data = $param[0];
        echo(json_encode($data));
    }

    public function adminDashboard() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['latest_cust'] = $this->userModel->get_latest_customer(7);
            $data['latest_order'] = $this->pemesananModel->get_latest_order(14);
            $data['latest_confirm'] = $this->pemesananModel->get_latest_confirm(14);
            $data['latest_produk'] = $this->produkModel->get_latest_produk(7);
            $data['title'] = 'Dashboard';
            $data['view'] = 'admin/dashboard';
            $this->load->view('templateAdmin', $data);
        } else {
            redirect('user');
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
                    $this->session->set_flashdata('notif', 'Password yang anda masukkan salah');
                }
            } else {
                $respond = 2;
                $this->session->set_flashdata('notif', 'Anda belum melakukan aktivasi account');
            }
        } else {
            $repond = 3;
            $this->session->set_flashdata('notif', 'Username tidak terdaftar');
        }
        return $respond;
    }

    public function userLogin() {
//retrieve post value
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        switch ($this->_authenticate($username, $password)) {
            case 0:
                redirect('user');
                break;
            case 1:
                $this->session->set_flashdata('notif', 'Selamat datang!!');
                redirect('user/adminDashboard');
                break;
            case 2:
                redirect('user');
                break;
            case 3:
                redirect('user');
                break;
        }
    }

    //logout action
    public function userLogout() {
        $this->session->unset_userdata();
        $this->session->sess_destroy();
        redirect('user');
    }

    public function userInput() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == -1) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['user'] = $this->userModel->get_all_admin();
            $data['action'] = site_url('user/userSave');
            $data['action1'] = site_url('user/userSave');
            $data['title'] = 'Input User';
            $data['view'] = 'admin/inputUser';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function userSave() {
        $curr_date = date("Y-m-d H:i:s");
        $user = array(
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'), 'MD5'),
            'email' => $this->input->post('email'),
            'hash' => do_hash($curr_date, 'MD5'),
            'tipeUser' => $this->input->post('tipeUser'),
            'created_date' => $curr_date,
            'created_by' => $this->session->userdata('id'),
        );
        $checkUsername = $this->userModel->getSameName($user['username']);
        $checkEmail = $this->userModel->getSameEmail($user['email']);
        if ($checkUsername) {
            if ($checkEmail) {
                $idUser = $this->userModel->saveUser($id, $user);
                $this->userModel->userSendingEmail($idUser);
                redirect('user/userInput');
            } else {
                $this->session->set_flashdata('notif', 'email telah digunakan');
                redirect('user/userInput');
            }
        } else {
            $this->session->set_flashdata('notif', 'username telah digunakan');
            redirect('user/userInput');
        }
    }

    public function email_activation() {
        $id_user = $this->uri->segment(3);
        $hash = $this->uri->segment(4);
        if ($id_user && $hash) {
            $user = $this->userModel->getUserDetail($id_user);
            if (isset($user)) {
                if ($user[0]->hash == $hash) {
                    $this->db->update('user', array('isActive' => 1, 'hash' => ''), array('id' => $id_user, 'hash' => $hash));
                    if ($user[0]->tipeUser == 1) {
                        $this->session->set_flashdata('notif', 'Terima kasih, account anda telah aktif. Nikmati kepuasan berbelanja online bersama conitso.com');
                        redirect('page/home');
                    } else {
                        $this->session->set_flashdata('notif', 'Terima kasih, account anda telah aktif.');
                        redirect('user');
                    }
                } else {
                    $this->session->set_flashdata('notif', 'account anda telah aktif sebelumnya.');
                    if ($user[0]->tipeUser == 1) {
                        redirect('page/home');
                    } else {
                        redirect('user');
                    }
                }
            } else {
                $this->session->set_flashdata('notif', 'Terima kasih, account anda tidak terdaftar silahkan lakukan registrasi');
                redirect('page/home');
            }
        } else {
            $this->session->set_flashdata('notif', 'you have an error page here');
            redirect('page/home');
        }
    }

}
