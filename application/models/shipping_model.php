<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Shipping_model extends CI_Model {

    private $tab_shipping = 'shipping';

    public function get_id_shipping($kota) {
        $this->db->select('*');
        $this->db->from('shipping');
        $this->db->where('id_city', $kota);
        $query = $this->db->get();
        $data = $query->result();
        return $data ? $data[0]->id : 0;
    }

    public function get_tarif_shipping($id) {
        if ($id > 0) {
            $this->db->select('*');
            $this->db->from('shipping');
            $this->db->where('id', $id);
            $query = $this->db->get();
            $data = $query->result();
            return $data[0]->tarif;
        } else {
            return 0;
        }
    }

    public function get_all_active_shipping() {
        $query = $this->db->get_where($this->tab_shipping, array('isActive' => 1));
        return $query->result();
    }

    public function get_all_shipping() {
        $this->db->select('*');
        $this->db->select('S.id AS id_shipping');
        $this->db->from('shipping AS S');
        $this->db->join('master_city AS C', 'S.id_city = C.city_id', 'inner');
        $this->db->join('master_state AS St', 'S.id_state = St.state_id', 'inner');
        $query = $this->db->get();
        return $query->result();
    }

    public function validate_kota($id_kota, $id) {
        $kota = $this->db->get_where('shipping', array('id_city' => $id_kota))->result();
        if ($kota) {
            if ($id != NULL) {
                return TRUE;
            } else {
                return false;
            }
        } else {
            return TRUE;
        }
    }

    public function get_shipping_detail($id = NULL) {
        $query = $this->db->get_where($this->tab_shipping, array('id' => $id));
        return $query->result();
    }

    public function save_shipping($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_shipping, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $result = $this->get_shipping_detail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_shipping, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
    }

    public function delete_shipping($id) {
        $result = $this->get_shipping_detail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM shipping WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function delete_shipping_selected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->get_shipping_detail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM shipping WHERE id=' . $id);
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
