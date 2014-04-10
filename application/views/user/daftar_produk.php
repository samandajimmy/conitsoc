
<div class="container">

    <div class="row">

        <div class="span12">
            <div id="short_by_price">
                <ul>
                    <li><a href="#1">Sort by Price</a></li>
                    <li><a href="<?php echo site_url('page/daftar_produk/' . $sort_url . '/pricefrom/0/priceto/1000000'); ?>">< 1 Juta</a></li>
                    <li><a href="<?php echo site_url('page/daftar_produk/' . $sort_url . '/pricefrom/1000000/priceto/5000000'); ?>">1 Juta - 5 Juta</a></li>
                    <li><a href="<?php echo site_url('page/daftar_produk/' . $sort_url . '/pricefrom/5000000/priceto/10000000'); ?>">5 Juta - 10 Juta</a></li>
                    <li><a href="<?php echo site_url('page/daftar_produk/' . $sort_url . '/pricefrom/10000000/'); ?>">> 10 Juta</a></li>
                </ul>
            </div>
            <div class="row">

                <aside class="span3">
                    <div class="title_gambar"></div>

                    <div class="kategori">
                        <div class="aside_header btn-info clearfix">
                            <h3>Product Category</h3>
                        </div><!--end titleHeader-->
                        <ul class="unstyled">
                            <?php
                            if (isset($kategori)) {
                                foreach ($kategori as $kategoris) {
                                    ?>
                                    <li><a class="invarseColor" href="<?php echo site_url('page/daftar_produk/kategori/' . $kategoris->id . '/'); ?>"><?php echo $kategoris->namaKategori; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <?php
                        if (isset($merk)) {
                            ?>
                            <div class="aside_header btn-info clearfix">
                                <h3>Brand Category</h3>
                            </div><!--end titleHeader-->
                            <ul class="unstyled">
                                <?php
                                foreach ($merk as $merks) {
                                    ?>
                                    <li><a class="invarseColor" href="<?php echo site_url('page/daftar_produk/' . $sort_url . '/merk/' . $merks->idMerk); ?>"><?php echo $merks->namaMerk; ?></a></li>
                                    <?php
                                }
                                ?>
                            </ul>
                            <?php
                        }
                        ?>
                    </div><!--end categories-->
                </aside><!--end aside-->


                <div class="span9">
                    <div class="row">
                        <ul class="daftar_list_item clearfix">
                            <?php
                            if (isset($produk)) {
                                foreach ($produk as $produks) {
                                    $spek_text = '';
                                    $spek = $this->produkModel->get_produk_spek($produks->id_produk);
                                    if (isset($spek)) {
                                        foreach ($spek as $speks) {
                                            $spek_text .= $speks->isiSpesifikasi . ', ';
                                        }
                                        $spek_text = rtrim($spek_text, ', ');
                                        // strip tags to avoid breaking any html
                                        $spek_text = strip_tags($spek_text);

                                        if (strlen($spek_text) > 200) {

                                            // truncate string
                                            $stringCut = substr($spek_text, 0, 200);

                                            // make sure it ends in a word so assassinate doesn't become ass...
                                            $spek_text = substr($stringCut, 0, strrpos($stringCut, ' ')) . '...';
                                        }
                                    }
                                    ?>
                                    <li class="span9 clearfix">
                                        <div class="row">
                                            <div class="span2">
                                                <div class="thumbnail">
                                                    <a href="<?php echo site_url('page/produk_detail/' . $produks->id_produk); ?>"><img src="<?php echo base_url('produk/gambar/' . $produks->gambarProduk); ?>" alt=""></a>
                                                    <?php if ($produks->discountProduk > 0) : ?>
                                                        <div class="labeldisc"><span><?php echo number_format($produks->discountProduk, 0, ',', '.') . '%' ?></span></div>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                            <div class="span7">
                                                <div class="thumbSetting clearfix">
                                                    <div class="thumb_field">
                                                        <div class="thumbTitle pull-left">
                                                            <a href="<?php echo site_url('page/produk_detail/' . $produks->id_produk); ?>" class="invarseColor">
                                                                <?php echo $produks->namaProduk; ?>
                                                            </a><br>
                                                            <?php echo $produks->namaKategori; ?>
                                                            <p><?php echo $spek_text; ?></p>
                                                        </div>
                                                        <div class="thumbPrice pull-left">
                                                            <?php
                                                            $price = $produks->discountProduk > 0 ? $produks->stlhDiscount : $produks->hargaProduk;
                                                            echo $produks->discountProduk > 0 ? '<span class="strike-through">' . number_format($produks->hargaProduk, 0, ',', '.') . '</span><span class="disc">' . $produks->discountProduk . '% OFF</span>' : '';
                                                            ?>
                                                            <span><?php echo number_format($price, 0, ',', '.'); ?></span>                                            
                                                        </div>
                                                        <div class="button">
                                                            <div class="buy-now">
                                                                <a href="<?php echo site_url('page/keranjang_beli/' . $produks->id_produk); ?>" class="btn btn-danger">Buy Now</a>
                                                            </div>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                    </div><!--end row-->

                    <div class="pagination pagination-right">
                        <span class="pull-left">Showing 9 of 20 pages:</span>
                        <?php echo isset($produk) ? $links : '' ?>
                    </div><!--end pagination-->

                </div><!--end span9-->


            </div><!--end row-->

            <div class="bannerbot">
                <a href="#">
                    <img src="<?php echo base_url('assets/user/img/bannerbot.jpg'); ?>" />
                </a>
            </div><!--end row-->
        </div><!--end span9-->

    </div><!--end row-->

</div><!--end conatiner-->
