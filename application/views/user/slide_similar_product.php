<div class="similar-conitso">
    <div class="container">
        <div class="row-fluid">

            <div class="span12">
                <div id="hot-item">
                    <div class="row">

                        <div class="similar-button-field">	
                            <div class="similar-button" ><a></a></div>			
                        </div>
                        <ul class="hot-product clearfix">
                            <div class="hot-produk">
                                <?php
                                if (isset($similar)) {
                                    foreach ($similar as $similar) {
                                        ?>													
                                        <div class="slide">
                                            <a href="<?php echo site_url('page/produk_detail/' . $similar->id); ?>">
                                                <img src="<?php echo base_url('produk/iklan/' . $similar->gambarProduk); ?>" class="similar_product" />
                                            </a>
                                            <?php if ($similar->discountProduk > 0) : ?>
                                                <div class="labeldisc"><span><?php echo number_format($similar->discountProduk, 0, ',', '.') . '%' ?></span></div>
                                            <?php endif; ?>
                                            <p style="text-align: center"><?php echo $similar->namaProduk; ?></p>
                                        </div>
                                        <?php
                                    }
                                }
                                ?>
                            </div>

                        </ul>
                    </div><!--end row-->
                </div><!--end featuredItems-->
            </div><!--end span12-->

        </div><!--end row-->

    </div><!--end conatiner-->

</div>
