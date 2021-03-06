<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Artikel_model extends CI_Model {

    private $table = 'artikel';

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
                // proccess gambar 
                $this->image_process($image_data, 218, 217, $gallery_path . '/gambar');
                // proccess thumbnail
                $this->image_process($image_data, 57, 57, $gallery_path . '/thumbnail');

                //
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
        $query = $this->db->get_where('artikel', array('id' => $id));
        return $query->result();
    }

    public function get_all() {
        $query = $this->db->get('artikel');
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
            if ($result[0]->gambar != NULL && $_FILES['content']['error'] == 0) {
                $file_url = './artikel/gambar/' . $result[0]->gambar;
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
            if ($result[0]->gambar != '') {
                $file_url = './artikel/gambar/' . $result[0]->gambar;
                $file_url1 = './artikel/' . $result[0]->gambar;
                $file_url2 = './artikel/thumbnail/' . $result[0]->gambar;
                unlink($file_url);
                unlink($file_url1);
                unlink($file_url2);
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
                if ($result[0]->gambar != '') {
                    $file_url = './artikel/gambar/' . $result[0]->gambar;
                    $file_url1 = './artikel/' . $result[0]->gambar;
                    $file_url2 = './artikel/thumbnail/' . $result[0]->gambar;
                    unlink($file_url);
                    unlink($file_url1);
                    unlink($file_url2);
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

    public function set_input_rules($id = NULL) {
        $this->form_validation->set_error_delimiters('<span class="help-inline">', '</span>');
        if ($id) {
            $this->form_validation->set_rules('judul', 'Judul Artikel', 'required|min_length[5]');
        } else {
            $this->form_validation->set_rules('judul', 'Judul Artikel', 'required|min_length[5]|is_unique[artikel.judul]');
        }
        $this->form_validation->set_rules('deskripsi', 'Deskripsi Artikel', 'required|min_length[25]');
        $this->form_validation->set_rules('isi', 'Isi Artikel', 'required|min_length[100]');
    }

}

?>
