<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Spesifikasi extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') == 0) {
            $this->load->model('merkModel');
            $this->load->model('kategoriModel');
            $this->load->model('spesifikasiModel');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function spesifikasiDelete($idSpesifikasi = NULL) {
        $idSpesifikasi = $this->input->post('idSpek');
        $status = $this->spesifikasiModel->deleteSpesifikasi($idSpesifikasi);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function admin_delete_selected() {
        $check = $this->input->post('check');
        $result = $this->admin_model->delete_admin_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('admin/admin_form');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('admin/admin_form');
        }
    }

}
