<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Kategori extends CI_Controller {

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

    public function kategoriView() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['kategori'] = $this->kategoriModel->getAllKategori();
        $data['action'] = site_url('kategori/kategoriDeleteSelected');
        $data['title'] = 'Daftar Kategori';
        $data['view'] = 'admin/viewKategori';
        $this->load->view('templateAdmin', $data);
    }

    public function kategoriInput() {
        $data['notif'] = $this->session->flashdata('notif');
        $merk = $this->merkModel->getAllMerk();
        foreach ($merk as $row) {
            $data['merk'][$row->id] = $row->namaMerk;
        }
        $data['action'] = site_url('kategori/kategoriSave');
        $data['title'] = 'Input Kategori';
        $data['view'] = 'admin/inputKategori';
        $this->load->view('templateAdmin', $data);
    }

    public function kategoriSave() {
        $kategori = array(
            'namaKategori' => $this->input->post('namaKategori'),
        );
        $kategoriSave = $this->kategoriModel->saveKategori($id, $kategori);
        $idKategori = $kategoriSave['id'];
        $spesifikasi = $this->input->post('namaSpesifikasi');
        foreach ($spesifikasi as $row) {
            $spek = array(
                'namaSpesifikasi' => $row,
                'idKategori' => $idKategori,
            );
            $spesifikasiSave = $this->spesifikasiModel->saveSpesifikasi($id, $spek);
        }
        $merkId = $this->input->post('idMerk');
        foreach ($merkId as $row) {
            $kategoriMerk = array(
                'idKategori' => $idKategori,
                'idMerk' => $row,
            );
            $kategoriMerkSave = $this->kategoriModel->saveKategoriMerk($id, $kategoriMerk);
        }
        redirect('kategori/kategoriView');
    }

    public function kategoriEdit($idKategori, $char = NULL) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['action'] = site_url('kategori/kategoriUpdate');
        if ($char != NULL) {
            $data['addSpek'] = $char;
            $data['action'] = site_url('kategori/kategoriUpdateSpek');
        }
        $merk = $this->merkModel->getAllMerk();
        foreach ($merk as $row) {
            $data['merk'][$row->id] = $row->namaMerk;
        }
        $data['kategori'] = $this->kategoriModel->getKategoriDetail($idKategori);
        $param = $this->merkModel->getMerkByKategori($idKategori);
        foreach ($param as $row) {
            $data['kategoriMerk'][] = $row->idMerk;
        }
        $data['spek'] = $this->spesifikasiModel->getSpekByKategori($idKategori);
        $data['title'] = 'Edit Kategori';
        $data['view'] = 'admin/inputKategori';
        $this->load->view('templateAdmin', $data);
    }

    public function kategoriUpdateSpek() {
        $data['notif'] = $this->session->flashdata('notif');
        $idKategori = $this->input->post('idKategori');
        $spesifikasi = $this->input->post('namaSpesifikasi');
        $spesifikasiEdit = $this->input->post('namaSpesifikasiEdit');
        $idSpek = $this->input->post('idSpek');
        $param = array_combine($idSpek, $spesifikasiEdit);
        if (isset($spesifikasi)) {
            foreach ($spesifikasi as $row) {
                $spek = array(
                    'namaSpesifikasi' => $row,
                    'idKategori' => $idKategori,
                );
                $spesifikasiSave = $this->spesifikasiModel->saveSpesifikasi($idSpesifikasi, $spek);
            }
        }
        foreach ($idSpek as $row) {
            $idSpesifikasi = $row;
            $spek = array(
                'namaSpesifikasi' => $param[$row],
                'idKategori' => $idKategori,
            );
            $spesifikasiSave = $this->spesifikasiModel->saveSpesifikasi($idSpesifikasi, $spek);
        }
        redirect('kategori/kategoriView');
    }

    public function kategoriUpdate() {
        $idKategori = $this->input->post('idKategori');
        $kategori = array(
            'namaKategori' => $this->input->post('namaKategori'),
        );
        $this->kategoriModel->saveKategori($idKategori, $kategori);
        $merkAll = $this->merkModel->getAllMerk();
        $merk = $this->input->post('idMerk');
        foreach ($merk as $row) {
            $merkId[$row] = $row;
        }
        $spesifikasi = $this->input->post('namaSpesifikasi');
        $spesifikasiEdit = $this->input->post('namaSpesifikasiEdit');
        $idSpek = $this->input->post('idSpek');
        $param = array_combine($idSpek, $spesifikasiEdit);
        if (isset($spesifikasi)) {
            foreach ($spesifikasi as $row) {
                $spek = array(
                    'namaSpesifikasi' => $row,
                    'idKategori' => $idKategori,
                );
                $spesifikasiSave = $this->spesifikasiModel->saveSpesifikasi($idSpesifikasi, $spek);
            }
        }
        foreach ($idSpek as $row) {
            $idSpesifikasi = $row;
            $spek = array(
                'namaSpesifikasi' => $param[$row],
                'idKategori' => $idKategori,
            );
            $spesifikasiSave = $this->spesifikasiModel->saveSpesifikasi($idSpesifikasi, $spek);
        }
        if (isset($merkAll)) {
            foreach ($merkAll as $row) {
                $idKategoriMerki = $this->merkModel->getKategoriMerkId($idKategori, $row->id);
                $this->db->delete('kategori_merk', array('id' => $idKategoriMerki));
                if (isset($merkId[$row->id])) {
                    $kategoriMerk = array(
                        'idKategori' => $idKategori,
                        'idMerk' => $row->id
                    );
                    $kategoriMerkSave = $this->kategoriModel->saveKategoriMerk($idKategoriMerk, $kategoriMerk);
                }
            }
        }
        redirect('kategori/kategoriView');
    }

    public function kategoriDelete($idKategori = NULL) {
        $idKategori = $this->input->post('id');
        $status = $this->kategoriModel->deleteKategori($idKategori);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function kategoriDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->kategoriModel->deleteKategoriSelected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('kategori/kategoriView');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('kategori/kategoriView');
        }
    }
	
	public function update_idx(){
		$id = $this->input->post('id_kategori');
		$idx = $this->input->post('idx');
		$data = array(
			'idx' => $idx,
		);
		$this->db->update('kategori', $data, array('id' => $id));
		redirect('kategori/kategoriView');
	}

}
