<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shipping extends CI_Controller {

    private $data;

    function __construct() {
        parent::__construct();
        ob_start();
        $this->load->model('shipping_model');
        $this->load->model('usermodel');
    }

    public function manage_shipping() {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['shipping'] = $this->shipping_model->get_all_shipping();
            $data['provinsi'] = $this->usermodel->get_provinsi_drop();
            $data['kota'] = $this->usermodel->get_kota_drop(0);
            $data['action'] = site_url('shipping/shipping_save');
            $data['action1'] = site_url('shipping/shipping_delete_selected');
            $data['view'] = 'admin/manage_shipping';
            $data['title'] = 'Manage Shipping';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function shipping_save() {
        $id = NULL;
        if ($this->validate_provinsi_kota($this->input->post('id_provinsi'), $this->input->post('id_kota'))) {
            $shipping = array('id_state' => $this->input->post('id_provinsi'), 'id_city' => $this->input->post('id_kota'), 'tarif' => $this->input->post('tarif'));
            $this->shipping_model->save_shipping($id, $shipping);
            redirect('shipping/manage_shipping');
        } else {
            $this->session->set_flashdata('notif', 'error pada input anda silahkan periksa kembali input anda');
            redirect('shipping/manage_shipping');
        }
    }

    public function validate_provinsi_kota($id_provinsi, $id_kota, $id = NULL) {
        if ($id_provinsi && $id_kota) {
            if ($this->shipping_model->validate_kota($id_kota, $id)) {
                return TRUE;
            } else {
                return FALSE;
            }
        } else {
            return FALSE;
        }
    }

    public function shippingDelete($shipping_id = NULL) {
        $shipping_id = $this->input->post('id');
        $status = $this->shipping_model->delete_shipping($shipping_id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function shipping_edit($shipping_id) {
        if ($this->session->userdata('tipeUser') == -1 || $this->session->userdata('tipeUser') == -2) {
            $data['notif'] = $this->session->flashdata('notif');
            $data['shipping_detail'] = $this->shipping_model->get_shipping_detail($shipping_id);
            $data['provinsi'] = $this->usermodel->get_provinsi_drop();
            $data['kota'] = $this->usermodel->get_kota_drop($data['shipping_detail'][0]->id_state);
            $data['action'] = site_url('shipping/shipping_update');
            $data['action1'] = site_url('shipping/shipping_delete_selected');
            $data['shipping'] = $this->shipping_model->get_all_shipping();
            $data['view'] = 'admin/manage_shipping';
            $data['title'] = 'Manage Shipping';
            $this->load->view('templateAdmin', $data);
        } else {
            $this->session->set_flashdata('notif', 'Anda tidak memiliki hak akses untuk halaman tersebut');
            redirect('user/adminDashboard');
        }
    }

    public function shipping_update() {
        if ($this->validate_provinsi_kota($this->input->post('id_provinsi'), $this->input->post('id_kota'), $this->input->post('id_shipping'))) {
            $shipping = array('id' => $this->input->post('id_shipping'), 'id_state' => $this->input->post('id_provinsi'), 'id_city' => $this->input->post('id_kota'), 'tarif' => $this->input->post('tarif'));
            $this->shipping_model->save_shipping($shipping['id'], $shipping);
            redirect('shipping/manage_shipping');
        } else {
            $this->session->set_flashdata('notif', 'error pada input anda silahkan periksa kembali input anda');
            redirect('shipping/shipping_edit/' . $this->input->post('id_shipping'));
        }
    }

    public function shipping_delete_selected() {
        $check = $this->input->post('check');
        $result = $this->shipping_model->delete_banner_selected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('shipping/shipping_manage');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('shipping/shipping_manage');
        }
    }

}
