<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class MerkModel extends CI_Model {

    private $tab_merk = 'merk';
    private $tab_kategori = 'kategori';
    private $tab_kategoriMerk = 'kategori_merk';
    private $result;

    public function getAllMerk() {
        $query = $this->db->get($this->tab_merk);
        return $query->result();
    }

    public function get_nama_merk($id) {
        $query = $this->db->get_where('merk', array('id' => $id));
        $data = $query->result();
        if ($query->num_rows() > 0) {
            $name = $data[0]->namaMerk;
        } else {
            $name = '[Unknown Merk]';
        }
        return $name;
    }

    public function getKategoriMerkId($idKategori, $idMerk) {
        $this->db->select($this->tab_kategoriMerk . '.id');
        $this->db->from($this->tab_kategoriMerk);
        $this->db->where($this->tab_kategoriMerk . '.idKategori', $idKategori);
        $this->db->where($this->tab_kategoriMerk . '.idMerk', $idMerk);
        $query = $this->db->get();
        $data = $query->result();
        $id = $data[0]->id;
        return $id;
    }

    public function getMerkDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_merk, array('id' => $id));
        return $query->result();
    }

    public function getMerkByKategori($idKategori) {
        $this->db->select($this->tab_kategoriMerk . '.*');
        $this->db->select($this->tab_kategori . '.namaKategori');
        $this->db->select($this->tab_merk . '.namaMerk');
        $this->db->from($this->tab_kategori);
        $this->db->join($this->tab_kategoriMerk, $this->tab_kategoriMerk . '.idKategori = ' . $this->tab_kategori . '.id', 'INNER');
        $this->db->join($this->tab_merk, $this->tab_kategoriMerk . '.idMerk = ' . $this->tab_merk . '.id', 'INNER');
        $this->db->where($this->tab_kategoriMerk . '.idKategori', $idKategori);
        $query = $this->db->get();
        return $query->result();
    }

    public function getKategoriByMerk($idMerk) {
        $this->db->select($this->tab_kategoriMerk . '.*');
        $this->db->select($this->tab_kategori . '.namaKategori');
        $this->db->select($this->tab_merk . '.namaMerk');
        $this->db->from($this->tab_kategori);
        $this->db->join($this->tab_kategoriMerk, $this->tab_kategoriMerk . '.idKategori = ' . $this->tab_kategori . '.id', 'INNER');
        $this->db->join($this->tab_merk, $this->tab_kategoriMerk . '.idMerk = ' . $this->tab_merk . '.id', 'INNER');
        $this->db->where($this->tab_kategoriMerk . '.idMerk', $idMerk);
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

    public function saveMerk($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_merk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->result = $this->getMerkDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_merk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        return $this->db->insert_id();
    }

    public function deleteMerk($id) {
        $result = $this->getMerkDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_merk . ' WHERE id=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_kategoriMerk . ' WHERE idMerk=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteMerkSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getMerkDetail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->tab_merk . ' WHERE id=' . $id);
                $this->db->query('DELETE FROM ' . $this->tab_kategoriMerk . ' WHERE idMerk=' . $id);
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
