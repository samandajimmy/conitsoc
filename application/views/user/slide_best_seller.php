
<div class="best-conitso">
    <div class="container">
        <div class="row">

            <div class="span12">
                <div id="hot-item">
                    <div class="row">
                        <ul class="hot-product clearfix">
                            <div class="iklan">
                                <?php
                                $iklan = $this->banner_model->get_all_active_iklan();
                                foreach ($iklan as $row) {
                                    ?>
                                    <div class="slide">
                                        <a href="#">
                                            <img src="<?php echo base_url('banner/iklan/'.$row->gambarIklan); ?>" />
                                        </a>
                                    </div>
                                    <?php
                                }
                                ?>
                            </div>

                        </ul>
                    </div><!--end row-->
                </div><!--end featuredItems-->
            </div><!--end span12-->

        </div><!--end row-->

    </div><!--end conatiner-->

    <div class="best-button-field">	
        <div class="best-button" ><a>Best Seller Product</a></div>			
    </div>

</div>
