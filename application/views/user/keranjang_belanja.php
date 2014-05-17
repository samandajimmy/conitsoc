<div class="body body-shadow">
    <?php
    $logged_in = $this->session->userdata('logged_in');
    $checkout = isset($checkout) ? $checkout : false;
    ?>
    <div class="container padop" style="padding-bottom: 180px">
        <div class="row-fluid" id="keranjang">
            <div class="span12">

                <form action="<?php echo $action; ?>" class="<?php echo isset($form_class) ? $form_class : 'form-shipping'; ?>" method="post" accept-charset="utf-8" id="<?php echo isset($form_id) ? $form_id : 'cart-form'; ?>">
                    <div class="row-fluid">

                        <div class="span9">
                            <div id="crumbs" class="step" style="border: none;">
                                <ul>
                                    <?php
                                    switch ($this->uri->segment(2)) {
                                        case 'detail_data':
                                            $active1 = 'before';
                                            $active2 = 'active';
                                            $active3 = 'next';
                                            $active4 = 'next';
                                            break;
                                        case 'keranjang_beli':
                                            if ($this->uri->segment(4) == 'success') {
                                                $active1 = 'before';
                                                $active2 = 'before';
                                                $active3 = 'before';
                                                $active4 = 'active';
                                            } else if ($this->uri->segment(4) == 'checkout') {
                                                $active1 = 'before';
                                                $active2 = 'before';
                                                $active3 = 'active';
                                                $active4 = 'next';
                                            } else {
                                                $active1 = 'active';
                                                $active2 = 'next';
                                                $active3 = 'next';
                                                $active4 = 'next';
                                            }
                                            break;
                                    }
                                    ?>
                                    <li><a class="<?php echo $active1; ?>" href="<?php echo site_url('page/keranjang_beli'); ?>"><i>1</i>My Shopping Cart</a></li>
                                    <?php
                                    $id = $this->session->userdata('logged_in') ? $this->session->userdata('id') : '';
                                    echo '<li><a class="' . $active2 . '" href="' . site_url('page/detail_data/' . $id) . '"><i>2</i>My Details Data</a></li>';
                                    ?>
                                    <li><a class="<?php echo $active3; ?>" href=""><i>3</i>Shipping & Payment</a></li>
                                    <li><a class="<?php echo $active4; ?>" href=""><i>4</i>Finish</a></li>
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
                                        <div class="error-top"><img width="15px" height="15px" src="<?php echo base_url('assets/user/img/ximg.jpg'); ?>" /><span>Data yang Anda Masukan Tidak Sesuai</span></div>
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
                                        <a href="<?php echo site_url('page/konfirmasi_pembayaran/' . $detail->id_pemesanan); ?>" class="btn btn-info" style="margin-top: 10px">Konfirmasi Manual</a>
                                    </div>
                                    <?php
                                } else {
                                    $success = FALSE;
                                }
                                if ($cart != NULL) {
                                    echo '<div class="new-cart">';
                                    echo $success ? '<h2 class="cart-title">Purchased Items</h2>' : '';
                                    $total_cart = 0;
                                    $disabled = $checkout ? 'disabled' : '';
                                    foreach ($cart as $row) {
                                        $price = 'Rp. ' . number_format($row['price'], 0, ',', '.');
                                        $price_subtotal = 'Rp. ' . number_format($row['subtotal'], 0, ',', '.');
                                        $hidden = array(
                                            'rowid[]' => $success ? $row['id'] : $row['rowid'],
                                        );
                                        echo form_hidden($hidden);
                                        $cartopt = $success ? '' : $this->cart->product_options($row['rowid']);
                                        $gambar = $success ? $row['gambar'] : $cartopt['gambar'];
                                        $total_cart = $total_cart + $row['subtotal'];
                                        ?>
                                        <div class="cart">
                                            <div class="cart-img"><img src="<?php echo base_url('produk/cart/' . $gambar); ?>" alt=""></div>   
                                            <div class="cart-desc">
                                                <div class="cart-line line_cart">
                                                    <div class="cart-name"><h2><?php echo $row['name'] ?></h2></div>
                                                    <div class="cart-qty"><?php echo $price; ?> x <?php echo $success ? $row['qty'] : '<input type="number" class="span3 qty" name="jumlah[]" id="' . $row['rowid'] . '" value="' . $row['qty'] . '" data-val="' . $row['id'] . '" ' . $disabled . '>'; ?></div>
                                                    <div class="cart-total"><?php echo $price_subtotal; ?></div>
                                                </div>
                                                <div class="cart-line">
                                                    <div>
                                                        Shipping Weight <?php echo $row['berat']; ?> kg
                                                    </div>
                                                    <?php echo $success || $checkout ? '' : '<div class="cart-remove"><a href="' . site_url('page/keranjang_beli/' . $row['rowid'] . '/delete') . '">Remove</a></div>'; ?>

                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    }
                                    ?>
                                    <div class="new_total_cart">
                                        <div class="row-fluid">
                                            <div class="span9" style="text-align: right;"><b>TOTAL</b></div>
                                            <div class="span3" style="text-align: right;"><b><?php echo 'Rp. ' . number_format($total_cart, 0, ',', '.'); ?></b></div>
                                        </div>
                                    </div>
                                    <div class="clearfix"></div>
                                    <?php
                                } else {
                                    echo '<div class="new-cart">';
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
                                    <div class="shipping-box">
                                        <div class="shipping-method">
                                            <h2 class="cart-title">Shipping Method</h2>
                                            <div class="row-fluid">
                                                <div class="span9">
                                                    <div class="shipping-info">Pengiriman dengan JNE dikenakan biaya asuransi sebesar 0,1% darti total harga barang</div>
                                                </div>
                                            </div>
                                            <div class="shipping-detail">
                                                <div class="detail-line">
                                                    <div class="">JNE Reg</div>
                                                    <div class="shipping_tarif"><b><?php echo $tarif . ' x ' . $detail->beratPemesanan . ' kg'; ?></b></div>
                                                    <div class="total"><b>TOTAL</b></div>
                                                    <div class=""><b><?php echo $biaya_pengiriman; ?></b></div>
                                                </div>
                                                <div class="detail-line">
                                                    <div class="">Proses pengiriman 2 - 3 hari</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="new_total_cart">
                                        <div class="row-fluid">
                                            <div class="span9" style="text-align: right;"><b>KODE UNIK</b></div>
                                            <div class="span3" style="text-align: right;"><b>Rp. <?php echo $detail->kode_unik; ?></b></div>
                                        </div>
                                    </div>
                                    <div class="new_total_cart">
                                        <div class="row-fluid">
                                            <div class="span9" style="text-align: right;"><b>SHIPPING TOTAL</b></div>
                                            <div class="span3" style="text-align: right;"><b><?php echo 'Rp. ' . number_format($total_price, 0, ',', '.'); ?></b></div>
                                        </div>
                                    </div>
                                    <?php echo '</div>'; ?>
                                    <div class="row-fluid">
                                        <div class="span9">
                                            <div class="blog-tab">
                                                <h2 class="cart-title">Shipped To</h2>
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="popular-post">
                                                        <table class="shipping-table">
                                                            <tbody>
                                                                <tr>
                                                                    <td class="grey_font">Nama</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->nama_jelas; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey_font">Nomor Telepon</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->no_telepon; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey_font">Jenis Kelamin</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->jenis_kelamin; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey_font">Alamat</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->alamat; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey_font">Provinsi</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->state_name; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey_font">Kota</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->city_name; ?></td>
                                                                </tr>
                                                                <tr>
                                                                    <td class="grey_font">Kode Pos</td>
                                                                    <td>:</td>
                                                                    <td class="black_font"><?php echo $detail->kode_pos; ?></td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>

                                            </div><!--end tab-content--><!--end blog-tab-->

                                        </div>
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
                                    <?php
                                } else if ($checkout) {
                                    $details = $detail[0];
                                    $jenis_kelamin = $details->jenis_kelamin;
                                    $pria = $jenis_kelamin == 'Pria' ? 'checked' : '';
                                    $wanita = $jenis_kelamin == 'Wanita' ? 'checked' : '';
                                    $tarif = isset($tarif) ? $tarif : 0;
                                    ?>
                                    <div class="shipping-box">
                                        <div class="shipping-method">
                                            <h2 class="cart-title">Shipping Method</h2>
                                            <div class="row-fluid">
                                                <div class="span9">
                                                    <div class="shipping-info">Pengiriman dengan JNE dikenakan biaya asuransi sebesar 0,1% darti total harga barang</div>
                                                    <?php
                                                    if ($tarif == 0) {
                                                        echo '<label class="error" style="padding: 0 20px; margin-bottom: 10px">Anda belum mengisi alamat lengkap dan kota tujuan pengiriman, segera lengkapi data Anda</label>';
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="shipping-detail">
                                                <div class="detail-line">
                                                    <div class="">JNE Reg</div>
                                                    <div class="shipping_tarif"><b id="tarif_shipping"><?php echo 'Rp. ' . number_format($tarif, 0, ',', '.') . ' x ' . $this->cart->totalberat() . ' kg'; ?></b></div>
                                                    <div class="total"><b>TOTAL</b></div>
                                                    <?php
                                                    $total_tarif = $tarif * $this->cart->totalberat();
                                                    ?>
                                                    <div class=""><b id="total_tarif"><?php echo 'Rp. ' . number_format($total_tarif, 0, ',', '.'); ?></b></div>
                                                </div>
                                                <div class="detail-line">
                                                    <div class="">Proses pengiriman 2 - 3 hari</div>
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="new_total_cart">
                                        <div class="row-fluid">
                                            <div class="span9" style="text-align: right;"><b>KODE UNIK</b></div>
                                            <div class="span3" style="text-align: right;"><b>Rp. <?php echo $kode_unik; ?></b></div>
                                        </div>
                                    </div>
                                    <div class="new_total_cart">
                                        <div class="row-fluid">
                                            <div class="span9" style="text-align: right;"><b>SHIPPING TOTAL</b></div>
                                            <?php
                                            $shipping_total = $total_cart + $total_tarif + $kode_unik;
                                            $total_price = $shipping_total;
                                            ?>
                                            <div class="span3" style="text-align: right;"><b id="shipping_total"><?php echo 'Rp. ' . number_format($shipping_total, 0, ',', '.'); ?></b></div>
                                        </div>
                                    </div>
                                    <?php echo '</div>'; ?>
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <div class="blog-tab"> 
                                                <h2 class="cart-title">Shipping Address</h2> 
                                                <ul class="nav nav-tabs"> 
                                                    <li class="active"><a data-placment="top" href="#your-address" data-toggle="tab" id="your-addresstab">Your Address</a></li> 
                                                    <li> <a data-placment="top" href="#other-address" data-toggle="tab" id="other-addresstab">Another Address</a> </li> 
                                                </ul> 
                                                <div class="tab-content"> 
                                                    <div class="tab-pane active" id="your-address"> 
                                                        <div class="row-fluid"> 
                                                            <div class="span6"> 
                                                                <input type="hidden" value="<?php echo $details->id; ?>" name="idCustomer"> 
                                                                <input type="hidden" value="<?php echo $details->idUser; ?>" name="idUser"> 
                                                                <input type="hidden" value="0" name="type_address" id="type_address"> 
                                                                <div class="control-group"> 
                                                                    <label for="alamat1" class="control-label">Alamat </label>                    
                                                                    <div class="controls"> 
                                                                        <textarea name="alamat1" id="alamat1" class="cur_add" required=""><?php echo $details->alamat ? $details->alamat : '' ?></textarea>
                                                                    </div>
                                                                </div><!--end control-group-->  
                                                                <div class="control-group"> 
                                                                    <label for="provinsi1" class="control-label">Provinsi </label>                   
                                                                    <div class="controls"> 
                                                                        <?php echo form_dropdown('provinsi1', $provinsi, $details->provinsi, 'id="provinsi1" min="1" class="cur"'); ?>
                                                                    </div> 
                                                                </div><!--end control-group--> 
                                                                <div class="control-group"> 
                                                                    <label for="kota1" class="control-label">Kota </label>                    
                                                                    <div class="controls"> 
                                                                        <?php echo form_dropdown('kota1', $kota, $details->kota, 'id="kota1" min="1" class="cur"'); ?>
                                                                    </div> 
                                                                </div><!--end control-group-->
                                                                <div class="control-group"> 
                                                                    <label for="kode_pos1" class="control-label">Kode Pos </label>
                                                                    <div class="controls"> 
                                                                        <input type="text" name="kode_pos1" value="<?php echo $details->kode_pos ? $details->kode_pos : '' ?>" id="kode_pos1" class="cur_add" required="">    
                                                                    </div> 
                                                                </div><!--end control-group--> 
                                                            </div> 
                                                            <div class="span6"> 
                                                                <div class="control-group"> 
                                                                    <label for="nama_jelas1" class="control-label">Nama Jelas </label>          
                                                                    <div class="controls">
                                                                        <input type="text" name="nama_jelas1" value="<?php echo $details->nama_jelas ? $details->nama_jelas : '' ?>" class="cur_add" id="nama_jelas1" required=""> 
                                                                    </div>
                                                                </div><!--end control-group-->  
                                                                <div class="control-group"> 
                                                                    <label for="no_telepon1" class="control-label">Nomor Telepon </label>     
                                                                    <div class="controls"> 
                                                                        <input type="text" name="no_telepon1" value="<?php echo $details->no_telepon ? $details->no_telepon : '' ?>" id="no_telepon1" class="cur_add" required="">    
                                                                    </div> 
                                                                </div><!--end control-group--> 
                                                                <div class="control-group"> 
                                                                    <label for="jenis_kelamin1" class="control-label">Jenis Kelamin </label>     
                                                                    <div class="controls"> 
                                                                        <label class="radio inline">
                                                                            <input type="radio" name="jenis_kelamin1" class="cur_add" id="jenis_kelamin1" required="" value="Pria" <?php echo $pria; ?>> Laki-laki</label> 
                                                                        <label class="radio inline"><input type="radio" name="jenis_kelamin1" value="Wanita" <?php echo $wanita; ?>> Perempuan</label> 
                                                                    </div> 
                                                                </div><!--end control-group-->  
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="clearfix"></div>
                                                    <div class="tab-pane" id="other-address"> 
                                                        <div class="row-fluid">
                                                            <div class="span6"> 
                                                                <div class="control-group">
                                                                    <label for="alamat" class="control-label">Alamat </label>   
                                                                    <div class="controls"> <textarea name="alamat" id="alamat" class="ot_add"></textarea>
                                                                    </div>
                                                                </div><!--end control-group-->  
                                                                <div class="control-group"> 
                                                                    <label for="provinsi" class="control-label">Provinsi </label>   
                                                                    <div class="controls">   
                                                                        <?php echo form_dropdown('provinsi', $provinsi, 0, 'id="provinsi" min="0" class="ot"'); ?>
                                                                    </div>
                                                                </div><!--end control-group--> 
                                                                <div class="control-group"> 
                                                                    <label for="kota" class="control-label">Kota </label>   
                                                                    <div class="controls">
                                                                        <?php echo form_dropdown('kota', $kota, 0, 'id="kota" min="0" class="ot"'); ?>
                                                                    </div> 
                                                                </div><!--end control-group-->
                                                                <div class="control-group"> 
                                                                    <label for="kode_pos" class="control-label">Kode Pos </label>  
                                                                    <div class="controls"> 
                                                                        <input type="text" name="kode_pos" value="" id="kode_pos" class="ot_add">  
                                                                    </div> 
                                                                </div><!--end control-group-->
                                                            </div>
                                                            <div class="span6"> 
                                                                <div class="control-group"> 
                                                                    <label for="nama_jelas" class="control-label">Nama Jelas </label>   
                                                                    <div class="controls"> <input type="text" name="nama_jelas" value="" id="nama_jelas" class="ot_add">          
                                                                    </div> </div><!--end control-group-->  
                                                                <div class="control-group"> 
                                                                    <label for="no_telepon" class="control-label">Nomor Telepon </label>     
                                                                    <div class="controls"> 
                                                                        <input type="text" name="no_telepon" value="" id="no_telepon" class="ot_add">        
                                                                    </div> 
                                                                </div><!--end control-group-->  
                                                                <div class="control-group"> 
                                                                    <label for="jenis_kelamin" class="control-label">Jenis Kelamin </label>    
                                                                    <div class="controls"> 
                                                                        <label class="radio inline"><input type="radio" name="jenis_kelamin" id="jenis_kelamin" value="Pria" class="ot_add"> Laki-laki</label> 
                                                                        <label class="radio inline"><input type="radio" name="jenis_kelamin" value="Wanita"> Perempuan</label> 
                                                                    </div> 
                                                                </div><!--end control-group--> 
                                                            </div>
                                                            <div class="clearfix"></div> 
                                                        </div>
                                                    </div>
                                                </div><!--end blog-tab--> 
                                            </div><!--end blog-tab--> 


                                        </div>
                                    </div>
                                    <div class="payment-box">
                                        <h2 class="cart-title">Payment Method</h2>
                                        <div class="row-fluid">
                                            <div class="span9">
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
                                    <?php
                                } else {
                                    echo '</div>';
                                    echo '<div id="checkout-box"></div><!--end span12-->';
                                }
                            }
                            ?>
                        </div><!--end span12-->


                        <div class="span3" style="position: absolute; height: 100%; right: 0">
                            <?php
                            if ($this->uri->segment(2) != 'detail_data') {
                                ?>
                                <div class="cart-receipt">
                                    <h4>Transaction Summary</h4>
                                    <table class="table table-receipt">
                                        <tr>
                                            <td class="alignLeft" id="total_item"><?php echo $success ? $detail->jmlPemesanan : $this->cart->total_items(); ?> Items</td>
                                            <td class="alignLeft" id="total_berat"><b>Weight : <?php echo $success ? $detail->beratPemesanan : $this->cart->totalberat(); ?> Kg</b></td>
                                        </tr>
                                        <?php
                                        if ($success) {
                                            $total_price = $total_price + $detail->kode_unik;
                                            ?>
                                            <tr>
                                                <td class="alignLeft">Kode Unik</td>
                                                <td class="alignLeft"><b><?php echo $detail->kode_unik; ?></b></td>
                                            </tr>
                                            <?php
                                        } else if ($checkout) {
                                            ?>
                                            <tr>
                                                <td class="alignLeft">Kode Unik</td>
                                                <td class="alignLeft"><b><?php echo $kode_unik; ?></b></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <?php
                                        if ($success) {
                                            ?>
                                            <tr>
                                                <td class="alignLeft">Other Cost</td>
                                                <td class="alignLeft"><b><?php echo $success ? $biaya_pengiriman : ''; ?></b></td>
                                            </tr>
                                            <?php
                                        } else if ($checkout) {
                                            ?>
                                            <tr>
                                                <td class="alignLeft">Other Cost</td>
                                                <td class="alignLeft"><b id="other_cost"><?php echo 'Rp. ' . number_format($total_tarif, 0, ',', '.'); ?></b></td>
                                            </tr>
                                            <?php
                                        }
                                        ?>
                                        <tr>
                                            <td class="alignLeft">Total</td>
                                            <td class="alignLeft" id="total_biaya"><b><?php echo 'Rp. ' . number_format($total_price, 0, ',', '.'); ?></b></td>
                                        </tr>
                                    </table>
                                    <?php
                                    if ($success) {
                                        ?>
                                        <div class="center">
                                            <a href="<?php echo site_url('page/download_invoice/' . $detail->noPemesanan); ?>" class="btn btn-info" data-val="">Download Invoice</a>
                                        </div>
                                        <?php
                                    } else if ($checkout) {
                                        ?>
                                        <div class="center" id="finish-btn">
                                            <button type="submit" class="btn btn-info">Finish</button>
                                        </div> 
                                        <?php
                                    } else {
                                        ?>
                                        <div class="center" id="checkout-conf">
                                            <a class="btn btn-info" id="checkout-btn" data-val="<?php echo $this->session->userdata('id'); ?>">Checkout</a>
                                            <div class="separator"><span>or</span><div></div></div>
                                            <a href="<?php echo site_url('page/home'); ?>" class="link">Continue Shopping</a>
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
</div>

