<div class="container">

    <div class="row">
        <aside class="span3">

            <div class="user_info">
                <div class="header">
                    <h3>Personal Details</h3>
                </div><!--end titleHeader-->
                <ul class="unstyled">
                    <li><a class="invarseColor" href="<?php echo site_url('page/purchase_history'); ?>"><i class="icon-info-sign"></i>&nbsp;&nbsp;Purchase History</a></li>
                    <li><a class="invarseColor" href="<?php echo site_url('page/user_info'); ?>"><i class="icon-user"></i>&nbsp;&nbsp;Account Detail</a></li>
                </ul>
            </div><!--end categories-->
        </aside>


        <div class="span9">
            <?php
            switch ($this->uri->segment(2)) {
                case 'purchase_history':
                    ?>
                    <table class="table table-striped" id="tab_purchase">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Purchase Date</th>
                                <th>Transaction Code</th>
                                <th>Status</th>
                                <th>Price</th>
                                <th>Confirm</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (isset($pesanan)) {
                                foreach ($pesanan as $pesanans) {
                                    $date = strtotime($pesanans->tglPemesanan);
                                    ?>
                                    <tr>
                                        <td align="right"><a href="<?php echo site_url('page/purchase_detail/' . $pesanans->id_pemesanan) ?>">>></a></td>
                                        <td align="left"><?php echo date('d M Y H:i', $date); ?></td>
                                        <td><?php echo $pesanans->noPemesanan; ?></td>
                                        <td><?php echo $pesanans->namaStatus; ?>?</td>
                                        <td><?php echo 'Rp. ' . number_format($pesanans->biayaPemesanan, 0, ',', '.'); ?></td>
                                        <td><a href="<?php echo site_url('page/konfirmasi_pembayaran/' . $pesanans->id_pemesanan); ?>" class="btn btn-info">Confirm</a></td>
                                    </tr>
                                    <?php
                                }
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                    break;
                case 'purchase_detail':
                    $detail = $pemesanan['detail'][0];
                    $produk = $pemesanan['produk'];
                    $param = $this->userModel->getProfileDetail($detail->idUser);
                    $user = $param[0];
                    ?>
                    <div class="center">
                        <a href="<?php echo site_url('page/download_invoice/' . $detail->noPemesanan); ?>" class="btn btn-info" data-val="">Download Invoice</a>
                        <a href="<?php echo site_url('page/konfirmasi_pembayaran/' . $detail->id_pemesanan); ?>" class="btn btn-info" data-val="">Konfirmasi Manual</a>
                    </div>
                    <h2 class="cart-title">Purchased Items</h2>
                    <?php
                    if (isset($produk)) {
                        foreach ($produk as $row) {
                            ?>
                            <div class="cart">
                                <div class="cart-img"><img src="<?php echo base_url('produk/thumbnail/' . $row['gambar']); ?>" alt=""></div>   
                                <div class="cart-desc">
                                    <div class="cart-line line_cart">
                                        <div class="cart-name"><h2><?php echo $row['name']; ?></h2></div>
                                        <div class="cart-qty"><?php echo 'Rp. ' . number_format($row['price'], 0, ',', '.'); ?> x <?php echo $row['qty']; ?></div>
                                        <div class="cart-total"><?php echo 'Rp. ' . number_format($row['subtotal'], 0, ',', '.'); ?></div>
                                    </div>
                                    <div class="cart-line">
                                        <div>
                                            SKU SYSM01BK &nbsp; Shipping Weight <?php echo $row['berat']; ?> kg
                                        </div>

                                    </div>
                                </div>
                            </div>
                            <?php
                        }
                    }
                    ?>

                    <div class="clearfix"></div>
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
                                        <?php
                                        $tarif = 'Rp. ' . number_format($detail->tarif, 0, ',', '.');
                                        $biaya_pengiriman = 'Rp. ' . number_format($detail->biayaPengiriman, 0, ',', '.');
                                        ?>
                                        <div class=""><?php echo $tarif . ' x ' . $detail->beratPemesanan . ' kg'; ?></div>
                                        <div class=""><?php echo $biaya_pengiriman; ?></div>

                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="payment-box">
                            <h2 class="cart-title">Payment Method</h2>
                            <div class="row">
                                <div class="span4">
                                    <p>
                                        Transfer Bank<br>
                                        Jumlah yang harus dibayar : <?php echo 'Rp. ' . number_format($detail->biayaPemesanan, 0, ',', '.'); ?><br>
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
                                        manual <a href="#">disini</a><br>
                                </div>
                                <div class="span5">
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
                    break;
            }
            ?>
        </div><!--end span9-->

    </div>
</div><!--end featuredItems--> 
