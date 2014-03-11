


<div class="hot-conitso">
    <div class="container">
        <div class="row">

            <div class="span12">
                <div id="hot-item">
                    <div class="row">

                        <div class="hot-button-field">	
                            <div class="hot-button" ><a></a></div>			
                        </div>
                        <ul class="hot-product clearfix">
                            <div class="hot-produk">
                                <?php
                                $best_seller = $this->produkModel->getProdukBestSeller();
                                if (isset($best_seller)) {
                                    foreach ($best_seller as $best) {
                                        ?>													
                                        <div class="slide">
                                            <a href="<?php echo site_url('page/produk_detail/' . $best->id_produk); ?>">
                                                <img src="<?php echo base_url('produk/iklan/' . $best->gambarProduk); ?>" />
                                            </a>
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
