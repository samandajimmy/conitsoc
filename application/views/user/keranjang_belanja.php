
<div class="container" style="margin-bottom: 40px;">


    <div class="row-fluid">
        <div class="span12">

            <form action="<?php echo $action; ?>" class="form-shipping" method="post" accept-charset="utf-8" id="cart-form">
                <div class="row-fluid">

                    <div class="span9">
                        <div id="crumbs" style="border: none;">
                            <ul>
                                <li><a href="#1">My Shopping Cart</a></li>
                                <li><a href="#2">Shipping & Payment</a></li>
                                <li><a href="#3">Finish</a></li>
                            </ul>
                        </div>
                        <?php
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
                                                        <img src="http://localhost/ecome/assets/user/img/mandiri_logo.jpg"> 
                                                    </div>
                                                    <div class="detail-line">
                                                        <div class=""><strong>No Rekening : 123456789</strong></div>
                                                        <div class=""><strong>Atas Nama : Johny Depp</strong></div>
                                                    </div>
                                                </div>
                                                <div class="payment-detail">
                                                    <div class="payment-logo"><img src="http://localhost/ecome/assets/user/img/bca_logo.jpg"> </div>
                                                    <div class="detail-line">
                                                        <div class=""><strong>No Rekening : 123456789</strong></div>
                                                        <div class=""><strong>Atas Nama : Johny Depp</strong></div>
                                                    </div>
                                                </div>
                                                <div class="payment-detail">
                                                    <div class="payment-logo"><img src="http://localhost/ecome/assets/user/img/bni_logo.jpg"> </div>
                                                    <div class="detail-line">
                                                        <div class=""><strong>No Rekening : 123456789</strong></div>
                                                        <div class=""><strong>Atas Nama : Johny Depp</strong></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                        } else {
                            echo '<div id="checkout-box"></div><!--end span12-->';
                        }
                        ?>
                    </div><!--end span12-->


                    <div class="span3">
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
                    </div><!--end span5-->
                </div><!--end row-->
            </form>

        </div><!--end span12-->
    </div><!--end row-->
</div>
