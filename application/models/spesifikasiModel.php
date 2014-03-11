<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class SpesifikasiModel extends CI_Model {

    private $tab_spesifikasi = 'spesifikasi';
    private $tab_kategori = 'kategori';
    private $tab_produkSpesifikasi = 'produk_spesifikasi';
    private $result;
    
    public function getAllSpesifikasi(){
        $query = $this->db->get($this->tab_spesifikasi);
        return $query->result();
    }

    public function getSpesifikasiDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_spesifikasi, array('id' => $id));
        return $query->result();
    }
    
    public function getSpekByKategori($idKategori){
        $this->db->select($this->tab_spesifikasi . '.*');
        $this->db->select($this->tab_kategori . '.namaKategori');
        $this->db->from($this->tab_spesifikasi);
        $this->db->join($this->tab_kategori, $this->tab_kategori . '.id = ' . $this->tab_spesifikasi . '.idKategori', 'INNER');
        $this->db->where($this->tab_spesifikasi . '.idKategori', $idKategori);
        $query = $this->db->get();
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

    public function saveSpesifikasi($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_spesifikasi, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data['error'] = 1;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data['error'] = 0;
            }
        } else { //update the profile
            $this->result = $this->getSpesifikasiDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_spesifikasi, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        $data['id'] = $this->db->insert_id(); 
        return $data;
    }

    public function deleteSpesifikasi($id) {
        $result = $this->getSpesifikasiDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_spesifikasi . ' WHERE id=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_produkSpesifikasi . ' WHERE idSpesifikasi=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteSpesifikasiSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getSpesifikasiDetail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_spesifikasi . ' WHERE id=' . $id);
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
