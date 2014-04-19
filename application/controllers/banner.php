<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner extends CI_Controller {

    private $data;

    function __construct() {
        parent::__construct();
        ob_start();
        $this->load->model('banner_model');
    }

    public function bannerManage() {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['banner'] = $this->banner_model->get_all_banner();
            $data['action'] = site_url('banner/banner_save');
            $data['action1'] = site_url('banner/bannerDeleteSelected');
            $data['view'] = 'admin/manageBanner';
            $data['title'] = 'Manage Banner';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function banner_save() {
        $id = NULL;
        $banner = array(
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->banner_model->upload_pic('./banner/');
            if ($status['status'] == TRUE) {
                $banner['gambarBanner'] = $status['img_name'];
            } else {
                redirect('banner/bannerManage');
            }
        } else {
            $this->session->set_flashdata('notif', 'Silahkan masukkan file banner');
            redirect('banner/bannerManage');
        }
        $this->banner_model->save_banner($id, $banner);
        redirect('banner/bannerManage');
    }

    public function bannerDelete($banner_id = NULL) {
        $banner_id = $this->input->post('id');
        $status = $this->banner_model->delete_banner($banner_id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function banner_is_active($banner_id = NULL) {
        $banner_id = $this->input->post('id');
        $data['isActive'] = $this->input->post('is_active');
        $status = $this->db->update('banner', $data, array('id' => $banner_id));
        if ($status && $data['isActive'] == 1) {
            echo 'activated';
        } else if ($status && $data['isActive'] == 0) {
            echo 'unactivated';
        } else {
            echo 'error';
        }
    }

    public function banner_edit($id_banner) {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['banner_detail'] = $this->banner_model->get_banner_detail($id_banner);
            $data['action'] = site_url('banner/banner_update');
            $data['action1'] = site_url('banner/bannerDeleteSelected');
            $data['banner'] = $this->banner_model->get_all_banner();
            $data['view'] = 'admin/manageBanner';
            $data['title'] = 'Manage Banner';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function banner_update() {
        $banner = array(
            'id' => $this->input->post('idBanner'),
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->banner_model->upload_pic('./banner/');
            if ($status['status']) {
                $banner['gambarBanner'] = $status['img_name'];
            } else {
                redirect('banner/banner_edit/' . $banner['id']);
            }
        }
        $this->banner_model->save_banner($banner['id'], $banner);
        redirect('banner/bannerManage');
    }

    public function bannerDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->banner_model->delete_banner_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('banner/bannerManage');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('banner/bannerManage');
        }
    }

}
