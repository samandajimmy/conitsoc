<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Merk extends CI_Controller {

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

    public function index() {
        $this->load->helper('form');
        $this->load->view('inputUser');
    }

    public function merkView() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['merk'] = $this->merkModel->getAllMerk();
        $data['action'] = site_url('merk/merkDeleteSelected');
        $data['title'] = 'Daftar Merk';
        $data['view'] = 'admin/viewMerk';
        $this->load->view('templateAdmin', $data);
    }

    public function merkInput() {
        $data['notif'] = $this->session->flashdata('notif');
        $kategori = $this->kategoriModel->getAllKategori();
        foreach ($kategori as $row){
            $data['kategori'][$row->id] = $row->namaKategori;
        }
        $data['action'] = site_url('merk/merkSave');
        $data['title'] = 'Input Merk';
        $data['view'] = 'admin/inputMerk';
        $this->load->view('templateAdmin', $data);
    }

    public function merkSave() {
        $merk = array(
            'namaMerk' => $this->input->post('namaMerk'),
        );
        $idMerk = $this->merkModel->saveMerk($id, $merk);
        $idKategori = $this->input->post('kategori');
        foreach ($idKategori as $row) {
            $kategoriMerk = array(
                'idKategori' => $row,
                'idMerk' => $idMerk,
            );
            $kategoriMerkSave = $this->kategoriModel->saveKategoriMerk($id, $kategoriMerk);
        }
        redirect('merk/merkView');
    }

    public function MerkEdit($idMerk) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('merk/merkUpdate');
        $data['merk'] = $this->merkModel->getMerkDetail($idMerk);
        $param = $this->merkModel->getKategoriByMerk($idMerk);
        foreach ($param as $row) {
            $data['kategoriMerk'][] = $row->idKategori;
        }
        $kategori = $this->kategoriModel->getAllKategori();
        foreach ($kategori as $row){
            $data['kategori'][$row->id] = $row->namaKategori;
        }
        $data['title'] = 'Edit Merk';
        $data['view'] = 'admin/inputMerk';
        $this->load->view('templateAdmin', $data);
    }

    public function merkUpdate() {
        $idMerk = $this->input->post('idMerk');
        $merk = array(
            'namaMerk' => $this->input->post('namaMerk'),
        );
        $this->merkModel->saveMerk($idMerk, $merk);
        $kategoriAll = $this->kategoriModel->getAllkategori();
        $kategori = $this->input->post('idKategori');
        foreach ($kategori as $row){
            $kategoriId[$row] = $row;
        }
        if (isset($kategoriAll)) {
            foreach ($kategoriAll as $row) {
                $idKategoriMerki = $this->merkModel->getKategoriMerkId($row->id, $idMerk);
                $this->db->delete('kategori_merk', array('id' => $idKategoriMerki));
                if (isset($kategoriId[$row->id])) {
                    $kategoriMerk = array(
                        'idKategori' => $row->id,
                        'idMerk' => $idMerk
                    );
                    $kategoriMerkSave = $this->kategoriModel->saveKategoriMerk($idKategoriMerk, $kategoriMerk);
                }
            }
        }
        redirect('merk/merkView');
    }

    public function merkDelete($idMerk = NULL) {
        $idMerk = $this->input->post('id');
        $status = $this->merkModel->deleteMerk($idMerk);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function merkDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->merkModel->deleteMerkSelected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('merk/merkView');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('merk/merkView');
        }
    }

}
