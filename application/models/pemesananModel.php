<?php if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class PemesananModel extends CI_Model {

    private $tab_category = 'kategori';
    private $tab_customer = 'customer';
    private $tab_items = 'pemesanan_produk';
    private $tab_orders = 'pemesanan';
    private $tab_products = 'produk';
    private $tab_status = 'statuspemesanan';
    private $tab_user = 'user';

    public function send_invoice_email($id) {
        $config = Array(
            'protocol' => "smtp",
            'smtp_host' => "ssl://smtp.googlemail.com",
            'smtp_port' => 465,
            'smtp_user' => "samandajimmyr@gmail.com",
            'smtp_pass' => "superbubur",
            'mailtype' => "html",
            'charset' => 'utf-8',
            'wordwrap' => 'false',
            'priority' => '1'
        );
        $is_alt = $this->get_is_alt($id);
        $data['detail'] = $this->get_pemesanan_detail($id, $is_alt);
        $data['produk'] = $this->getItemsList($id);
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $msg = $this->load->view('user/email', $data, true);
        $this->email->from('samandajimmyr@gmail.com', 'Jimmy Samanda');
        $this->email->to($data['detail'][0]->email);
        $this->email->subject('Conitso Online Invoice');
        $this->email->message($msg);
        $this->email->send();
        $this->generate_invoice_pdf($id);
    }

    public function generate_invoice_pdf($id) {
        $is_alt = $this->get_is_alt($id);
        $data['detail'] = $this->get_pemesanan_detail($id, $is_alt);
        $data['produk'] = $this->getItemsList($id);
        $html = $this->load->view('user/email', $data, true);
        $this->load->library('pdf');
        $file_location = FCPATH . '\invoice\invoice-' . $data['detail'][0]->noPemesanan . '.pdf';
        ini_set('memory_limit', '32M');
        $pdf = $this->pdf->load();
        $pdf->WriteHTML($html); // write the HTML into the PDF
        $pdf->Output($file_location, 'F'); // save to file because we can
    }

    public function get_pemesanan_detail($id, $is_alt) {
        $this->db->select('*');
        $this->db->select('pemesanan.id AS id_pemesanan');
        $this->db->from('pemesanan');
        $this->db->join('statuspemesanan', 'pemesanan.idStatus = statuspemesanan.id', 'inner');
        if ($is_alt) {
            $this->db->join('alt_customer', 'pemesanan.idCustomer = alt_customer.id', 'inner');
        } else {
            $this->db->join('customer', 'pemesanan.idCustomer = customer.id', 'inner');
        }
        $this->db->join('user', 'pemesanan.idUser = user.id', 'inner');
        $this->db->join('shipping', 'pemesanan.idShipping = shipping.id', 'inner');
        $this->db->where('pemesanan.id', $id);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_cust_detail($id, $is_alt) {
        if ($is_alt) {
            $query = $this->db->get_where('alt_customer', array('id' => $id));
        } else {
            $query = $this->db->get_where('customer', array('id' => $id));
        }
        return $query->result();
    }

    public function get_shipping_detail($id) {
        $query = $this->db->get_where('shipping', array('id' => $id));
        return $query->result();
    }

    public function get_is_alt($id) {
        $query = $this->db->get_where($this->tab_orders, array('id' => $id));
        $data = $query->result();
        return $data[0]->is_alt;
    }

    public function getOrdersDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_orders, array('noPemesanan' => $id));
        return $query->result();
    }

    public function getOrderDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_orders, array('id' => $id));
        return $query->result();
    }

    public function getCustomerOrders($idCustomer) {
        $query = $this->db->get_where($this->tab_orders, array('idUser' => $idCustomer));
        return $query->result();
    }

    public function getAllOrders() {
        $this->db->select('*');
        $this->db->select($this->tab_orders . '.id AS id_pemesanan');
        $this->db->from($this->tab_orders);
        $this->db->join($this->tab_status, $this->tab_orders . '.idStatus = ' . $this->tab_status . '.id', 'inner');
        $this->db->join($this->tab_customer, $this->tab_orders . '.idCustomer = ' . $this->tab_customer . '.id', 'inner');
        $this->db->order_by($this->tab_orders . '.tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getConfirmedOrders() {
        $this->db->select('*');
        $this->db->select($this->tab_orders . '.id AS id_pemesanan');
        $this->db->from($this->tab_orders);
        $this->db->join($this->tab_status, $this->tab_orders . '.idStatus = ' . $this->tab_status . '.id', 'inner');
        $this->db->join($this->tab_customer, $this->tab_orders . '.idCustomer = ' . $this->tab_customer . '.id', 'inner');
        $this->db->where($this->tab_status . '.id = 2');
        $this->db->order_by($this->tab_orders . '.tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function getNotConfirmedOrders() {
        $this->db->select('*');
        $this->db->select($this->tab_orders . '.id AS id_pemesanan');
        $this->db->from($this->tab_orders);
        $this->db->join($this->tab_status, $this->tab_orders . '.idStatus = ' . $this->tab_status . '.id', 'inner');
        $this->db->join($this->tab_customer, $this->tab_orders . '.idCustomer = ' . $this->tab_customer . '.id', 'inner');
        $this->db->where($this->tab_status . '.id = 1');
        $this->db->order_by($this->tab_orders . '.tglPemesanan', 'DESC');
        $query = $this->db->get();
        return $query->result();
    }

    public function saveOrders($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_orders, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $result = $this->getOrderDetail($id);
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_orders, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
    }

    public function deleteOrders($id) {
        $result = $this->getOrderDetail($id);
        if (count($result) > 0) {
            $query = $this->db->get_where($this->tab_items, array('idPemesanan' => $id));
            $items = $query->result();
            foreach ($items as $row) {
                $this->db->query('DELETE FROM pemesanan_produk WHERE id=' . $row->id);
            }
            $this->db->trans_start();
            $this->db->query('DELETE FROM pemesanan WHERE id=' . $id);
            $this->db->trans_complete();
            $data = $this->db->trans_status();

            return $data;
        }
    }

    public function deleteOrdersSelected($id_selected) {
        foreach ($id_selected as $id):
            $result = $this->getOrderDetail($id);
            if (count($result) > 0) {
                $query = $this->db->get_where($this->tab_items, array('idPemesanan' => $id));
                $items = $query->result();
                foreach ($items as $row) {
                    $this->db->query('DELETE FROM pemesanan_produk WHERE id=' . $row->id);
                }
                $this->db->trans_start();
                $this->db->query('DELETE FROM pemesanan WHERE id=' . $id);
                $this->db->trans_complete();
                $data[] = $this->db->trans_status();
            }
            if ($data == 0) {
                return FALSE;
                break;
            }
        endforeach;
    }

    public function getItemsDetail($id = NULL) {
        $query = $this->db->get_where($this->tab_items, array('id' => $id));
        return $query->result();
    }

    public function getAllItems() {
        
    }

    public function getItemsList($idOrders) {
        $this->db->select('*');
        $this->db->select($this->tab_items . '.id AS id_pemprod');
        $this->db->from($this->tab_items);
        $this->db->join($this->tab_products, $this->tab_items . '.idProduk = ' . $this->tab_products . '.id', 'inner');
        $this->db->where($this->tab_items . '.idPemesanan = ' . $idOrders);
        $query = $this->db->get();
        $param = $query->result();
        foreach ($param as $row) {
            $price = $row->hargaProduk;
            if ($row->discountProduk > 0) {
                $price = $row->stlhDiscount;
            }
            $data[] = array(
                'id' => $row->id,
                'qty' => $row->jumlahPemesananProduk,
                'price' => $price,
                'name' => $row->namaProduk,
                'gambar' => $row->gambarProduk,
                'berat' => $row->beratPemesananProduk,
                'subtotal' => $row->hargaPemesananProduk,
                'gambar' => $row->gambarProduk,
                'subtotalberat' => $row->beratPemesananProduk * $row->jumlahPemesananProduk
            );
        }
        return $data;
    }

    public function getItemsOrders($idOrders) {
        $query = $this->db->get_where($this->tab_items, array('idOrders' => $idOrders));
        return $query->result();
    }

    public function saveItems($id, $data) {
        if ($id == NULL) { //save the profile
            if ($this->db->insert($this->tab_items, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        } else { //update the profile
            $this->db->where('id', $id);
            if ($this->db->update($this->tab_items, $data)) {
                $this->session->set_flashdata('notif', 'Data telah berhasil disimpan');
            } else {
                $this->session->set_flashdata('notif', 'Data gagal disimpan, silahkan coba beberapa saat lagi');
            }
        }
    }

}

?>
