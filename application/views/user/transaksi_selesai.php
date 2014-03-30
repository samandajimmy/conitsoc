
<div class="container" style="margin-bottom: 40px;">


    <div class="row">
        <div class="span12">
            <div class="row">

                <div class="span9">
                    <div id="crumbs" style="border: none;">
                        <ul>
                            <li><a href="#1">My Shopping Cart</a></li>
                            <li><a href="#2">Shipping & Payment</a></li>
                            <li><a href="#3">Finish</a></li>
                        </ul>
                    </div>
                    <?php
                    if ($cart != NULL) {
                        ?>
                        <form action="<?php echo $action; ?>" method="POST" class="cart-form">
                            <?php
                            foreach ($cart as $row) {
                                $price = 'Rp.' . number_format($row['price'], 0, ',', '.');
                                $price_subtotal = 'Rp.' . number_format($row['subtotal'], 0, ',', '.');
                                $hidden = array(
                                    'rowid[]' => $row['rowid'],
                                );
                                echo form_hidden($hidden);
                                $cartopt = $this->cart->product_options($row['rowid']);
                                $gambar = $cartopt['gambar'];
                                ?>
                                <div class="cart">
                                    <div class="cart-img"><img src="<?php echo base_url('produk/gambar/' . $gambar); ?>" alt=""></div>   
                                    <div class="cart-desc">
                                        <div class="cart-line line_cart">
                                            <div class="cart-name"><h2><?php echo $row['name'] ?></h2></div>
                                            <div class="cart-qty"><?php echo $price; ?> x <input type="number" class="span1" value="<?php echo $row['qty'] ?>" id="qty_input"></div>
                                            <div class="cart-total"><?php echo $price_subtotal; ?></div>
                                        </div>
                                        <div class="cart-line">
                                            <div>
                                                SKU SYSM01BK
                                            </div>
                                            <div>Shipping Weight <?php echo $row['berat']; ?> kg</div>
                                            <div class="cart-remove"><a href="<?php echo site_url('page/keranjang_beli' . $row['rowid'] . '/delete'); ?>">Remove</a></div>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>
                            <div style="float: right;">
                                <a href="<?php echo site_url('page/keranjang_beli/-1/delete'); ?>" class="btn">Hapus Keranjang</a>
                                <button class="btn" type="submit"> Ubah Keranjang </button>
                            </div>
                            <div class="clearfix"></div>
                        </form>
                        <?php
                    } else {
                        ?>
                        <div class="box">
                            <div class="emptyCartWrapper">
                                <div class="emptyCartState"></div>
                                <div>
                                    <h2>Why It's still Empty :(</h2>
                                    <ul class="emptyCartOpt">
                                        <li><a href="http://www.jakartanotebook.com/limited-deal"><span>Dapatkan </span>harga spesial dari kami</a></li>
                                        <li><a href="http://www.jakartanotebook.com/search?sort=newitem"><span>Pilih </span>dari list barang terbaru</a></li>
                                        <li><a href="https://www.jakartanotebook.com/member/watch_list"><span>Ambil </span>dari Watch List Anda</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <div id="checkout-box">
                    </div><!--end span12-->


                </div><!--end span12-->


                <div class="span3">
                    <div class="cart-receipt">
                        <h4>Transaction Summary</h4>
                        <table class="table table-receipt">
                            <tr>
                                <td class="alignLeft"><?php echo $this->cart->total_items() . ' Item'; ?></td>
                                <td class="alignLeft"><?php echo 'Weight : ' . $this->cart->totalberat() . ' Kg'; ?></td>
                            </tr>
                            <tr>
                                <td class="alignLeft">Total</td>
                                <td class="alignLeft"><?php echo 'Rp. ' . number_format($this->cart->total(), 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td class="alignLeft">Other Cost</td>
                                <td class="alignLeft">0</td>
                            </tr>
                        </table>
                        <div>
                            <a href="<?php echo site_url('page/home'); ?>" class="btn">Lanjut Belanja</a>
                            <a class="btn btn-primary" id="checkout-btn" data-val="<?php echo $this->session->userdata('id'); ?>">Checkout</a>
                        </div>
                    </div>
                </div><!--end span5-->


            </div><!--end row-->


            <div class="row">

                <div class="span9" id="transaksi">
                    <div id="crumbs" style="border: none;">
                        <ul>
                            <li><a href="#1">My Shopping Cart</a></li>
                            <li><a href="#2">Shipping & Payment</a></li>
                            <li><a href="#3">Finish</a></li>
                        </ul>
                    </div>
                    <div class="cart-thanks">
                        <h2>
                            Thank You for Shopping with Conitso.com 
                        </h2>
                        <p>
                            Rekap transaksi telah kami kirimkan ke email Anda.
                            <br>
                            Invoice juga dapat di-download dalam bentuk PDF melalui 'Download Invoice' di halaman ini.
                        </p>
                    </div>


                    <h2>Purchased Items</h2>
                    <div class="box">
                        <div class="cartList">
                            <div class="img"><img src="https://www.jakartanotebook.com/images/products/51/16/5386/3/100/bolt-zte-mf90-mobile-hotspot-wifi-4g-lte-72-mbps--kartu-perdana-8gb-white-30.gif" alt="BOLT! ZTE MF90 Mobile Hotspot Wifi - 4G LTE 72 Mbps + Kartu Perdana 8GB - White" /></div>
                            <div class="desc">
                                <div class="cartLine">
                                    <h3><a href="https://www.jakartanotebook.com/bolt-zte-mf90-mobile-hotspot-wifi-4g-lte-72-mbps--kartu-perdana-8gb-white" title="BOLT! ZTE MF90 Mobile Hotspot Wifi - 4G LTE 72 Mbps + Kartu Perdana 8GB - White">BOLT! ZTE MF90 Mobile Hotspot Wifi - 4G LTE 72 Mbps + Kartu Perdana 8GB - White</a></h3>
                                    <div class="cartQty">
                                        299.000 x 1                                <div class="cartPrice">299.000</div>
                                    </div>
                                </div>
                                <div class="cartLine">
                                    <dl>
                                        <dt>SKU</dt>
                                        <dd>ZTWR08WH</dd>
                                        <dt>Weight</dt>
                                        <dd>0.3 kg</dd>
                                    </dl>
                                </div>
                            </div>
                        </div>
                    </div>


                    <!-- SHIPPING ADDRESS -->
                    <div class="shippingSummary">
                        <h2>Your items will be shipped to</h2>
                        <div class="col12 pull-left">
                            <dl>
                                <dt>Nama Penerima</dt>
                                <dd>Jimmy</dd>
                                <dt>No Telp.</dt>
                                <dd>089656525375</dd>
                                <dt>Alamat</dt>
                                <dd>jl.duren no 18</dd>
                                <dd></dd>
                                <dd></dd>
                                <dt>Provinsi</dt>
                                <dd>Jakarta</dd>
                                <dt>Kota</dt>
                                <dd>Matraman</dd>
                                <dt>Kode Pos</dt>
                                <dd>13120</dd>
                            </dl>
                        </div>
                        <div class="col12">
                            <dl>
                                <dt>Shipping Method</dt>
                                <dd>
                                    JNE REG (Rp. 8.000)                        </dd>
                                <dt>Shipping Note</dt>
                                <dd></dd>
                                <dt>Asuransi</dt>
                                <dd>Rp. 300</dd>
                            </dl>
                            <small class="smallInfo">Asuransi pengiriman Anda, keterangan dapat dilihat <a href="http://www.jakartanotebook.com/help/insurance" title="Insurance Detail" target="_blank"><u>di sini</u></a>.</small>
                            <dl>
                                <dt>Total Payment</dt>
                                <dd>Rp. 307.3<span>86</span></dd>
                                <dt>Kode Unik</dt>
                                <dd><span>86</span></dd>
                            </dl>
                        </div>
                    </div>



                    <div class="transferSummary">
                        <h2>How to Pay with Bank Transfer</h2>
                        <p>
                            Anda dapat melakukan transfer sejumlah <b style="color:#c74242">Rp. 307.386</b> melalui salah satu bank yang tersedia di bawah ini, dan kami akan memberikan konfirmasi melalui email dalam waktu maksimal 1x24 jam terhadap transaksi Anda.
                        </p>
                        <table class="stdTable">
                            <thead>
                                <tr>
                                    <th>Bank</th>
                                    <th>No. Rekening</th>
                                    <th>Atas Nama</th>
                                    <th>Cabang</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><i class="ir ico-bca">BCA</i></td>
                                    <td>548-503-5921</td>
                                    <td>Cecep Hernawan</td>
                                    <td>Cab. Central Park</td>
                                </tr>
                                <tr>
                                    <td><i class="ir ico-mandiri">Mandiri</i></td>
                                    <td>1170004531455</td>
                                    <td>Cecep Hernawan</td>
                                    <td>Cab. Taman Anggrek, Jakarta Barat</td>
                                </tr>
                                <tr>
                                    <td><i class="ir ico-bni">BNI</i></td>
                                    <td>0099689812</td>
                                    <td>Cecep Hernawan</td>
                                    <td>Cab. Daan Mogot, Jakarta Barat</td>
                                </tr>
                            </tbody>
                        </table>
                        <small class="smallInfo">Pembayaran akan secara otomatis terdeteksi apabila anda mentransfer menggunakan kode unik</small>
                        <p>Apabila Anda mentransfer tanpa menggunakan kode unik, maka wajib melakukan konfirmasi manual setelah melakukan pembayaran melalui link di bawah ini</p>
                        <a href="https://www.jakartanotebook.com/transaction/confirmation/6CPXS" class="buttonSharp isBlue">Konfirmasi Manual</a>
                    </div>
                </div>



                <div class="span3">
                    <div class="cart-receipt">
                        <h4>Transaction Summary</h4>
                        <table class="table table-receipt">
                            <tr>
                                <td class="alignLeft"><?php echo $this->cart->total_items() . ' Item'; ?></td>
                                <td class="alignLeft"><?php echo 'Weight : ' . $this->cart->totalberat() . ' Kg'; ?></td>
                            </tr>
                            <tr>
                                <td class="alignLeft">Total</td>
                                <td class="alignLeft"><?php echo 'Rp. ' . number_format($this->cart->total(), 0, ',', '.'); ?></td>
                            </tr>
                            <tr>
                                <td class="alignLeft">Other Cost</td>
                                <td class="alignLeft">0</td>
                            </tr>
                        </table>
                        <div>
                            <a href="<?php echo site_url('page/home'); ?>" class="btn">Lanjut Belanja</a>
                            <a class="btn btn-primary" id="checkout-btn" data-val="<?php echo $this->session->userdata('id'); ?>">Checkout</a>
                        </div>
                    </div>
                </div><!--end span5-->
            </div>

        </div><!--end span12-->


    </div><!--end row-->

</div><!--end span12-->

