<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Project extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $this->load->model('project_model');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function get_project_ajax($id_project) {
        header('Content-Type: application/x-json; charset=utf-8');
        $param = $this->project_model->get_detail($id_project);
        $data = $param[0];
        echo(json_encode($data));
    }

    public function download_project($file_project) {
        if ($file_project) {
            $this->load->helper('download');
            $data = file_get_contents(base_url('project/file/' . $file_project));
            force_download($file_project, $data);
        }
    }

    public function view() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['project'] = $this->project_model->get_all();
        $data['action'] = site_url('project/delete_selected');
        $data['title'] = 'Daftar Project';
        $data['view'] = 'admin/project_view';
        $this->load->view('templateAdmin', $data);
    }

    public function input() {
        $data['notif'] = $this->session->flashdata('notif');
        if ($this->form_validation->run()) {
            $project = array(
                'judul' => $this->input->post('judul'),
                'deskripsi' => $this->input->post('deskripsi'),
                'isi' => $this->input->post('isi'),
                'tgl_input' => date('Y-m-d H:m:s')
            );
            if ($_FILES['content']['error'] == 0) {
                $status = $this->project_model->upload_pic('./project/');
                if ($status['status'] == TRUE) {
                    $project['gambar'] = $status['img_name'];
                }
            } else if ($_FILES['content']['error'] == 4) {
                $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
                redirect('project/input');
            } else {
                $this->session->set_flashdata('notif', 'File gambar produk rusak');
                redirect('project/input');
            }
            if ($this->project_model->save($id = NULL, $project)) {
                redirect('project/view');
            }
        }
        $data['action'] = site_url('project/input');
        $data['title'] = 'Input Project';
        $data['view'] = 'admin/input_project';
        $this->load->view('templateAdmin', $data);
    }

    public function edit($id_project) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['project_detail'] = $this->project_model->get_detail($id_project);
        if ($this->form_validation->run()) {
            if ($this->update()) {
                redirect('project/view');
            }
        }
        $data['action'] = site_url('project/edit/' . $id_project);
        $data['title'] = 'Edit Project';
        $data['view'] = 'admin/input_project';
        $this->load->view('templateAdmin', $data);
    }

    public function update() {
        $id = $this->input->post('id_project');
        $project = array(
            'judul' => $this->input->post('judul'),
            'deskripsi' => $this->input->post('deskripsi'),
            'isi' => $this->input->post('isi'),
            'tgl_update' => date('Y-m-d H:m:s')
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->project_model->upload_pic('./project/');
            if ($status['status'] == TRUE) {
                $project['gambar'] = $status['img_name'];
            }
        }
        if ($this->project_model->save($id, $project)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function projectDelete($id_project = NULL) {
        $id_project = $this->input->post('id');
        $status = $this->project_model->delete($id_project);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function delete_selected() {
        $check = $this->input->post('check');
        $result = $this->project_model->delete_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('project/view');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('project/view');
        }
    }

}
