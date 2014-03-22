<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->   
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">
                    Dashboard
                </h3>
                <?php
                if ($notif != '') {
                    ?>
                    <div class="alert alert-info">
                        <button class="close" data-dismiss="alert">×</button>
                        <strong>Info!</strong> <?php echo $notif . ' admin ' . $this->session->userdata('username'); ?>.
                    </div>
                    <?php
                }
                ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <!--BEGIN METRO STATES-->
            <div class="metro-nav">
                <div class="metro-nav-block nav-block-orange">
                    <a data-original-title="" href="#">
                        <i class="icon-user"></i>
                        <div class="info"><?php echo count($latest_cust); ?></div>
                        <div class="status">Latest Customer</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-yellow">
                    <a data-original-title="" href="#">
                        <i class="icon-tags"></i>
                        <div class="info"><?php echo count($latest_order); ?></div>
                        <div class="status">Latest Order</div>
                    </a>
                </div>
                <div class="metro-nav-block nav-block-grey">
                    <a data-original-title="" href="#">
                        <i class="icon-comments-alt"></i>
                        <div class="info"><?php echo count($latest_produk); ?></div>
                        <div class="status">Latest Produk</div>
                    </a>
                </div>
            </div>
            <div class="space10"></div>
            <div class="row-fluid">
                <div class="span12">
                    <h4>Latest Data</h4>
                    <div id="accordion" class="accordion in collapse" style="height: auto;">

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseOne" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle collapsed">
                                    Latest Customer
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseOne" style="height: 0px;">
                                <div class="accordion-inner">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Username</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($latest_cust)) {
                                                foreach ($latest_cust as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row->id; ?></td>
                                                        <td><?php echo $row->username; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseTwo" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
                                    Latest Order
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseTwo" style="height: 0px;">
                                <div class="accordion-inner">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Biaya Pemesanan</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($latest_order)) {
                                                foreach ($latest_order as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row->noPemesanan; ?></td>
                                                        <td><?php echo $row->biayaPemesanan; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a href="#collapseThree" data-parent="#accordion" data-toggle="collapse" class="accordion-toggle">
                                    Latest Product
                                </a>
                            </div>
                            <div class="accordion-body collapse" id="collapseThree" style="height: 0px;">
                                <div class="accordion-inner">

                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Nama Produk</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (isset($latest_produk)) {
                                                foreach ($latest_produk as $row) {
                                                    ?>
                                                    <tr>
                                                        <td><?php echo $row->id; ?></td>
                                                        <td><?php echo $row->namaProduk; ?></td>
                                                    </tr>
                                                    <?php
                                                }
                                            }
                                            ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!--END METRO STATES-->
        </div>
        <!--END PAGE CONTENT-->
    </div>
    <!--END PAGE CONTAINER-->
</div>

<script src="<?php echo base_url('assets/admin'); ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/jquery.sparkline.js" type="text/javascript"></script>
<script src="<?php echo base_url('assets/admin'); ?>/assets/chart-master/Chart.js"></script>

<!-- END JAVASCRIPTS -->   

<!--script for this page only-->

<script src="<?php echo base_url('assets/admin'); ?>/js/easy-pie-chart.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/sparkline-chart.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/home-page-calender.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/chartjs.js"></script>

<!--common script for all pages-->
<script src="<?php echo base_url('assets/admin'); ?>/js/common-scripts.js"></script>

