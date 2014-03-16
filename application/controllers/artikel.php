<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $this->load->model('artikel_model');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function view() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['artikel'] = $this->artikel_model->get_all();
        $this->artikel_model->set_input_rules();
        $data['action'] = site_url('artikel/delete_selected');
        $data['title'] = 'Daftar Artikel';
        $data['view'] = 'admin/artikel_view';
        $this->load->view('templateAdmin', $data);
    }

    public function input() {
        $data['notif'] = $this->session->flashdata('notif');
        $this->artikel_model->set_input_rules();
        if ($this->form_validation->run()) {
            $artikel = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'isi' => $this->input->post('isi'),
                'tgl_input' => date('Y-m-d H:m:s')
            );
            if ($_FILES['content']['error'] == 0) {
                $status = $this->artikel_model->upload_pic('./artikel/');
                if ($status['status'] == TRUE) {
                    $artikel['gambar'] = $status['img_name'];
                }
            } else if ($_FILES['content']['error'] == 4) {
                $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
                redirect('artikel/input');
            } else {
                $this->session->set_flashdata('notif', 'File gambar produk rusak');
                redirect('artikel/input');
            }
            if ($this->artikel_model->save($id = NULL, $artikel)) {
                redirect('artikel/view');
            }
        }
        $data['action'] = site_url('artikel/input');
        $data['title'] = 'Input Artikel';
        $data['view'] = 'admin/input_artikel';
        $this->load->view('templateAdmin', $data);
    }

    public function edit($id_artikel) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['artikel_detail'] = $this->artikel_model->get_detail($id_artikel);
        $this->artikel_model->set_input_rules($id_artikel);
        if ($this->form_validation->run()) {
            if ($this->update()) {
                redirect('artikel/view');
            }
        }
        $data['action'] = site_url('artikel/edit/' . $id_artikel);
        $data['title'] = 'Edit Artikel';
        $data['view'] = 'admin/input_artikel';
        $this->load->view('templateAdmin', $data);
    }

    public function update() {
        $id = $this->input->post('id_artikel');
        $artikel = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'isi' => $this->input->post('isi'),
            'tgl_update' => date('Y-m-d H:m:s')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->artikel_model->upload_pic('./artikel/');
            if ($status['status'] == TRUE) {
                $artikel['gambar'] = $status['img_name'];
            }
        }
        if ($this->artikel_model->save($id, $artikel)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function artikelDelete($id_artikel = NULL) {
        $id_artikel = $this->input->post('id');
        $status = $this->artikel_model->delete($id_artikel);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function delete_selected() {
        $check = $this->input->post('check');
        $result = $this->artikel_model->delete_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('artikel/view');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('artikel/view');
        }
    }

}
