

<?php
$logged_in = $this->session->userdata('logged_in');
if (!$logged_in) {
    ?>
    <!-- MODAL FORGOT PASSWORD -->
    <div id="conf_acc_modal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Apakah Anda telah memiliki account ?</h3>
        </div>
        <div class="modal-footer">
            <a href="<?php echo site_url('page/login_register/checkout') ?>" class="btn large btn-info login_checkout">Ya</a>
            <a href="<?php echo site_url('page/detail_data/'); ?>" class="btn large btn-info">Tidak</a>
        </div>
    </div>
    <!-- END MODAL FORGOT PASSWORD -->
    <?php
}
?>
<div class="container" style="margin-bottom: 40px;">


    <div class="row-fluid">
        <div class="span12">

            <form action="<?php echo $action; ?>" class="<?php echo isset($form_class) ? $form_class : 'form-shipping'; ?>" method="post" accept-charset="utf-8" id="<?php echo isset($form_id) ? $form_id : 'cart-form'; ?>">
                <div class="row-fluid">

                    <div class="span9">
                        <div id="crumbs" class="step" style="border: none;">
                            <ul>
                                <?php
                                switch ($this->uri->segment(2)) {
                                    case 'detail_data':
                                        $active1 = 'active';
                                        $active2 = 'next';
                                        $active3 = 'next';
                                        $active4 = 'next';
                                        break;
                                    case 'keranjang_beli':
                                        if ($this->uri->segment(4) == 'success') {
                                            $active1 = 'next';
                                            $active2 = 'next';
                                            $active3 = 'next';
                                            $active4 = 'active';
                                        } else {
                                            $active1 = 'before';
                                            $active2 = 'active';
                                            $active3 = 'next';
                                            $active4 = 'next';
                                        }
                                        break;
                                }
                                if ($this->session->userdata('logged_in') || $this->uri->segment(2) == 'detail_data') {
                                    $id = $this->session->userdata('logged_in') ? $this->session->userdata('id') : '';
                                    echo '<li><a class="' . $active1 . '" href="' . site_url('page/detail_data/' . $id) . '">My Details Data</a></li>';
                                }
                                ?>
                                <li><a class="<?php echo $active2; ?>" href="<?php echo site_url('page/keranjang_beli'); ?>">My Shopping Cart</a></li>
                                <li><a class="<?php echo $active3; ?>" href="">Shipping & Payment</a></li>
                                <li><a class="<?php echo $active4; ?>" href="">Finish</a></li>
                            </ul>
                        </div>
                        <?php
                        if ($this->uri->segment(2) == 'detail_data') {
                            $email = array(
                                'name' => 'email',
                                'id' => 'email',
                                'type' => 'email',
                                'class' => 'span12',
                                'value' => isset($detail_customer) ? $detail_customer['user'][0]->email : '',
                            );

                            $password = array(
                                'name' => 'password',
                                'id' => 'password',
                                'type' => 'password',
                                'class' => 'span12',
                                'value' => set_value('password')
                            );

                            $conf_pass = array(
                                'name' => 'conf_pass',
                                'id' => 'conf_pass',
                                'type' => 'password',
                                'class' => 'span12',
                                'value' => set_value('conf_pass')
                            );

                            $nama_jelas = array(
                                'name' => 'nama_jelas',
                                'id' => 'nama_jelas',
                                'class' => 'span12',
                                'value' => isset($detail_customer) ? $detail_customer['profile'][0]->nama_jelas : ''
                            );

                            $jenis_kelamin = array(
                                'Pria' => 'Pria',
                                'Wanita' => 'Wanita'
                            );

                            $no_telp = array(
                                'name' => 'no_telepon',
                                'id' => 'no_telepon',
                                'class' => 'span12',
                                'value' => isset($detail_customer) ? $detail_customer['profile'][0]->no_telepon : ''
                            );
                            if (isset($detail_customer)) {
                                ?>
                                <input type="hidden" name="id_user" value="<?php echo $detail_customer['user'][0]->id; ?>">
                                <input type="hidden" name="id_cust" value="<?php echo $detail_customer['profile'][0]->id; ?>">
                                <?php
                            }
                            ?>
                            <div class="register">

                                <div class="titleHeader clearfix">
                                    <h3>Silahkan Daftar Diri Anda</h3>
                                </div><!--end titleHeader-->
                                <div class="registerdesc">
                                    <p>Bisa kami menyita 2 menit waktu anda untuk melengkapi form di bawah?<br />
                                        setelah itu anda dapet kembali berbelanja dan menikmati beberapa keuntungan khusus. </p>
                                </div>

                                <?php if (validation_errors()) : ?>
                                    <div class="error-top"><img width="15px" height="15px;
                                                                " src="<?php echo base_url('assets/user/img/ximg.jpg'); ?>" /><span>Data yang Anda Masukan Tidak Sesuai</span></div>
                                    <?php endif; ?>
                                <div class="register_check">
                                    <input type="hidden" name="prev_url" value="checkout" >
                                    <div class="error-top" style="display: none;"><img width="15px" height="15px;" src="<?php echo base_url('assets/user/img/ximg.jpg'); ?>" /><span></span></div>
                                    <div class="control-group">
                                        <?php echo form_label('Email&nbsp;<span class="required">*</span>', $email['id'], array('class' => 'control-label')); ?>
                                        <div class="controls">
                                            <?php
                                            if (isset($detail_customer)) {
                                                $email['disabled'] = 'disabled';
                                            }
                                            echo form_input($email);
                                            if (form_error($email['name'])) {
                                                ?>
                                                <error_box><label class="error">
                                                        <?php
                                                        echo form_error($email['name']);
                                                        ?>									
                                                    </label></error_box>
                                                <?php
                                            }
                                            ?>

                                        </div>
                                    </div><!--end control-group-->

                                    <?php
                                    if (!isset($detail_customer)) {
                                        ?>

                                        <div class="control-group">
                                            <?php echo form_label('Password&nbsp;<span class="required">*</span>', $password['id'], array('class' => 'control-label')); ?>
                                            <div class="controls">
                                                <?php
                                                echo form_input($password);
                                                if (form_error($password['name'])) {
                                                    ?>
                                                    <error_box><label class="error">
                                                            <?php
                                                            echo form_error($password['name']);
                                                            ?>
                                                        </label></error_box>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><!--end control-group--> 

                                        <div class="control-group">
                                            <?php echo form_label('Ulangi Password&nbsp;<span class="required">*</span>', $conf_pass['id'], array('class' => 'control-label')); ?>
                                            <div class="controls">
                                                <?php
                                                echo form_input($conf_pass);
                                                if (form_error($conf_pass['name'])) {
                                                    ?>
                                                    <error_box><label class="error">
                                                            <?php
                                                            echo form_error($conf_pass['name']);
                                                            ?>
                                                        </label></error_box>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><!--end control-group--> 
                                        <?php
                                    }
                                    ?>

                                    <div class="control-group">
                                        <?php echo form_label('Nama Lengkap&nbsp;<span class="required">*</span>', $nama_jelas['id'], array('class' => 'control-label')); ?>
                                        <div class="controls">
                                            <?php
                                            echo form_input($nama_jelas);
                                            if (form_error($nama_jelas['name'])) {
                                                ?>
                                                <error_box><label class="error">
                                                        <?php
                                                        echo form_error($nama_jelas['name']);
                                                        ?>
                                                    </label></error_box>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div><!--end control-group--> 

                                    <div class="control-group">
                                        <?php echo form_label('No Handphone&nbsp;<span class="required">*</span>', $no_telp['id'], array('class' => 'control-label')); ?>
                                        <div class="controls">
                                            <?php
                                            echo form_input($no_telp);
                                            if (form_error($no_telp['name'])) {
                                                ?>
                                                <error_box><label class="error">
                                                        <?php
                                                        echo form_error($no_telp['name']);
                                                        ?>
                                                    </label></error_box>
                                                <?php
                                            }
                                            ?>
                                        </div>
                                    </div><!--end control-group--> 

                                    <div class="control-group">
                                        <label class="control-label" for="jenis_kelamin">Jenis Kelamin<span class="required">*</span></label>
                                        <div class="controls">
                                            <?php
                                            $gender = isset($detail_customer) ? $detail_customer['profile'][0]->jenis_kelamin : '';
                                            echo form_dropdown('jenis_kelamin', $jenis_kelamin, $gender, 'class="span12" id="jenis_kelamin"');
                                            ?>
                                        </div>
                                    </div><!--end control-group-->

                                    <?php
                                    if (!isset($detail_customer)) {
                                        ?>

                                        <div class="control-group">
                                            <div class="controls">
                                                <label class="checkbox">
                                                    I'v read and agreed on <a href="#">Terms &amp; Conditions</a>
                                                    <input name="term" type="checkbox"> 
                                                </label>
                                                <?php
                                                if (form_error('term')) {
                                                    ?>
                                                    <error_box><label class="error">
                                                            <?php
                                                            echo form_error('term');
                                                            ?>
                                                        </label></error_box>
                                                    <?php
                                                }
                                                ?>
                                            </div>
                                        </div><!--end control-group-->
                                        <?php
                                    }
                                    ?>

                                    <div class="control-group">
                                        <div class="controls">
                                            <div class="btn-register">
                                                <button type="submit" class="btn btn-info">Next</button>
                                            </div>
                                        </div>
                                    </div><!--end control-group-->
                                </div>

                            </div><!--end register-->
                            <?php
                        } else {
                            //echo strlen($var) > 1 ? "TRUE" : "FALSE";
                            if (isset($success)) {
                                $cart = $pemesanan['produk'];
                                $detail = $pemesanan['detail'][0];
                                $biaya_pengiriman = 'Rp. ' . number_format($detail->biayaPengiriman, 0, ',', '.');
                                ?>
                                <div class="cart-thanks">
                                    <h3>Thank You for Shopping with Conitso.com</h3>
                                    Rekap transaksi telah kami kirimkan ke email Anda.
                                    <br>
                                    Invoice juga dapat di-download dalam bentuk PDF melalui 'Download Invoice' di halaman ini.
                                </div>
                                <?php
                            } else {
                                $success = FALSE;
                            }
                            if ($cart != NULL) {
                                echo $success ? '<h2 class="cart-title">Purchased Items</h2>' : '';
                                foreach ($cart as $row) {
                                    $price = 'Rp. ' . number_format($row['price'], 0, ',', '.');
                                    $price_subtotal = 'Rp. ' . number_format($row['subtotal'], 0, ',', '.');
                                    $hidden = array(
                                        'rowid[]' => $success ? $row['id'] : $row['rowid'],
                                    );
                                    echo form_hidden($hidden);
                                    $cartopt = $success ? '' : $this->cart->product_options($row['rowid']);
                                    $gambar = $success ? $row['gambar'] : $cartopt['gambar'];
                                    ?>
                                    <div class="cart">
                                        <div class="cart-img"><img src="<?php echo base_url('produk/thumbnail/' . $gambar); ?>" alt=""></div>   
                                        <div class="cart-desc">
                                            <div class="cart-line line_cart">
                                                <div class="cart-name"><h2><?php echo $row['name'] ?></h2></div>
                                                <div class="cart-qty"><?php echo $price; ?> x <?php echo $success ? $row['qty'] : '<input type="number" class="span3 qty" name="jumlah[]" id="' . $row['rowid'] . '" value="' . $row['qty'] . '" data-val="' . $row['id'] . '">'; ?></div>
                                                <div class="cart-total"><?php echo $price_subtotal; ?></div>
                                            </div>
                                            <div class="cart-line">
                                                <div>
                                                    SKU SYSM01BK &nbsp; Shipping Weight <?php echo $row['berat']; ?> kg
                                                </div>
                                                <?php echo $success ? '' : '<div class="cart-remove"><a href="' . site_url('page/keranjang_beli/' . $row['rowid'] . '/delete') . '">Remove</a></div>'; ?>

                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                                ?>

                                <div class="clearfix"></div>
                                <?php
                            } else {
                                ?>
                                <div class="box">
                                    <div class="emptyCartWrapper">
                                        <div class="emptyCartState"></div>
                                        <div>
                                            <h2>Why It's still Empty :(</h2>
                                            <ul class="emptyCartOpt">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            $total_price = $success ? $detail->biayaPemesanan : $this->cart->total();
                            if ($success) {
                                $tarif = 'Rp. ' . number_format($detail->tarif, 0, ',', '.');
                                ?>
                                <div>
                                    <div class="blog-tab">
                                        <h2 class="cart-title">Shipped To</h2>
                                        <div class="tab-content">
                                            <div class="tab-pane active" id="popular-post">
                                                <table class="shipping-table">
                                                    <tbody>
                                                        <tr>
                                                            <td>Nama</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->nama_jelas; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Nomor Telepon</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->no_telepon; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Jenis Kelamin</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->jenis_kelamin; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Alamat</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->alamat; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Provinsi</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->state_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kota</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->city_name; ?></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Kode Pos</td>
                                                            <td>:</td>
                                                            <td><?php echo $detail->kode_pos; ?></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>

                                    </div><!--end tab-content--><!--end blog-tab-->
                                    <div class="shipping-box">
                                        <div class="shipping-method">
                                            <h2 class="cart-title">Shipping Method</h2>
                                            <div class="shipping-info">Pengiriman dengan JNE dikenakan biaya asuransi sebesar 0,1% darti total harga barang</div>
                                            <div class="shipping-detail">
                                                <div class="detail-line">
                                                    <div class="">JNE Reg</div>
                                                    <div class=""><?php echo $tarif . ' x ' . $detail->beratPemesanan . ' kg'; ?></div>
                                                    <div class=""><?php echo $biaya_pengiriman; ?></div>

                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                    <div class="total_payment">
                                        <h2 class="cart-title">Transaction Summary</h2>
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th>qty</th>
                                                    <th>weight</th>
                                                    <th>kode unik</th>
                                                    <th>shipping cost</th>
                                                    <th>total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td><?php echo $detail->jmlPemesanan; ?></td>
                                                    <td><?php echo $detail->beratPemesanan . ' Kg'; ?></td>
                                                    <td><?php echo $detail->kode_unik; ?></td>
                                                    <td><?php echo $biaya_pengiriman; ?></td>
                                                    <td><?php echo 'Rp. ' . number_format($total_price, 0, ',', '.'); ?></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="payment-box">
                                        <h2 class="cart-title">Payment Method</h2>
                                        <div class="row-fluid">
                                            <div class="span6">
                                                <p>
                                                    Transfer Bank<br>
                                                    Jumlah yang harus dibayar : <?php echo 'Rp. ' . number_format($total_price, 0, ',', '.'); ?><br>
                                                    Kode Unik : <?php echo $detail->kode_unik; ?>
                                                </p>
                                                <p>
                                                    Pelanggan dianjurkan untuk mentransfer dengan<br>
                                                    menggunakan kode unik, untuk memudahkan mesin<br>
                                                    kami pembayaran Anda. Jika Anda membayar<br>
                                                    dengan kode unik, maka tidak perlu<br>
                                                    melakukan konfirmasi transfer<br>
                                                </p>
                                                <p>
                                                    Anda dapat melakukan informasi pembayaran secara<br>
                                                    manual <a href="<?php echo site_url('page/konfirmasi_pembayaran/' . $detail->id_pemesanan); ?>">disini</a><br>
                                            </div>
                                            <div class="span6">
                                                <div class="payment-method">
                                                    <div class="payment-detail">
                                                        <div class="payment-logo">
                                                            <img src="http://localhost/conitsoc/assets/user/img/mandiri_logo.jpg"> 
                                                        </div>
                                                        <div class="detail-line">
                                                            <div class=""><strong>No Rekening : 123456789</strong></div>
                                                            <div class=""><strong>Atas Nama : Johny Depp</strong></div>
                                                        </div>
                                                    </div>
                                                    <div class="payment-detail">
                                                        <div class="payment-logo"><img src="http://localhost/conitsoc/assets/user/img/bca_logo.jpg"> </div>
                                                        <div class="detail-line">
                                                            <div class=""><strong>No Rekening : 123456789</strong></div>
                                                            <div class=""><strong>Atas Nama : Johny Depp</strong></div>
                                                        </div>
                                                    </div>
                                                    <div class="payment-detail">
                                                        <div class="payment-logo"><img src="http://localhost/conitsoc/assets/user/img/bni_logo.jpg"> </div>
                                                        <div class="detail-line">
                                                            <div class=""><strong>No Rekening : 123456789</strong></div>
                                                            <div class=""><strong>Atas Nama : Johny Depp</strong></div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="<?php echo site_url('page/konfirmasi_pembayaran/' . $detail->id_pemesanan); ?>" class="btn btn-info" data-val="">Konfirmasi Manual</a>
                                </div>
                                <?php
                            } else {
                                echo '<div id="checkout-box"></div><!--end span12-->';
                            }
                        }
                        ?>
                    </div><!--end span12-->


                    <div class="span3">
                        <?php
                        if ($this->uri->segment(2) != 'detail_data') {
                            ?>
                            <div class="cart-receipt">
                                <h4>Transaction Summary</h4>
                                <table class="table table-receipt">
                                    <tr>
                                        <td class="alignLeft" id="total_item"><?php echo $success ? $detail->jmlPemesanan : $this->cart->total_items(); ?> Items</td>
                                        <td class="alignLeft" id="total_berat">Weight : <?php echo $success ? $detail->beratPemesanan : $this->cart->totalberat(); ?> Kg</td>
                                    </tr>
                                    <tr>
                                        <td class="alignLeft">Total</td>
                                        <td class="alignLeft" id="total_biaya"><?php echo 'Rp. ' . number_format($total_price, 0, ',', '.'); ?></td>
                                    </tr>
                                    <?php
                                    if ($success) {
                                        ?>
                                        <tr>
                                            <td class="alignLeft">Kode Unik</td>
                                            <td class="alignLeft"><?php echo $detail->kode_unik; ?></td>
                                        </tr>
                                        <?php
                                    }
                                    ?>
                                    <tr>
                                        <td class="alignLeft">Other Cost</td>
                                        <td class="alignLeft"><?php echo $success ? $biaya_pengiriman : ''; ?></td>
                                    </tr>
                                </table>
                                <?php
                                if ($success == false) {
                                    ?>
                                    <div class="center" id="checkout-conf">
                                        <a class="btn btn-info" id="checkout-btn" data-val="<?php echo $this->session->userdata('id'); ?>">Checkout</a>
                                        <div class="separator"><span>or</span><div></div></div>
                                        <a href="<?php echo site_url('page/home'); ?>" class="link">Continue Shopping</a>
                                    </div>
                                    <div class="center" id="finish-btn" style="display: none">
                                        <button type="submit" class="btn btn-info">Finish</button>
                                    </div>
                                    <?php
                                } else {
                                    ?>
                                    <div class="center">
                                        <a href="<?php echo site_url('page/download_invoice/' . $detail->noPemesanan); ?>" class="btn btn-info" data-val="">Download Invoice</a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                    </div><!--end span5-->
                </div><!--end row-->
            </form>

        </div><!--end span12-->
    </div><!--end row-->
</div>
