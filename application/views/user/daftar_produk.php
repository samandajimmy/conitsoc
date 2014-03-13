
<div class="container">

    <div class="row">

        <div class="span12">


            <div id="crumbs">
                <ul>
                    <li><a href="#1">home</a></li>
                    <li><a href="#2">notebook</a></li>
                    <li><a href="#3">apple</a></li>
                    <li><a href="#4">macbook pro 13"</a></li>
                </ul>
            </div>
            <div id="short_by_price">
                <ul>
                    <li><a href="#1">Short by Price</a></li>
                    <li><a href="#2">< 1 Juta</a></li>
                    <li><a href="#3">1 Juta - 5 Juta</a></li>
                    <li><a href="#4">5 Juta - 10 Juta</a></li>
                    <li><a href="#4">> 10 Juta</a></li>
                </ul>
            </div>
            <div class="row">

                <aside class="span3">
                    <div class="title_gambar"></div>

                    <div class="kategori">
                        <div class="aside_header clearfix">
                            <h3>Product Category</h3>
                        </div><!--end titleHeader-->
                        <ul class="unstyled">
                            <?php
                            if (isset($kategori)) {
                                foreach ($kategori as $kategoris) {
                                    ?>
                                    <li><a class="invarseColor" href="<?php echo $kategoris->id; ?>"><?php echo $kategoris->namaKategori; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div class="aside_header clearfix">
                            <h3>Brand Category</h3>
                        </div><!--end titleHeader-->
                        <ul class="unstyled">
                            <?php
                            if (isset($merk)) {
                                foreach ($merk as $merks) {
                                    ?>
                                    <li><a class="invarseColor" href=""><?php echo $merks->namaMerk; ?></a></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
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
                                                    <a href="#"><img src="<?php echo base_url('produk/gambar/' . $produks->gambarProduk); ?>" alt=""></a>
                                                </div>
                                            </div>
                                            <div class="span7">
                                                <div class="thumbSetting clearfix">
                                                    <div class="thumb_field">
                                                        <div class="thumbTitle pull-left">
                                                            <a href="<?php echo $produks->id_produk; ?>" class="invarseColor">
                                                                <?php echo $produks->namaProduk; ?>
                                                            </a><br>
                                                            <?php echo $produks->namaKategori; ?>
                                                            <p><?php echo $spek_text; ?></p>
                                                        </div>
                                                        <div class="thumbPrice pull-left">
                                                            <span class="strike-through">Rp. 6.000.000</span><span class="disc">20% OFF</span><span>Rp. 4.800.000</span>                                            
                                                        </div>
                                                        <div class="button">
                                                            <div class="buy-now">
                                                                <a href="http://localhost/conitsoc_old/index.php/page/keranjang_beli/28" class="btn btn-danger">Buy Now</a>
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
