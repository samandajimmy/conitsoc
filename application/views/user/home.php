
<div class="body-conitso">
    <div class="container">

        <div class="row-fluid">

            <div class="span12">
                <div id="featuredItems">

                    <div class="row-fluid">
                        <ul class="hProductItems clearfix">
                            <?php
                            if (isset($all_produk)) {
                                foreach ($all_produk as $key => $produk) {
                                    $first = ($key % 5) == 0 ? 'first' : '';
                                    $param[$key] = $key;
                                    ?>
                                    <li class="clearfix <?php echo $first; ?>">
                                        <div class="thumbnail">
                                            <a href="<?php echo site_url('page/produk_detail/' . $produk->id); ?>">
                                                <img src="<?php echo base_url('produk/gambar/' . $produk->gambarProduk); ?>" alt="">
                                            </a>
                                            <?php if ($produk->discountProduk > 0) : ?>
                                                <div class="labeldisc"><span><?php echo number_format($produk->discountProduk, 0, ',', '.') . '%' ?></span></div>
                                            <?php endif; ?>
                                        </div>
                                        <div class="thumbSetting">
                                            <div class="thumbTitle">
                                                <a href="<?php echo site_url('page/produk_detail/' . $produk->id); ?>" class="invarseColor">
                                                    <?php echo $produk->namaProduk; ?>
                                                </a>
                                            </div>
                                            <span class="desc"><?php echo character_limiter($produk->deskripsiProduk, 50); ?></span>
                                            <div class="thumbPrice">
                                                <?php
                                                $harga = 'Rp.' . number_format($produk->hargaProduk, 0, ',', '.');
                                                if ($produk->discountProduk > 0) {
                                                    $harga_disc = 'Rp. ' . number_format($produk->stlhDiscount, 0, ',', '.');
                                                    $disc = number_format($produk->discountProduk, 0, ',', '.') . '%';
                                                    echo '<span class="strike-through">' . $harga . '</span><span class="disc">&nbsp' . $disc . ' OFF</span>';
                                                    echo '<span>' . $harga_disc . '</span>';
                                                } else {
                                                    echo '<span style="padding-top:10px;">' . $harga . '</span>';
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
            <?php
            if (isset($iklan_footer[0])) {
                ?>
                <a href="<?php echo $iklan_footer[0]->link; ?>" target="_blank">
                    <img src="<?php echo base_url('iklan/' . $iklan_footer[0]->type . '/' . $iklan_footer[0]->gambarIklan); ?>" />
                </a>
                <?php
            }
            ?>
        </div><!--end row-->
    </div><!--end featuredItems--> 
</div><!--end conatiner-->
