<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Banner_model extends CI_Model {

    private $tab_banner = 'banner';
    private $tab_iklan = 'iklan';

    public function get_all_active_banner() {
        $query = $this->db->get_where($this->tab_banner, array('isActive' => 1));
        return $query->result();
    }

    public function get_all_banner() {
        $query = $this->db->get($this->tab_banner);
        return $query->result();
    }

    public function get_banner_detail($id = NULL) {
        $query = $this->db->get_where($this->tab_banner, array('id' => $id));
        return $query->result();
    }

    public function save_banner($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_banner, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $result = $this->get_banner_detail($id);
            if ($result[0]->gambarBanner != '' && $_FILES['content']['error'] == 0) {
                $file_url = './banner/' . $result[0]->gambarBanner;
                $file_url1 = './banner/thumbnail/' . $result[0]->gambarBanner;
                unlink($file_url);
                unlink($file_url1);
            }
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_banner, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
    }

    public function delete_banner($id) {
        $result = $this->get_banner_detail($id);
        if ($result[0]->gambarBanner != '') {
            $file_url = './banner/' . $result[0]->gambarBanner;
            $file_url1 = './banner/thumbnail/' . $result[0]->gambarBanner;
            unlink($file_url);
            unlink($file_url1);
        }
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->query('DELETE FROM banner WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function delete_banner_selected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->get_banner_detail($id);
            if ($result[0]->gambarBanner != '') {
                $file_url = './banner/' . $result[0]->gambarBanner;
                $file_url1 = './banner/thumbnail/' . $result[0]->gambarBanner;
                unlink($file_url);
                unlink($file_url1);
            }
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->query('DELETE FROM banner WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
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
        print_r($diff_x);
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
                    case './banner/iklan/':
                        $this->image_process($image_data, 286, 181, $gallery_path);
                        break;
                    case './banner/':
                        $this->image_process($image_data, 45, 45, $gallery_path . '/thumbnail');

                        $this->image_process($image_data, 882, 373, $gallery_path);
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

}

?>
