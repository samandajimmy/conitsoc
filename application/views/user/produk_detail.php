
<div class="container">

    <div class="row">

        <div class="span12">
            <div class="row">
                <?php
                $produk = $detail_produk[0];
                $gambar_detail = $this->produkModel->get_gambar_detail($produk->id);
                ?>

                <div class="product-details clearfix">
                    <div class="span5">
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
                                Intel Core i7-3537U, 4BG DDR3, 256GB SSD, GbE NIC,, WiFi Bluetooth, VGA Intel HD Graphics 4000, Camera, 13.3” WXGA, Win8 64Bit
                            </div>
                            <div class="product-inputs pull-right">
                                <form action="<?php echo $action; ?>" class="form-horizontal" method="post" accept-charset="utf-8">
                                    <input type="hidden" name="id_produk" value="<?php echo $produk->id; ?>">
                                    <div class="control-group unit_form">
                                        <label for="unit" class="control-label unit">Unit </label>                    
                                        <div class="unit_input controls">
                                            <input type="number" min="1" name="unit" value="1" class="span1" id="unit"  />
                                        </div>
                                    </div><!--end control-group-->
                                    <div class="unit_btn">
                                        <input type="submit" class="btn btn-danger" value="Add to Cart" style="width: 100%"  />
                                    </div>


                                </form><!--end form-->

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
            <div class="row">
                <div class="span12">
                    <div class="product-name">
                        Spesification
                    </div>
                </div>
            </div>

            <div class="row">
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
