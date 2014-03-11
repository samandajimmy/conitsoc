<div class="slide-conitso">
    <div class="container">
        <div class="row">
            <div class="span12">
                <div class="flexslider">
                    <ul class="slides">
                        <?php
                        $banner = $this->banner_model->get_all_active_banner();
                        if (isset($banner)) {
                            foreach ($banner as $banner) {
                                ?>
                                <li>
                                    <img src="<?php echo base_url('banner/' . $banner->gambarBanner); ?>" slt="slide1">
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                </div><!--end flexslider-->
            </div><!--end span8-->
        </div>
    </div><!--end conatiner-->
</div>
