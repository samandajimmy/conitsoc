<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class KategoriModel extends CI_Model {

    private $tab_merk = 'merk';
    private $tab_kategori = 'kategori';
    private $tab_produk = 'produk';
    private $tab_spesifikasi = 'spesifikasi';
    private $tab_kategoriMerk = 'kategori_merk';
    private $tab_produkSpesifikasi = 'produk_spesifikasi';
    private $result;

    public function getAllKategori() {
        $query = $this->db->get($this->tab_kategori);
        return $query->result();
    }
    
    public function get_kategori_merk($id_kategori) {
        $this->db->select('m.namaMerk');
        $this->db->select('km.idMerk');
        $this->db->from('kategori AS k');
        $this->db->join('kategori_merk AS km', 'k.id = km.idKategori', 'inner');
        $this->db->join('merk AS m', 'm.id = km.idMerk', 'inner');
        $this->db->where('km.idKategori', $id_kategori);
        $query = $this->db->get();
        return $query->result();
    }

    public function getAllKategoriIdx() {
        $this->db->select('*');
        $this->db->from('kategori');
        $this->db->order_by('idx', 'asc');
        $query = $this->db->get();
        return $query->result();
    }

    public function getKategoriDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_kategori, array('id' => $id));
        return $query->result();
    }

    public function getKategoriMerkDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_kategoriMerk, array('id' => $id));
        return $query->result();
    }

    public function getSameName($username) {
        $this->db->select('*');
        $this->db->from($this->tab_user);
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function getKategoriProduk($idKategori) {
        $query = $this->db->get_where($this->tab_produk, array('idKategori' => $idKategori));
        return $query->result();
    }

    public function saveKategori($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_kategori, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data['error'] = 1;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data['error'] = 0;
            }
        } else { //update the profile
            $this->result = $this->getKategoriDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_kategori, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        $data['id'] = $this->db->insert_id();
        return $data;
    }

    public function saveKategoriMerk($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_kategoriMerk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data['error'] = 1;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data['error'] = 0;
            }
        } else { //update the profile
            $this->result = $this->getKategoriMerkDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_kategoriMerk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        $data['id'] = $this->db->insert_id();
        return $data;
    }

    public function deleteKategori($id) {
        $result = $this->getKategoriDetail($id);
        $produk = $this->getKategoriProduk($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_kategori . ' WHERE id=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE idKategori=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_kategoriMerk . ' WHERE idKategori=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_spesifikasi . ' WHERE idKategori=' . $id);
            if (count($produk) > 0) {
                foreach ($produk as $row) {
                    if ($row->gambarProduk != '') {
                        $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                        $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                        unlink($file_url);
                        unlink($file_url1);
                    }
                    $this->db->query('DELETE FROM ' . $this->tab_produkSpesifikasi . ' WHERE idProduk=' . $row->id);
                }
            }
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteKategoriSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getKategoriDetail($id);
            $produk = $this->getKategoriProduk($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_kategori . ' WHERE id=' . $id);
                $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE idKategori=' . $id);
                $this->db->query('DELETE FROM ' . $this->tab_kategoriMerk . ' WHERE idKategori=' . $id);
                $this->db->query('DELETE FROM ' . $this->tab_spesifikasi . ' WHERE idKategori=' . $id);
                if (count($produk) > 0) {
                    foreach ($produk as $row) {
                        if ($row->gambarProduk != '') {
                            $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                            $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                            unlink($file_url);
                            unlink($file_url1);
                        }
                        $this->db->query('DELETE FROM ' . $this->tab_produkSpesifikasi . ' WHERE idProduk=' . $row->id);
                    }
                }
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

}

?>
