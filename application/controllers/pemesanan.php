<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Pemesanan extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $this->load->model('merkModel');
            $this->load->model('kategoriModel');
            $this->load->model('userModel');
            $this->load->model('produkModel');
            $this->load->model('pemesananModel');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function daftar_pesanan() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['pesanan'] = $this->pemesananModel->get_all_pesanan();
        $data['status'] = $this->pemesananModel->get_status_drop();
        $data['title'] = 'Daftar Pesanan';
        $data['view'] = 'admin/daftar_pesanan';
        $this->load->view('templateAdmin', $data);
    }

    public function delete_permanently($id = NULL) {
        $id = $this->input->post('id');
        $status = $this->pemesananModel->delete_permanently($id);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function detail($id_pesanan) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['status'] = $this->pemesananModel->get_status_drop();
        $is_alt = $this->pemesananModel->get_is_alt($id_pesanan);
        $data['pemesanan']['detail'] = $this->pemesananModel->get_pemesanan_detail($id_pesanan, $is_alt);
        $data['pemesanan']['produk'] = $this->pemesananModel->getItemsList($id_pesanan);
        $data['title'] = 'Detail Pesanan';
        $data['view'] = 'admin/detail_pesanan';
        $this->load->view('templateAdmin', $data);
    }

    public function get_status_pemesanan() {
        header('Content-Type: application/x-json; charset=utf-8');
        $data = $this->pemesananModel->get_status_drop();
        echo(json_encode($data));
    }

    public function change_status($id_pesanan = null) {
        $id_pesanan = $this->input->post('id');
        $data['idStatus'] = $this->input->post('id_status');
        if ($this->db->update('pemesanan', $data, array('id' => $id_pesanan))) {
            $order = $this->pemesananModel->get_item_id($id_pesanan);
            if (isset($order)) {
                foreach ($order as $row) {
                    $prod = $this->produkModel->getProdukDetail($row['id_produk']);
                    switch ($data['idStatus']) {
                        case '1':
                            $update['jml_stok'] = $prod[0]->jml_stok - $row['qty'];
                            $this->db->update('produk', $update, array('id' => $row['id_produk']));
                            break;
                        case '3':
                            $update['jml_stok'] = $prod[0]->jml_stok + $row['qty'];
                            $this->db->update('produk', $update, array('id' => $row['id_produk']));
                            break;
                    }
                }
            }
            echo 'success';
        } else {
            echo 'error';
        }
    }

    public function confirmed($id_pesanan = null) {
        $id_pesanan = $this->input->post('id');
        $data['is_confirm'] = $this->input->post('is_confirm');
        $data['date_confirm'] = date('Y-m-d H:m:s');
        if ($this->db->update('pemesanan', $data, array('id' => $id_pesanan))) {
            echo 'success';
        } else {
            echo 'error';
        }
    }

}

?>
