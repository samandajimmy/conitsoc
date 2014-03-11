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
        $data['notif'] = $this->session->flashdata('notif');
        $data['banner'] = $this->banner_model->get_all_banner();
        $data['action'] = site_url('banner/banner_save');
        $data['action1'] = site_url('banner/bannerDeleteSelected');
        $data['view'] = 'admin/manageBanner';
        $data['title'] = 'Manage Banner';
        $this->load->view('templateAdmin', $data);
    }

    public function iklanManage() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['iklan'] = $this->banner_model->get_all_iklan();
        $data['action'] = site_url('banner/iklan_save');
        $data['action1'] = site_url('banner/iklanDeleteSelected');
        $data['view'] = 'admin/manageIklan';
        $data['title'] = 'Manage Iklan';
        $this->load->view('templateAdmin', $data);
    }

    public function iklan_save() {
        $id = NULL;
        $iklan = array(
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->banner_model->upload_pic('./banner/iklan/');
            if ($status['status'] == TRUE) {
                $iklan['gambarIklan'] = $status['img_name'];
            } else {
                redirect('banner/iklanManage');
            }
        } else {
            $this->session->set_flashdata('notif', 'Silahkan masukkan file iklan');
            redirect('banner/iklanManage');
        }
        $this->banner_model->save_iklan($id, $iklan);
        redirect('banner/iklanManage');
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

    public function iklanDelete($iklan_id = NULL) {
        $iklan_id = $this->input->post('id');
        $status = $this->iklan_model->delete_iklan($iklan_id);
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

    public function banner_edit($id_banner) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['banner_detail'] = $this->banner_model->get_banner_detail($id_banner);
        $data['action'] = site_url('banner/banner_update');
        $data['banner'] = $this->banner_model->get_all_banner();
        $data['view'] = 'admin/manageBanner';
        $data['title'] = 'Manage Banner';
        $this->load->view('templateAdmin', $data);
    }

    public function iklan_edit($id_iklan) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['iklan_detail'] = $this->banner_model->get_iklan_detail($id_iklan);
        $data['action'] = site_url('banner/iklan_update');
        $data['iklan'] = $this->banner_model->get_all_iklan();
        $data['view'] = 'admin/manageIklan';
        $data['title'] = 'Manage Iklan';
        $this->load->view('templateAdmin', $data);
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
        } else {
            $banner['gambarBanner'] = $this->input->post('gambar_banner');
        }
        $this->banner_model->save_banner($banner['id'], $banner);
        redirect('banner/bannerManage');
    }

    public function iklan_update() {
        $iklan = array(
            'id' => $this->input->post('idIklan'),
        );
        if ($_FILES['content']['error'] == 0) {
            $status = $this->banner_model->upload_pic('./banner/iklan/');
            if ($status['status']) {
                $iklan['gambarIklan'] = $status['img_name'];
            } else {
                redirect('banner/iklan_edit/' . $iklan['id']);
            }
        } else {
            $iklan['gambarIklan'] = $this->input->post('gambar_iklan');
        }
        $this->banner_model->save_iklan($iklan['id'], $iklan);
        redirect('banner/iklanManage');
    }

    public function iklanDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->banner_model->delete_iklan_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('banner/iklanManage');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('banner/iklanManage');
        }
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