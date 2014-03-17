<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Produk extends CI_Controller {

    private $data;

    public function __construct() {
        parent::__construct();
        ob_start();
        if ($this->session->userdata('logged_in') && $this->session->userdata('tipeUser') < 0) {
            $this->load->model('merkModel');
            $this->load->model('kategoriModel');
            $this->load->model('spesifikasiModel');
            $this->load->model('produkModel');
        } else {
            $this->session->set_flashdata('notif', 'Silahkan login sebagai admin terlebih dahulu');
            redirect('user');
        }
    }

    public function index() {
        $this->load->helper('form');
        $this->load->view('inputUser');
    }

    public function produkView() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['produk'] = $this->produkModel->getAllProduk();
        if ($_POST) {
            $data['produk'] = $this->produkModel->get_search_produk();
        }
        $data['action'] = site_url('produk/produkDeleteSelected');
        $data['title'] = 'Daftar Produk';
        $data['view'] = 'admin/viewProduk';
        $this->load->view('templateAdmin', $data);
    }

    public function produkInput() {
        $data['notif'] = $this->session->flashdata('notif');
        $data['kategoriDrop'] = $this->produkModel->getKategoriDrop();
        $data['merkDrop'] = array('0' => '- Merk tidak tersedia -');
        $data['action'] = site_url('produk/produkSave');
        $data['title'] = 'Input Produk';
        $data['view'] = 'admin/inputProduk';
        $this->load->view('templateAdmin', $data);
    }

    public function produkMerkDrop($idKategori = NULL) {
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->produkModel->getProdukMerkDrop($idKategori)));
    }

    public function produkSpesifikasi($idKategori = NULL) {
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->produkModel->getSpesifikasiProduk($idKategori)));
    }

    public function produkSave() {
        $idx = 0;
        $idKategoriMerk = $this->produkModel->getKategoriMerkId($this->input->post('idKategori'), $this->input->post('idMerk'));
        $produk = array(
            'idKategori' => $this->input->post('idKategori'),
            'idMerk' => $this->input->post('idMerk'),
            'idKategoriMerk' => $idKategoriMerk,
            'namaProduk' => $this->input->post('namaProduk'),
            'deskripsiProduk' => $this->input->post('deskripsiProduk'),
            'hargaProduk' => $this->input->post('hargaProduk'),
            'discountProduk' => $this->input->post('discountProduk'),
            'stlhDiscount' => $this->input->post('stlhDiscount'),
            'gambarProduk' => $this->input->post('gambarProduk'),
            'tglInput' => date('Y-m-d H:i:s'),
            'inputBy' => $this->session->userdata('id')
        );
        if ($produk['idKategori'] == 0) {
            $this->session->set_flashdata('notif', 'Isi kategori produk terlebih dahulu');
            redirect('produk/produkInput');
        }
        if ($_FILES['content']['error'] == 0) {
            $status = $this->produkModel->upload_pic('./produk/');
            if ($status['status'] == TRUE) {
                $produk['gambarProduk'] = $status['img_name'];
            } else {
                redirect('produk/produkInput');
            }
        } else if ($_FILES['content'][error] == 4) {
            $this->session->set_flashdata('notif', 'masukkan file gambar produk terlebih dahulu');
            redirect('produk/produkInput');
        } else {
            $this->session->set_flashdata('notif', 'File gambar produk rusak');
            redirect('produk/produkInput');
        }
        $idProduk = $this->produkModel->saveProduk($id = NULL, $produk);
        if ($idProduk > 0) {
            if ($_FILES['detail_content']) {
                $file_error = $this->produkModel->multiple_upload('./produk/detail/', $idProduk);
            }
        }
        $idSpek = $this->input->post('idSpesifikasi');
        $isiSpek = $this->input->post('isiSpesifikasi');
        if ($idSpek && $isiSpek) {
            while ($idx < count($this->input->post('idSpesifikasi'))) {
                $produkSpesifikasi = array(
                    'idProduk' => $idProduk,
                    'idSpesifikasi' => $idSpek[$idx],
                    'isiSpesifikasi' => $isiSpek[$idx],
                );
                $this->produkModel->saveProdukSpesifikasi($id, $produkSpesifikasi);
                $idx++;
            }
        }
        if ($file_error > 0) {
            $this->session->set_flashdata('notif', $file_error . ' file detail gambar produk rusak');
        }
        redirect('produk/produkView');
    }

    public function produkEdit($idProduk) {
        $data['notif'] = $this->session->flashdata('notif');
        $data['produk'] = $this->produkModel->getProdukDetail($idProduk);
        $data['kategoriDrop'] = $this->produkModel->getKategoriDrop();
        $data['merkDrop'] = $this->produkModel->getMerkDrop($data['produk'][0]->idKategori);
        $data['spesifikasi'] = $this->produkModel->getSpesifikasiProduk($data['produk'][0]->idKategori);
        $data['action'] = site_url('produk/produkUpdate');
        $data['title'] = 'Edit Produk';
        $data['view'] = 'admin/inputProduk';
        $this->load->view('templateAdmin', $data);
    }

    public function produkUpdate() {
        $idProduk = $this->input->post('idProduk');
        $idKategoriMerk = $this->produkModel->getKategoriMerkId($this->input->post('idKategori'), $this->input->post('idMerk'));
        $produk = array(
            'idKategori' => $this->input->post('idKategori'),
            'idMerk' => $this->input->post('idMerk'),
            'idKategoriMerk' => $idKategoriMerk,
            'namaProduk' => $this->input->post('namaProduk'),
            'deskripsiProduk' => $this->input->post('deskripsiProduk'),
            'hargaProduk' => $this->input->post('hargaProduk'),
            'discountProduk' => $this->input->post('discountProduk'),
            'stlhDiscount' => $this->input->post('stlhDiscount'),
            'gambarProduk' => $this->input->post('XXL'),
            'tglUpdate' => date('Y-m-d H:i:s'),
            'UpdateBy' => $this->session->userdata('id')
        );
        if ($produk['idKategori'] == 0) {
            $this->session->set_flashdata('notif', 'Isi kategori produk terlebih dahulu');
            redirect('produk/produkEdit/' . $idProduk);
        }
        if ($_FILES['content']['error'] == 0) {
            $status = $this->produkModel->upload_pic('./produk/');
            if ($status['status'] == TRUE) {
                $produk['gambarProduk'] = $status['img_name'];
            } else {
                redirect('produk/produkEdit/' . $idProduk);
            }
        }
        if ($this->produkModel->saveProduk($idProduk, $produk)) {
            $file_error = 0;
            if ($_FILES['detail_content']['error'] == 0) {
                $id_gbr_dtl = $this->input->post('id_gbr_dtl');
                $file_error = $this->produkModel->multiple_upload('./produk/detail/', $idProduk, $id_gbr_dtl);
            }
            if ($file_error == 0) {
                $idProdukSpesifikasi = $this->input->post('idProdukSpesifikasi');
                $idSpesifikasi = $this->input->post('idSpesifikasi');
                $isiSpesifikasi = $this->input->post('isiSpesifikasi');
                $idx = 0;
                if ($idProdukSpesifikasi) {
                    while ($idx < count($idProdukSpesifikasi)) {
                        $produkSpesifikasi = array(
                            'idProduk' => $idProduk,
                            'idSpesifikasi' => $idSpesifikasi[$idx],
                            'isiSpesifikasi' => $isiSpesifikasi[$idx],
                        );
                        $this->produkModel->saveProdukSpesifikasi($idProdukSpesifikasi[$idx], $produkSpesifikasi);
                        $idx++;
                    }
                } else {
                    $this->db->delete('produk_spesifikasi', array('idProduk' => $idProduk));
                    while ($idx < count($idSpesifikasi)) {
                        $produkSpesifikasi = array(
                            'idProduk' => $idProduk,
                            'idSpesifikasi' => $idSpesifikasi[$idx],
                            'isiSpesifikasi' => $isiSpesifikasi[$idx],
                        );
                        $this->produkModel->saveProdukSpesifikasi($id, $produkSpesifikasi);
                        $idx++;
                    }
                }
            } else {
                $this->session->set_flashdata('notif', $file_error . ' file detail gambar produk gagal di-upload');
            }
        } else {
            redirect('produk/produkEdit/' . $idProduk);
        }
        redirect('produk/produkView');
    }

    public function produkDelete($idProduk = NULL) {
        $idProduk = $this->input->post('id');
        $status = $this->produkModel->deleteProduk($idProduk);
        if ($status) {
            echo 'success';
        } else {
            echo 'failed';
        }
    }

    public function produkDeleteSelected() {
        $check = $this->input->post('check');
        $result = $this->produkModel->deleteProdukSelected($check);
        if ($result == FALSE) {
            $this->session->set_flashdata('notif', 'Data bershasil dihapus');
            redirect('produk/produkView');
        } else {
            $this->session->set_flashdata('notif', 'Data gagal dihapus');
            redirect('produk/produkView');
        }
    }

    public function produkSearchAuto($key = NULL) {
        header('Content-Type: application/x-json; charset=utf-8');
        echo(json_encode($this->produkModel->searchAutoProduk($key)));
//        //$key = $this->input->post('search');
//        $data = $this->produkModel->searchAutoProduk($key);
//        header('Content-Type: application/x-json; charset=utf-8');
//
//        echo (json_encode($data));
    }

    public function produk_best_seller($produk_id = NULL) {
        $produk_id = $this->input->post('id');
        $data['isBest_seller'] = $this->input->post('isBest_seller');
        $status = $this->db->update('produk', $data, array('id' => $produk_id));
        if ($status && $data['isBest_seller'] == 1) {
            echo 'activated';
        } else if ($status && $data['isBest_seller'] == 0) {
            echo 'unactivated';
        } else {
            echo 'error';
        }
    }

}
