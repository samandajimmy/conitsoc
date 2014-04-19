<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iklan extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $this->load->model('iklan_model');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function get_detail_ajax($id) {
        header('Content-Type: application/x-json; charset=utf-8');
        $param = $this->iklan_model->get_detail($id);
        $data = $param[0];
        echo(json_encode($data));
    }

    public function view() {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['iklan'] = $this->iklan_model->get_all();
            $data['action'] = site_url('iklan/delete_selected');
            $data['title'] = 'Daftar Iklan';
            $data['view'] = 'admin/iklan_view';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function input() {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['action'] = site_url('iklan/save');
            $data['type'] = $this->iklan_model->get_type();
            $data['title'] = 'Input Iklan';
            $data['view'] = 'admin/iklan_input';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function save() {
        $iklan = array(
            'type' => $this->input->post('type'),
            'link' => $this->input->post('link'),
            'input_by' => $this->session->userdata('id'),
            'tgl_input' => date('Y-m-d H:m:s')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->iklan_model->upload_pic('./iklan/' . $iklan['type'] . '/');
            if ($status['status'] == TRUE) {
                $iklan['gambarIklan'] = $status['img_name'];
            }
        } else if ($_FILES['content']['error'] == 4) {
            $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
            redirect('iklan/input');
        } else {
            $this->session->set_flashdata('notif', 'File gambar produk rusak');
            redirect('iklan/input');
        }
        if ($this->iklan_model->save($id = NULL, $iklan)) {
            redirect('iklan/view');
        }
    }

    public function edit($id_iklan) {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['iklan_detail'] = $this->iklan_model->get_detail($id_iklan);
            $data['type'] = $this->iklan_model->get_type();
            $data['action'] = site_url('iklan/update');
            $data['title'] = 'Edit Iklan';
            $data['view'] = 'admin/iklan_input';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function update() {
        $id = $this->input->post('id_iklan');
        $iklan = array(
            'type' => $this->input->post('type'),
            'link' => $this->input->post('link'),
            'update_by' => $this->session->userdata('id'),
            'isActive' => 0,
            'tgl_update' => date('Y-m-d H:m:s')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->iklan_model->upload_pic('./iklan/' . $iklan['type'] . '/');
            if ($status['status'] == TRUE) {
                $iklan['gambarIklan'] = $status['img_name'];
            }
        }
        if ($this->iklan_model->save($id, $iklan)) {
            redirect('iklan/view');
        } else {
            redirect('iklan/edit/' . $id);
        }
    }

    public function iklanDelete($id_iklan = NULL) {
        $id_iklan = $this->input->post('id');
        $status = $this->iklan_model->delete($id_iklan);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function delete_selected() {
        $check = $this->input->post('check');
        $result = $this->iklan_model->delete_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('iklan/view');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('iklan/view');
        }
    }

    public function iklan_is_active($iklan_id = NULL) {
        $iklan_id = $this->input->post('id');
        $data['isActive'] = $this->input->post('is_active');
        $status = $this->db->update('iklan', $data, array('id' => $iklan_id));
        if ($status && $data['isActive'] == 1) {
            echo 'activated';
        } else if ($status && $data['isActive'] == 0) {
            echo 'unactivated';
        } else {
            echo 'error';
        }
    }

}
