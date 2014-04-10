<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>E-commerce System | <?php echo $title; ?></title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="Mosaddek" name="author" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/css/bootstrap-fileupload.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/custom.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/style-gray.css" rel="stylesheet" id="style_color" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/fullcalendar/fullcalendar/bootstrap-fullcalendar.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url('assets/admin'); ?>/assets/fancybox/source/jquery.fancybox.css" rel="stylesheet" />


        <!-- BEGIN JAVASCRIPTS -->
        <!-- Load javascripts at bottom, this will reduce page load time -->

        <script type="text/javascript">
            var baseURL = "<?php echo base_url(); ?>";
            var siteURL = "<?php echo site_url(); ?>";
        </script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/jquery.nicescroll.js" type="text/javascript"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/jquery-slimscroll/jquery-ui-1.9.2.custom.min.js"></script>
        <script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/jquery-slimscroll/jquery.slimscroll.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/fullcalendar/fullcalendar/fullcalendar.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/custom.js"></script>



    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="fixed-top">
        <!-- BEGIN HEADER -->
        <div id="header" class="navbar navbar-inverse navbar-fixed-top">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="container-fluid">
                    <!--BEGIN SIDEBAR TOGGLE-->
                    <div class="sidebar-toggle-box hidden-phone">
                        <div class="icon-reorder"></div>
                    </div>
                    <!--END SIDEBAR TOGGLE-->
                    <!-- BEGIN LOGO -->
                    <a class="brand" href="index.html">
                        <img src="<?php echo base_url('assets/admin'); ?>/img/logo.png" alt="Ecome System" />
                    </a>
                    <!-- END LOGO -->
                    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
                    <a class="btn btn-navbar collapsed" id="main_menu_trigger" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="arrow"></span>
                    </a>
                    <!-- END RESPONSIVE MENU TOGGLER -->
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <span class="username"><?php echo $this->session->userdata('username'); ?></span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
<!--                                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>-->
                                    <li><a href="<?php echo site_url('user/userLogout'); ?>"><i class="icon-key"></i> Log Out</a></li>
                                </ul>
                            </li>
                            <!-- END USER LOGIN DROPDOWN -->
                        </ul>
                        <!-- END TOP NAVIGATION MENU -->
                    </div>
                </div>
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div id="container" class="row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="sidebar-scroll">
                <div id="sidebar" class="nav-collapse collapse">
                    <!-- BEGIN SIDEBAR MENU -->
                    <ul class="sidebar-menu">
                        <li class="sub-menu">
                            <a class="" href="<?php echo site_url('user/adminDashboard'); ?>">
                                <i class="icon-dashboard"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>
                        <?php
                        if ($this->session->userdata('tipeUser') == -1) {
                            ?>
                            <li class="sub-menu">
                                <a href="javascript:;" class="">
                                    <i class="icon-book"></i>
                                    <span>Manage Admin</span>
                                    <span class="arrow"></span>
                                </a>
                                <ul class="sub">
                                    <li><a class="" href="<?php echo site_url('user/userInput'); ?>">Manage Admin</a></li>
                                    <li><a class="" href="<?php echo site_url('user/view_customer'); ?>">View Customer</a></li>
                                </ul>
                            </li>
                            <?php
                        }
                        ?>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-cogs"></i>
                                <span>Manage Kategori</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('kategori/kategoriInput'); ?>">Input Kategori</a></li>
                                <li><a class="" href="<?php echo site_url('kategori/kategoriView'); ?>">View Kategori</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-tasks"></i>
                                <span>Manage Merk</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('merk/merkInput'); ?>">Input Merk</a></li>
                                <li><a class="" href="<?php echo site_url('merk/merkView'); ?>">View Merk</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Manage Produk</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('produk/produkInput'); ?>">Input Produk</a></li>
                                <li><a class="" href="<?php echo site_url('produk/produkView'); ?>">View Produk</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Manage Order</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('pemesanan/daftar_pesanan'); ?>">Order</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Manage Artikel</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('artikel/input'); ?>">Input Artikel</a></li>
                                <li><a class="" href="<?php echo site_url('artikel/view'); ?>">View Artikel</a></li>
                                <li><a class="" href="<?php echo site_url('certification/input'); ?>">Input Certification</a></li>
                                <li><a class="" href="<?php echo site_url('certification/view'); ?>">View Certification</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Manage Promo</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('banner/bannerManage'); ?>">Manage Banner</a></li>
                                <li><a class="" href="<?php echo site_url('iklan/view'); ?>">Manage Iklan</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="<?php echo site_url('shipping/manage_shipping'); ?>" class="">
                                <i class="icon-th"></i>
                                <span>Manage Shipping</span>
                            </a>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-th"></i>
                                <span>Manage Project</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('project/view'); ?>">View Project</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <!-- END SIDEBAR -->

            <!-- BEGIN PAGE -->  
            <?php $this->load->view($view); ?>
            <!-- END PAGE -->  
        </div>
        <!-- END CONTAINER -->

        <!-- BEGIN FOOTER -->
        <div id="footer">
            2013 &copy; Ecome System.
        </div>
        <!-- END FOOTER -->

        <!-- ie8 fixes -->
        <!--[if lt IE 9]>
        <script src="js/excanvas.js"></script>
        <script src="js/respond.js"></script>
        <![endif]-->
    </body>
    <!-- END BODY -->
</html>