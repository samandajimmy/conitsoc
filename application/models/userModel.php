<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class UserModel extends CI_Model {

    private $tab_user = 'user';
    private $result;

    public function is_exist($id_user) {
        $query = $this->db->get_where('customer', array('idUser' => $id_user));
        $data = $query->result();
        $param = $data[0]->alamat;
        if ($param) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_provinsi_drop() {
        $query = $this->db->get('master_state');
        $provinsi = $query->result();
        if (isset($provinsi)) {
            $data[0] = '- Pilih Satu -';
            foreach ($provinsi as $row) {
                $data[$row->state_country_id] = $row->state_name;
            }
        }
        return $data;
    }

    public function get_kota_drop($id_provinsi) {
        $this->db->select('*');
        $this->db->from('master_city AS kota');
        $this->db->join('master_state AS provinsi', 'kota.city_state_id = provinsi.state_id', 'inner');
        $this->db->where('kota.city_state_id', $id_provinsi);
        $query = $this->db->get();
        $kota = $query->result();
        if (isset($kota)) {
            $data[0] = '- Pilih Satu -';
            foreach ($kota as $row) {
                $data[$row->city_id] = $row->city_name;
            }
        }
        return $data;
    }

    public function get_customer_id($id = NULL) {
        $query = $this->db->get_where('customer', array('idUser' => $id));
        $param = $query->result();
        return $param[0]->id;
    }

    public function getAllUser() {
        $query = $this->db->get($this->tab_user);
        return $query->result();
    }

    public function getUserDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_user, array('id' => $id));
        return $query->result();
    }

    public function getProfileDetail($id = NULL) {
        $query = $this->db->get_where('customer', array('idUser' => $id));
        $param = $query->result();
        return $param;
    }

    public function getUsernameDetail($username) {
        $query = $this->db->get_where($this->tab_user, array('username' => $username));
        return $query->result();
    }

    public function getSameName($username) {
        $this->db->select('*');
        $this->db->from($this->tab_user);
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function getSameEmail($email) {
        $this->db->select('*');
        $this->db->from($this->tab_user);
        $this->db->where('email', $email);
        $query = $this->db->get();
        $result = $query->result();
        if ($result) {
            return FALSE;
        } else {
            return TRUE;
        }
    }

    public function saveUser($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_user, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->result = $this->getUserDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_user, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        return $this->db->insert_id();
    }

    public function saveProfile($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert('customer', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->result = $this->getProfileDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update('customer', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        return $this->db->insert_id();
    }

    public function deleteAdmin($id) {
        $result = $this->getUserDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM user WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteAdminSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getUserDetail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM user WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function userSendingEmail($idUser) {
        $user = $this->getUserDetail($idUser);
        $config = Array(
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_port' => 465,
            'smtp_user' => "samandajimmyr@gmail.com",
            'smtp_pass' => "superbubur",
            'mailtype' => "text",
            'charset' => "iso-8859-1"
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $msg = '
            Thanks for signing up! 
            Your account has been created, you can login with the following credentials after you have activated your account by pressing the url below. 
 
            ------------------------ 
            Username: ' . $user[0]->username . ' 
            ------------------------ 
 
            Please click this link to activate your account: 
 
            ' . site_url('user/userActivation/'.$user[0]->email . '/' . $user[0]->hash);

        $this->email->from('samandajimmyr@gmail.com', 'Jimmy Samanda');
        $this->email->to($user[0]->email);
        $this->email->subject('Email Activation');
        $this->email->message($msg);
        $this->email->send();
    }

    public function getAltProfileDetail($id = NULL) {
        $query = $this->db->get_where('alt_customer', array('id' => $id));
        $param = $query->result();
        return $param;
    }

    public function saveAltCustomer($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert('alt_customer', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->db->where('id', $id);
            if ($this->db->update('alt_customer', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        return $this->db->insert_id();
    }

}

?>
