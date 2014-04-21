
<div class="container">

    <div class="row-fluid">

        <div class="span12">
            <div class="row-fluid">
                <?php
                $produk = $detail_produk[0];
                $gambar_detail = $this->produkModel->get_gambar_detail($produk->id);
                $is_stocked = $produk->jml_stok > 0 ? TRUE : FALSE;
                $spek_text = '';
                $spek = $this->produkModel->get_produk_spek($produk->id);
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

                <div class="product-details clearfix">
                    <div style="width: 375px; float: left">
                        <ul class="produk-detail">
                            <li><img src="<?php echo base_url('produk/' . $produk->gambarProduk); ?>" /></li>
                            <?php
                            if (isset($gambar_detail)) {
                                foreach ($gambar_detail as $gbr_dtl) {
                                    ?>
                                    <li><img src="<?php echo base_url('produk/detail/' . $gbr_dtl->detail_gambar); ?>" /></li>
                                    <?php
                                }
                            }
                            ?>
                        </ul>
                        <div id="bx-pager" style="width: 80%; margin: 5px auto;">
                            <a data-slide-index="0" href=""><img src="<?php echo base_url('produk/thumbnail/' . $produk->gambarProduk); ?>" /></a>
                            <?php
                            $i = 1;
                            if (isset($gambar_detail)) {
                                foreach ($gambar_detail as $gbr_dtl) {
                                    ?>
                                    <a data-slide-index="<?php echo $i; ?>" href=""><img src="<?php echo base_url('produk/detail/thumbnail/' . $gbr_dtl->detail_gambar); ?>" /></a>
                                    <?php
                                    $i++;
                                }
                            }
                            ?>
                        </div>
                    </div><!--end span5-->

                    <div class="span5">
                        <div class="product-set">
                            <div class="product-name">
                                <?php echo $produk->namaProduk; ?>
                            </div>
                            <div class="product-spek">
                                <?php echo $spek_text; ?>
                            </div>
                            <div class="product-inputs pull-right">
                                <?php
                                if ($is_stocked) {
                                    ?>
                                    <form action="<?php echo $action; ?>" class="form-horizontal" method="post" accept-charset="utf-8">
                                        <input type="hidden" name="id_produk" value="<?php echo $produk->id; ?>">
                                        <div class="control-group unit_form">
                                            <label for="unit" class="control-label unit">Unit </label>                    
                                            <div class="unit_input controls">
                                                <input type="number" min="1" name="unit" class="span12" id="unit" <?php echo $is_stocked ? 'value="1"' : 'disabled'; ?> />
                                            </div>
                                        </div><!--end control-group-->
                                        <div class="unit_btn">
                                            <input type="submit" class="btn btn-danger" value="Add to Cart" style="width: 100%"  />
                                        </div>


                                    </form><!--end form-->
                                    <?php
                                } else {
                                    echo 'produk is out of stock';
                                }
                                ?>

                            </div><!--end product-inputs-->
                            <div class="product-price">
                                <?php
                                $before_disc = 'Rp.' . number_format($detail_produk[0]->hargaProduk, 0, ',', '.');
                                if ($detail_produk[0]->discountProduk == 0) {
                                    ?>
                                    <span><?php echo $before_disc; ?></span>
                                    <?php
                                } else {
                                    $after_disc = 'Rp.' . number_format($detail_produk[0]->stlhDiscount, 0, ',', '.');
                                    ?>
                                    <span class="strike-through"><?php echo $before_disc; ?></span><span class="disc"><?php echo number_format($detail_produk[0]->discountProduk); ?>% Off</span>
                                    <span><?php echo $after_disc; ?></span>
                                    <?php
                                }
                                ?>
                            </div><!--end product-price-->
                            <div class="product-info">
                                <h3>beli melalui <span>telepon</span></h3>
                                <p>
                                    beli via telepon ? Bisa ! Silakan hubungi kami di (021) 698 - 33338 !  Sales Consultant kami siap memberikan saran terbaik untuk anda.
                                </p>
                            </div><!--end product-info-->
                        </div><!--end product-set-->
                    </div><!--end span4-->

                </div><!--end product-details-->

            </div><!--end row-->
            <div class="row-fluid">
                <div class="span12">
                    <div class="product-name">
                        Spesification
                    </div>
                </div>
            </div>

            <div class="row-fluid">
                <div class="span8">

                    <div class="spek_detail">
                        <?php
                        if (isset($spesifikasi_produk)) {
                            ?>
                            <table class="bottomBorder">
                                <?php
                                foreach ($spesifikasi_produk as $spek) {
                                    ?>
                                    <tr>
                                        <td width="40%"><?php echo $spek->namaSpesifikasi; ?></td>
                                        <td><?php echo $spek->isiSpesifikasi; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </table>
                            <?php
                        }
                        ?>
                    </div><!--end product-tab-->
                </div>
            </div>

        </div><!--end span9-->

    </div><!--end row-->

</div><!--end conatiner-->
