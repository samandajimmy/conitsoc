<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class User extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        $this->load->model('userModel');
    }

    public function index() {
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 0) {
            redirect('user/adminDashboard');
        } else {
            $this->load->helper('form');
            $data['notif'] = $this->session->flashdata('notif');
            $this->load->view('loginPage', $data);
        }
    }

    public function adminDashboard() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['title'] = 'Dashboard';
        $data['view'] = 'admin/dashboard';
        $this->load->view('templateAdmin', $data);
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
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 0) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['action'] = site_url('user/userSave');
            $data['title'] = 'Input User';
            $data['view'] = 'admin/inputUser';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function userSave() {
        $user = array(
            'username' => $this->input->post('username'),
            'password' => do_hash($this->input->post('password'), 'MD5'),
            'email' => $this->input->post('email'),
            'hash' => do_hash(rand(0, 1000), 'MD5'),
            'tipeUser' => 0,
        );
        $checkUsername = $this->userModel->getSameName($user['username']);
        $checkEmail = $this->userModel->getSameEmail($user['email']);
        if ($checkUsername) {
            if ($checkEmail) {
                $idUser = $this->userModel->saveUser($id, $user);
                $this->userSendingEmail($idUser);
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

    public function userActivation() {
        $email = $this->uri->segment(3);
        $hash = $this->uri->segment(4);
        if ($email && $hash) {
            $this->db->select('isActive');
            $this->db->from('user');
            $this->db->where('email', $email);
            $query = $this->db->get();
            $data = $query->result();
            $act = $data[0]->isActive;
            if ($data) {
                if ($act == 0) {
                    $this->db->update('user', array('isActive' => 1), array('email' => $email, 'hash' => $hash));
					$this->session->set_flashdata('notif', 'Terima kasih, account anda telah aktif. Nikmati kepuasan berbelanja online bersama conitso.com');
					redirect('page/home');
                } else {
					$this->session->set_flashdata('notif', 'account anda telah aktif sebelumnya. Nikmati kepuasan berbelanja online bersama conitso.com');
					redirect('page/home');
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

    public function userRegis() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('user/userSave');
        $data['title'] = 'Input User';
        $data['view'] = 'user/register';
        $this->load->view('templateUser', $data);
    }

}
