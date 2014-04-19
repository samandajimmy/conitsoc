<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Iklan_model extends CI_Model {

    private $table = 'iklan';

    function get_type() {
        $data[''] = 'Pilih satu';
        $query = $this->db->query("SHOW COLUMNS FROM iklan LIKE 'type'")->row(0)->Type;
        preg_match("/^enum\((.*)\)$/", $query, $matches);
        $param = explode(',', $matches[1]);
        foreach ($param as $row) {
            $data[trim($row, "'")] = trim($row, "'");
        }
        return $data;
    }

    function image_process($image_data, $width, $height, $new_image) {
        $image_config["source_image"] = $image_data["full_path"];
        $image_config['create_thumb'] = FALSE;
        $image_config['maintain_ratio'] = TRUE;
        $image_config['new_image'] = $image_data["file_path"] . 'temp';
        $image_config['quality'] = "100%";
        $image_config['width'] = $width;
        $image_config['height'] = $height;
        $dim = (intval($image_data["image_width"]) / intval($image_data["image_height"])) - ($image_config['width'] / $image_config['height']);
        $image_config['master_dim'] = ($dim > 0) ? "height" : "width";

        $this->load->library('image_lib');
        $this->image_lib->initialize($image_config);
        $this->image_lib->resize();

        $temp_image = $image_data['file_path'] . 'temp/' . $image_data['file_name'];
        list($widths, $heights) = getimagesize($temp_image);
        $diff_y = $heights - $height;
        $diff_x = $widths - $width;
        $y_axis = ($diff_y > 0) ? $diff_y / 2 : 0;
        $x_axis = ($diff_x > 0) ? $diff_x / 2 : 0;
        $image_config['source_image'] = $temp_image;
        $image_config['new_image'] = $new_image;
        $image_config['quality'] = "100%";
        $image_config['maintain_ratio'] = FALSE;
        $image_config['width'] = $width;
        $image_config['height'] = $height;
        $image_config['x_axis'] = strval($x_axis);
        $image_config['y_axis'] = strval($y_axis);
        $this->image_lib->initialize($image_config);

        $this->image_lib->crop();
        unlink($image_data['file_path'] . 'temp/' . $image_data['file_name']);

        $this->image_lib->clear();
    }

    function upload_pic($gallery_path) {
        try {
            $config = array(
                'allowed_types' => 'jpg|jpeg|png',
                'encrypt_name' => TRUE,
                'upload_path' => $gallery_path
            );

            $this->load->library('upload', $config);
            if ($this->upload->do_upload('content')) {
                $data = $this->upload->display_errors();
                $image_data = $this->upload->data();
                switch ($gallery_path) {
                    case './iklan/body/':
                        $this->image_process($image_data, 286, 181, $gallery_path);
                        break;
                    case './iklan/footer/':
                        $this->image_process($image_data, 882, 115, $gallery_path);
                        break;
                }

                $data['img_name'] = $image_data['file_name'];
                $data['status'] = TRUE;
            } else {
                $data['status'] = FALSE;
                $this->session->set_flashdata('notif', 'File gagal di upload');
            }
        } catch (Exception $e) {
            $data['status'] = FALSE;
            $this->session->set_flashdata('notif', 'File gagal di upload');
        }
        return $data;
    }

    public function get_detail($id = NULL) {
        $query = $this->db->get_where('iklan', array('id' => $id));
        return $query->result();
    }

    public function get_all($type = NULL) {
        $this->db->order_by('tgl_input', 'desc');
        if ($type) {
            $this->db->where('type', $type);
        }
        $query = $this->db->get('iklan');
        return $query->result();
    }

    public function get_all_active($type = NULL) {
        $this->db->order_by('tgl_input', 'desc');
        $this->db->where('isActive', 1);
        if ($type) {
            $this->db->where('type', $type);
        }
        $query = $this->db->get('iklan');
        return $query->result();
    }

    public function save($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->table, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = $this->db->insert_id();
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = TRUE;
            }
        } else { //update the profile
            $result = $this->get_detail($id);
            if ($result[0]->gambarIklan != NULL && $_FILES['content']['error'] == 0) {
                $file_url = './iklan/' . $result[0]->type . '/' . $result[0]->gambarIklan;
                unlink($file_url);
            }
            $this->db->where('id', $id);
            if ($this->db->update($this->table, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = FALSE;
            }
        }
        return $data;
    }

    public function delete($id) {
        $result = $this->get_detail($id);
        if (count($result) > 0) {
            if ($result[0]->gambarIklan != '') {
                $file_url = './iklan/' . $result[0]->type . '/' . $result[0]->gambarIklan;
                unlink($file_url);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function delete_selected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->get_detail($id);
            if (count($result) > 0) {
                if ($result[0]->gambarIklan != '') {
                    $file_url = './iklan/' . $result[0]->type . '/' . $result[0]->gambarIklan;
                    unlink($file_url);
                }
                $this->db->trans_start();
                $this->db->query('DELETE FROM ' . $this->table . ' WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function pagination($url) {
        $i = 3;
        $config = array();
        $config["base_url"] = base_url() . "index.php/page/" . $url . '/';
        $config["total_rows"] = $this->count_data();
        $config["per_page"] = 9;
        $config["uri_segment"] = $i;
        $config['full_tag_open'] = '<ul>';
        $config['full_tag_close'] = '</ul>';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['prev_tag_open'] = '<li>';
        $config['prev_tag_close'] = '</li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a>';
        $config['cur_tag_close'] = '</a></li>';
        $config['next_link'] = 'Next';
        $config['prev_link'] = 'Previous';
        $choice = $config["total_rows"] / $config["per_page"];
        $config["num_links"] = round($choice);
        $this->pagination->initialize($config);
        $page = ($this->uri->segment($i)) ? $this->uri->segment($i) : 0;
        $data['num_links'] = $config["num_links"];
        $data["result"] = $this->fetch_data($config["per_page"], $page);
        $data["links"] = $this->pagination->create_links();
        return $data;
    }

    public function count_data() {
        $data = $this->get_all();
        $counter = 0;
        if (isset($data)) {
            $counter = count($data);
        }
        return $counter;
    }

    public function fetch_data($limit, $start) {
        $this->db->order_by('tgl_input', 'DESC');
        $this->db->limit($limit, $start);
        $query = $this->db->get('iklan');
        $data = $query->result();
        if (isset($data)) {
            return $data;
        }
    }

}

?>
