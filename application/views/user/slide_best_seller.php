
<div class="best-conitso">
    <div class="container">
        <div class="row-fluid">

            <div class="span12">
                <div id="hot-item">
                    <div class="row">
                        <ul class="hot-product clearfix">
                            <div class="iklan">
                                <?php
                                $iklan = $this->iklan_model->get_all_active('body');
                                foreach ($iklan as $row) {
                                    ?>
                                    <div class="slide">
                                        <a href="<?php echo $row->link; ?>" target="_blank">
                                            <img src="<?php echo base_url('iklan/' . $row->type . '/' . $row->gambarIklan); ?>" />
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
        <div class="best-button" ></div>			
    </div>

</div>
