<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class ProdukModel extends CI_Model {

    private $tab_merk = 'merk';
    private $tab_kategori = 'kategori';
    private $tab_kategoriMerk = 'kategori_merk';
    private $tab_produk = 'produk';
    private $tab_gambar_produk = 'gambar_produk';
    private $tab_spesifikasi = 'spesifikasi';
    private $tab_produkSpesifikasi = 'produk_spesifikasi';
    private $result;

    public function getKategoriDrop() {
        $query = $this->db->get($this->tab_kategori);
        $kategori = $query->result();
        if (isset($kategori)) {
            $data[0] = '- Pilih Satu -';
            foreach ($kategori as $row) {
                $data[$row->id] = $row->namaKategori;
            }
        }
        return $data;
    }

    function get_status_drop() {
        $data[''] = 'Pilih satu';
        $query = $this->db->query("SHOW COLUMNS FROM produk LIKE 'status'")->row(0)->Type;
        preg_match("/^enum\((.*)\)$/", $query, $matches);
        $param = explode(',', $matches[1]);
        foreach ($param as $row) {
            $data[trim($row, "'")] = trim($row, "'");
        }
        if ($this->session->userdata('tipeUser') != -1) {
            unset($data['deleted']);
        }
        return $data;
    }

    public function getMerkDrop($idKategori) {
        $this->db->select($this->tab_kategoriMerk . '.*');
        $this->db->select($this->tab_merk . '.namaMerk');
        $this->db->from($this->tab_kategoriMerk);
        $this->db->join($this->tab_kategori, $this->tab_kategoriMerk . '.idKategori = ' . $this->tab_kategori . '.id', 'inner');
        $this->db->join($this->tab_merk, $this->tab_kategoriMerk . '.idMerk = ' . $this->tab_merk . '.id', 'inner');
        $this->db->where($this->tab_kategoriMerk . '.idKategori', $idKategori);
        $query = $this->db->get();
        $merk = $query->result();
        if (isset($merk)) {
            $data[0] = '- Pilih Satu -';
            foreach ($merk as $row) {
                $data[$row->idMerk] = $row->namaMerk;
            }
        }
        return $data;
    }

    public function getProdukMerkDrop($idKategori = NULL) {
        if ($idKategori == null) {
            $data[0] = 'Merk tidak tersedia';
        } else {
            $this->db->select($this->tab_kategoriMerk . '.*');
            $this->db->select($this->tab_merk . '.namaMerk');
            $this->db->from($this->tab_kategoriMerk);
            $this->db->join($this->tab_kategori, $this->tab_kategoriMerk . '.idKategori = ' . $this->tab_kategori . '.id', 'inner');
            $this->db->join($this->tab_merk, $this->tab_kategoriMerk . '.idMerk = ' . $this->tab_merk . '.id', 'inner');
            $this->db->where($this->tab_kategoriMerk . '.idKategori', $idKategori);
            $query = $this->db->get();
            $merk = $query->result();

            $this->db->select($this->tab_spesifikasi . '.*');
            $this->db->from($this->tab_spesifikasi);
            $this->db->join($this->tab_kategori, $this->tab_spesifikasi . '.idKategori = ' . $this->tab_kategori . '.id', 'inner');
            $this->db->where($this->tab_spesifikasi . '.idKategori', $idKategori);
            $query = $this->db->get();
            $spek = $query->result();

            if ($merk || $spek) {
                foreach ($merk as $row) {
                    $data[0][$row->idMerk] = $row->namaMerk;
                }
                foreach ($spek as $row) {
                    $data[1][$row->id] = $row->namaSpesifikasi;
                }
            } else {
                return FALSE;
            }
        }
        return $data;
    }

    public function getSpesifikasiProduk($idKategori) {
        $this->db->select($this->tab_spesifikasi . '.*');
        $this->db->from($this->tab_spesifikasi);
        $this->db->join($this->tab_kategori, $this->tab_spesifikasi . '.idKategori = ' . $this->tab_kategori . '.id', 'inner');
        $this->db->where($this->tab_spesifikasi . '.idKategori', $idKategori);
        $query = $this->db->get();
        $data = $query->result();
        return $data;
    }

    public function get_isi_spesifikasi($id_spek, $id_produk) {
        $this->db->select('ps.*');
        $this->db->from('produk_spesifikasi as ps');
        $this->db->join('produk as p', 'ps.idProduk = p.id', 'inner');
        $this->db->join('spesifikasi as s', 'ps.idspesifikasi = s.id', 'inner');
        $this->db->where('ps.idProduk', $id_produk);
        $this->db->where('ps.idSpesifikasi', $id_spek);
        $query = $this->db->get();
        return $query->result();
    }

    public function getIsiSpesifikasi($id_kategori) {
        $this->db->select('*');
        $this->db->select('s.id as idSpesifikasi');
        $this->db->from('spesifikasi as s');
        $this->db->join('kategori as k', 's.idKategori = k.id', 'inner');
        $this->db->where('s.idKategori', $id_kategori);
        $this->db->order_by('s.id', 'ASC');
        $query = $this->db->get();
        $data = $query->result();
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
                // proccess gambar 
                $this->image_process($image_data, 218, 217, $gallery_path . '/gambar');
                // proccess thumbnail
                $this->image_process($image_data, 57, 57, $gallery_path . '/thumbnail');
                // proccess iklan
                $this->image_process($image_data, 122, 122, $gallery_path . '/iklan');
                $this->image_process($image_data, 353, 284, $gallery_path);

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

    public function getAllProduk($tipe_user = NULL) {
        $this->db->select($this->tab_produk . '.*');
        $this->db->select($this->tab_kategori . '.namaKategori');
        $this->db->select($this->tab_merk . '.namaMerk');
        $this->db->from($this->tab_produk);
        $this->db->join($this->tab_kategori, $this->tab_produk . '.idKategori = ' . $this->tab_kategori . '.id', 'left');
        $this->db->join($this->tab_merk, $this->tab_produk . '.idMerk = ' . $this->tab_merk . '.id', 'left');
        if ($tipe_user == -2) {
            $this->db->where('produk.status !=', 'deleted');
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_best_seller() {
        $this->db->select('a.idProduk, Sum(a.jumlahPemesananProduk) AS jml, b.*');
        $this->db->from('pemesanan_produk AS a');
        $this->db->join('produk AS b', 'a.idProduk = b.id', 'inner');
        $this->db->group_by('a.idProduk');
        $this->db->order_by('jml', 'desc');
        $this->db->where('b.status', 'published');
        $this->db->limit(16);
        $query = $this->db->get();
        if ($query->num_rows() < 16) {
            $this->db->order_by('tglInput', 'desc');
            $this->db->limit(16);
            $query = $this->db->get('produk');
        }
        return $query->result();
    }

    public function getProdukDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_produk, array('id' => $id));
        return $query->result();
    }

    public function get_gambar_produk_detail($id = NULL) {
        $query = $this->db->get_where('gambar_produk', array('id' => $id));
        return $query->result();
    }

    public function getKategoriMerkId($idKategori, $idMerk) {
        $this->db->where('idKategori', $idKategori);
        $this->db->where('idMerk', $idMerk);
        $query = $this->db->get($this->tab_kategoriMerk);
        $data = $query->result();
        return $data[0]->id;
    }

    public function getSameName($username) {
        $this->db->select('*');
        $this->db->from($this->tab_user);
        $this->db->where('username', $username);
        $query = $this->db->get();
        $result = $query->result();
        return $result;
    }

    public function saveProduk($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_produk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = $this->db->insert_id();
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = TRUE;
            }
        } else { //update the profile
            $result = $this->getProdukDetail($id);
            if ($result[0]->gambarProduk != NULL && $_FILES['content']['error'] == 0) {
                $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                $file_url2 = './produk/' . $result[0]->gambarProduk;
                $file_url3 = './produk/iklan/' . $result[0]->gambarProduk;
                unlink($file_url);
                unlink($file_url1);
                unlink($file_url2);
                unlink($file_url3);
            }
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_produk, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data = TRUE;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data = FALSE;
            }
        }
        return $data;
    }

    public function save_detail_produk($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert('gambar_produk', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data['error'] = 1;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data['error'] = 0;
            }
        } else { //update the profile
            $result = $this->get_gambar_produk_detail($id);
            if ($result[0]->detail_gambar != '') {
                unlink('./produk/detail/' . $result[0]->detail_gambar);
                unlink('./produk/detail/gambar/' . $result[0]->detail_gambar);
                unlink('./produk/detail/thumbnail/' . $result[0]->detail_gambar);
            }
            $this->db->where('id', $id);
            if ($this->db->update('gambar_produk', $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        $data = $this->db->insert_id();
        return $data;
    }

    public function saveProdukSpesifikasi($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_produkSpesifikasi, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
                $data['error'] = 1;
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
                $data['error'] = 0;
            }
        } else { //update the profile
            $result = $this->getProdukSpesifikasiDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_produkSpesifikasi, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
        $data = $this->db->insert_id();
        return $data;
    }

    public function getProdukSpesifikasiDetail($idProdukSpesifikasi) {
        $query = $this->db->get_where($this->tab_produkSpesifikasi, array('id' => $idProdukSpesifikasi));
        return $query->result();
    }

    public function add_qty($id, $qty) {
        $return = FALSE;
        $this->db->where('id', $id);
        $this->db->update('produk', array('jml_stok' => $qty));
        if ($this->db->affected_rows()) {
            $return = TRUE;
        }
        return $return;
    }

    public function deleteProduk($id) {
        $result = $this->getProdukDetail($id);
        if (count($result) > 0) {
            $this->db->trans_start();
            $this->db->update('produk', array('status' => 'deleted'), array('id' => $id));
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function delete_permanently($id) {
        $result = $this->getProdukDetail($id);
        if (count($result) > 0) {
            if ($result[0]->gambarProduk != '') {
                $detail = $this->get_gambar_detail($id);
                if (isset($detail)) {
                    foreach ($detail as $row) {
                        unlink('./produk/detail/' . $row->detail_gambar);
                        unlink('./produk/detail/gambar/' . $row->detail_gambar);
                        unlink('./produk/detail/thumbnail/' . $row->detail_gambar);
                    }
                }
                $file_url = './produk/gambar/' . $result[0]->gambarProduk;
                $file_url1 = './produk/thumbnail/' . $result[0]->gambarProduk;
                $file_url2 = './produk/' . $result[0]->gambarProduk;
                $file_url3 = './produk/iklan/' . $result[0]->gambarProduk;
                unlink($file_url);
                unlink($file_url1);
                unlink($file_url2);
                unlink($file_url3);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM ' . $this->tab_produk . ' WHERE id=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_produkSpesifikasi . ' WHERE idProduk=' . $id);
            $this->db->query('DELETE FROM ' . $this->tab_gambar_produk . ' WHERE idProduk=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteProdukSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getProdukDetail($id);
            if (count($result) > 0) {
                $this->db->trans_start();
                $this->db->update('produk', array('status' => 'deleted'), array('id' => $id));
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function searchAutoProduk($key) {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->like('namaProduk', $key);
        $query = $this->db->get();
        foreach ($query->result() as $row) {
            $data[$row->id] = $row->namaProduk;
        }
        return $data;
    }

    public function getProdukBestSeller() {
        $this->db->select('*');
        $this->db->select('produk.id AS id_produk');
        $this->db->from('produk');
        $this->db->join('kategori_merk', 'produk.idKategoriMerk = kategori_merk.id', 'left');
        $this->db->join('kategori', 'kategori_merk.idKategori = kategori.id', 'left');
        $this->db->join('merk', 'kategori_merk.idMerk = merk.id', 'left');
        $this->db->where('produk.isBest_seller', 1);
        $this->db->where('produk.status', 'published');
        $query = $this->db->get();
        return $query->result();
    }

    public function produkPagination($url, $assoc) {
        $i = 3;
        foreach ($assoc as $key => $value) {
            switch ($key) {
                case 'kategori':
                    $i = $i + 2;
                    $url .= '/' . $key . '/' . $value;
                    break;
                case 'merk':
                    $i = $i + 2;
                    $url .= '/' . $key . '/' . $value;
                    break;
                case 'pricefrom':
                    $i = $i + 2;
                    $url .= '/' . $key . '/' . $value;
                    break;
                case 'priceto':
                    $i = $i + 2;
                    $url .= '/' . $key . '/' . $value;
                    break;
                case 'search':
                    $i = $i + 2;
                    $url .= '/' . $key . '/' . $value;
                    break;
            }
        }
        $config = array();
        $page = ($this->uri->segment($i)) ? $this->uri->segment($i) : 0;
        $config["per_page"] = 2;
        $config["base_url"] = site_url('page/') . '/' . $url . "/";
        $config["total_rows"] = $this->fetchData(0, $page, $assoc);
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
        $data['num_links'] = $config["num_links"];
        $data["result"] = $this->fetchData($config["per_page"], $page, $assoc);
		$data['total_rows'] = $config["total_rows"];
        $data["links"] = $this->pagination->create_links();
        return $data;
    }

    public function fetchData($limit, $start, $assoc) {
        $this->db->select('*');
        $this->db->select('produk.id AS id_produk');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.idKategori = kategori.id', 'left');
        $this->db->join('merk', 'produk.idMerk = merk.id', 'left');
        $this->db->where('produk.status', 'published');
        if (isset($assoc['kategori']))
            $this->db->where('produk.idKategori', $assoc['kategori']);
        if (isset($assoc['merk']))
            $this->db->where('produk.idMerk', $assoc['merk']);
        if (isset($assoc['pricefrom']))
            $this->db->where('produk.hargaProduk >=', $assoc['pricefrom']);
        if (isset($assoc['priceto']))
            $this->db->where('produk.hargaProduk <=', $assoc['priceto']);
        if (isset($assoc['search'])) {
            $this->db->where('produk.namaProduk LIKE', '%' . $assoc['search'] . '%');
//            $this->db->where('merk.namaMerk LIKE', '%' . $assoc['search'] . '%');
//            $this->db->where('kategori.namaKategori LIKE', '%' . $assoc['search'] . '%');
            $this->db->where('produk.deskripsiProduk LIKE', '%' . $assoc['search'] . '%');
        }
        $this->db->order_by($this->tab_produk . '.tglInput', 'DESC');
        if ($limit > 0) {
            $return = $this->db->limit($limit, $start)->get()->result();
        } else {
            $return = $this->db->get()->num_rows();
        }
        return $return;
    }

    public function getProdukMerk($id_kategori, $id_merk, $limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->select('produk.id AS id_produk');
        $this->db->from('produk');
        $this->db->join('merk', 'produk.idMerk = merk.id', 'left');
        $this->db->join('kategori', 'produk.idKategori = kategori.id', 'left');
        $this->db->where('produk.status', 'published');
        $this->db->where('produk.idKategori', $id_kategori);
        $this->db->where('produk.idMerk', $id_merk);
        if ($limit) {
            $this->db->limit($limit, $start);
            $this->db->order_by($this->tab_produk . '.tglInput', 'DESC');
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function getProdukKategori($id_kategori = NULL, $price = NULL, $cari = NULL, $limit = NULL, $start = NULL) {
        $this->db->select('*');
        $this->db->select('produk.id AS id_produk');
        $this->db->from('produk');
        $this->db->join('kategori', 'produk.idKategori = kategori.id', 'left');
        $this->db->join('merk', 'produk.idMerk = merk.id', 'left');
        $this->db->where('produk.status', 'published');
        if ($id_kategori) {
            $this->db->where('produk.idKategori', $id_kategori);
        }
        if ($cari) {
            $this->db->like('produk.namaProduk', $cari);
            $this->db->or_like('merk.namaMerk', $cari);
            $this->db->or_like('kategori.namaKategori', $cari);
            $this->db->or_like('produk.deskripsiProduk', $cari);
        }
        if ($price) {
            $this->db->where('hargaProduk >=', $price['priceMin']);
            if ($price['priceMax'] != 0) {
                $this->db->where('hargaProduk <=', $price['priceMax']);
            }
        }
        if ($limit) {
            $this->db->limit($limit, $start);
            $this->db->order_by($this->tab_produk . '.tglInput', 'DESC');
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_spesifikasi_produk($id_produk) {
        $this->db->select('*');
        $this->db->select('produk_spesifikasi.id AS id_prospek');
        $this->db->from('produk_spesifikasi');
        $this->db->join('spesifikasi', 'produk_spesifikasi.idSpesifikasi = spesifikasi.id', 'inner');
        $this->db->where('produk_spesifikasi.idProduk', $id_produk);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_berat_produk($id_produk) {
        $this->db->select('*');
        $this->db->from('produk_spesifikasi');
        $this->db->join('spesifikasi', 'produk_spesifikasi.idSpesifikasi = spesifikasi.id', 'inner');
        $this->db->where('produk_spesifikasi.idProduk', $id_produk);
        $this->db->where('spesifikasi.namaSpesifikasi', 'Berat');
        $query = $this->db->get();
        return $query->result();
    }

    public function multiple_upload($gallery_path, $idProduk, $id = NULL) {
        $file_error = 0;
        $data['idProduk'] = $idProduk;
        $this->load->library('upload');

        $config = array(
            'allowed_types' => 'jpg|jpeg|png',
            'encrypt_name' => TRUE,
            'upload_path' => $gallery_path
        );

        $this->upload->initialize($config);
        $i = 0;
        $param = array('name', 'type', 'tmp_name', 'error', 'size');
        foreach ($_FILES['detail_content'] as $row) {
            $j = 0;
            foreach ($row as $rows) {
                $files[$j][$param[$i]] = $rows;
                $j++;
            }
            $i++;
        }
        $idx = 0;
        foreach ($files as $field => $file) {
            // No problems with the file
            if ($file['error'] == 0) {
                $ids = NULL;
                if ($id != NULL) {
                    $ids = $id[$idx];
                    $idx++;
                }
                $_FILES['userfile']['name'] = $file['name'];
                $_FILES['userfile']['type'] = $file['type'];
                $_FILES['userfile']['tmp_name'] = $file['tmp_name'];
                $_FILES['userfile']['error'] = $file['error'];
                $_FILES['userfile']['size'] = $file['size'];
                if ($this->upload->do_upload()) {
                    // So lets upload
                    $param = $this->upload->display_errors();
                    $image_data = $this->upload->data();
                    // proccess gambar 
                    $this->image_process($image_data, 218, 217, $gallery_path . '/gambar');
                    // proccess thumbnail
                    $this->image_process($image_data, 57, 57, $gallery_path . '/thumbnail');

                    $this->image_process($image_data, 353, 284, $gallery_path);

                    //
                    $data['detail_gambar'] = $image_data['file_name'];
                    $this->save_detail_produk($ids, $data);
                } else {
                    $file_error++;
                }
            } else {
                $file_error++;
            }
        }
        return $file_error;
    }

    public function get_gambar_detail($id) {
        $query = $this->db->get_where('gambar_produk', array('idProduk' => $id));
        return $query->result();
    }

    public function get_produk_spek($id_produk) {
        $this->db->select('ps.*');
        $this->db->from('produk AS p');
        $this->db->join('produk_spesifikasi AS ps', 'ps.idProduk = p.id', 'inner');
        $this->db->join('spesifikasi AS s', 'ps.idSpesifikasi = s.id', 'inner');
        $this->db->where('ps.idProduk', $id_produk);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_search_produk() {
        $this->db->select($this->tab_produk . '.*');
        $this->db->select($this->tab_kategori . '.namaKategori');
        $this->db->select($this->tab_merk . '.namaMerk');
        $this->db->from($this->tab_produk);
        $this->db->join($this->tab_kategori, $this->tab_produk . '.idKategori = ' . $this->tab_kategori . '.id', 'inner');
        $this->db->join($this->tab_merk, $this->tab_produk . '.idMerk = ' . $this->tab_merk . '.id', 'inner');
        $this->db->where('produk.status !=', 'deleted');
        if ($_POST) {
            if ($_POST['range']['from'] && $_POST['range']['to']) {
                $this->db->where('produk.hargaProduk >=', $_POST['range']['from']);
                $this->db->where('produk.hargaProduk <=', $_POST['range']['to']);
            }
            if ($_POST['nama']) {
                $this->db->like('produk.namaProduk', $_POST['nama']);
            }
            if ($_POST['kategori']) {
                $this->db->where('produk.idKategori', $_POST['kategori']);
            }
            if (isset($_POST['merk'])) {
                $this->db->where('produk.idMerk', $_POST['merk']);
            }
            if ($_POST['id_hot'] < 2) {
                $this->db->where('produk.isBest_seller', $_POST['id_hot']);
            }
            if (isset($_POST['status']) && $_POST['status']) {
                $this->db->where('produk.status', $_POST['status']);
            }
        }
        $query = $this->db->get();
        return $query->result();
    }

    public function get_latest_produk($day) {
        $this->db->select('*');
        $this->db->from('produk');
        $this->db->where('tglInput BETWEEN NOW() - INTERVAL ' . $day . ' DAY AND NOW()');
        $this->db->order_by('tglInput', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function update_status($id, $status) {
        $query = $this->db->get_where('produk', array('id' => $id));
        if ($query->num_rows() > 0) {
            $this->db->update('produk', array('status' => $status), array('id' => $id));
            return TRUE;
        } else {
            return FALSE;
        }
    }

}

?>
