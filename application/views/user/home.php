
<div class="body-conitso">
    <div class="container">

        <div class="row">

            <div class="span12">
                <div id="featuredItems">

                    <div class="row">
                        <ul class="hProductItems clearfix">
                            <?php
                            if (isset($all_produk)) {
                                foreach ($all_produk as $produk) {
                                    ?>
                                    <li class="clearfix">
                                        <div class="thumbnail">
                                            <a href="<?php echo site_url('page/produk_detail/' . $produk->id); ?>">
                                                <img src="<?php echo base_url('produk/gambar/' . $produk->gambarProduk); ?>" alt="">
                                            </a>
                                        </div>
                                        <div class="thumbSetting">
                                            <div class="thumbTitle">
                                                <a href="<?php echo site_url('page/produk_detail/' . $produk->id); ?>" class="invarseColor">
                                                    <?php echo $produk->namaProduk; ?>
                                                </a>
                                            </div>
                                            <span><?php echo $produk->deskripsiProduk; ?></span>
                                            <div class="thumbPrice">
                                                <?php
                                                $harga = 'Rp. ' . number_format($produk->hargaProduk, 0, ',', '.');
                                                if ($produk->discountProduk > 0) {
                                                    $harga_disc = 'Rp. ' . number_format($produk->stlhDiscount, 0, ',', '.');
                                                    $disc = number_format($produk->discountProduk, 0, ',', '.') . '%';
                                                    echo '<span class="strike-through">' . $harga . '</span><span class="disc">' . $disc . ' OFF</span>';
                                                    echo '<span>' . $harga_disc . '</span>';
                                                } else {
                                                    echo '<span>' . $harga . '</span>';
                                                }
                                                ?>
                                            </div>
                                            <div class="buy-now">
                                                <a href="<?php echo site_url('page/keranjang_beli/' . $produk->id); ?>" class="btn btn-danger">Buy Now</a>
                                            </div>
                                        </div>
                                    </li>

                                    <?php
                                }
                            }
                            ?>

                        </ul>
                    </div><!--end row-->
                </div><!--end featuredItems-->
            </div><!--end span12-->

        </div><!--end row-->

        <div class="bannerbot">
            <a href="#">
                <img src="<?php echo base_url('assets/user/img/bannerbot.jpg'); ?>" />
            </a>
        </div><!--end row-->
    </div><!--end featuredItems--> 
</div><!--end conatiner-->
