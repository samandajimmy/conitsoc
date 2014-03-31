<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Certification extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $this->load->model('certification_model');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function view() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['certification'] = $this->certification_model->get_all();
        $this->certification_model->set_input_rules();
        $data['action'] = site_url('certification/delete_selected');
        $data['title'] = 'Daftar Certification';
        $data['view'] = 'admin/certification_view';
        $this->load->view('templateAdmin', $data);
    }

    public function input() {
        $data['notif'] = $this->session->flashdata('notif');
        $this->certification_model->set_input_rules();
        if ($this->form_validation->run()) {
            $certification = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'isi' => $this->input->post('isi'),
                'tgl_input' => date('Y-m-d H:m:s')
            );
            if ($_FILES['content']['error'] == 0) {
                $status = $this->certification_model->upload_pic('./certification/');
                if ($status['status'] == TRUE) {
                    $certification['gambar'] = $status['img_name'];
                }
            } else if ($_FILES['content']['error'] == 4) {
                $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
                redirect('certification/input');
            } else {
                $this->session->set_flashdata('notif', 'File gambar produk rusak');
                redirect('certification/input');
            }
            if ($this->certification_model->save($id = NULL, $certification)) {
                redirect('certification/view');
            }
        }
        $data['action'] = site_url('certification/input');
        $data['title'] = 'Input Certification';
        $data['view'] = 'admin/input_certification';
        $this->load->view('templateAdmin', $data);
    }

    public function edit($id_certification) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['certification_detail'] = $this->certification_model->get_detail($id_certification);
        $this->certification_model->set_input_rules($id_certification);
        if ($this->form_validation->run()) {
            if ($this->update()) {
                redirect('certification/view');
            }
        }
        $data['action'] = site_url('certification/edit/' . $id_certification);
        $data['title'] = 'Edit Certification';
        $data['view'] = 'admin/input_certification';
        $this->load->view('templateAdmin', $data);
    }

    public function update() {
        $id = $this->input->post('id_certification');
        $certification = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'isi' => $this->input->post('isi'),
            'tgl_update' => date('Y-m-d H:m:s')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->certification_model->upload_pic('./certification/');
            if ($status['status'] == TRUE) {
                $certification['gambar'] = $status['img_name'];
            }
        }
        if ($this->certification_model->save($id, $certification)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function certificationDelete($id_certification = NULL) {
        $id_certification = $this->input->post('id');
        $status = $this->certification_model->delete($id_certification);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function delete_selected() {
        $check = $this->input->post('check');
        $result = $this->certification_model->delete_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('certification/view');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('certification/view');
        }
    }

}
