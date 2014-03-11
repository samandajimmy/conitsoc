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
                    <div id="top_menu" class="nav notify-row">
                        <!-- BEGIN NOTIFICATION -->
                        <ul class="nav top-menu">
                            <!-- BEGIN SETTINGS -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-tasks"></i>
                                    <span class="badge badge-important">6</span>
                                </a>
                                <ul class="dropdown-menu extended tasks-bar">
                                    <li>
                                        <p>You have 6 pending tasks</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Dashboard v1.3</div>
                                                <div class="percent">44%</div>
                                            </div>
                                            <div class="progress progress-striped active no-margin-bot">
                                                <div class="bar" style="width: 44%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Database Update</div>
                                                <div class="percent">65%</div>
                                            </div>
                                            <div class="progress progress-striped progress-success active no-margin-bot">
                                                <div class="bar" style="width: 65%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Iphone Development</div>
                                                <div class="percent">87%</div>
                                            </div>
                                            <div class="progress progress-striped progress-info active no-margin-bot">
                                                <div class="bar" style="width: 87%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Mobile App</div>
                                                <div class="percent">33%</div>
                                            </div>
                                            <div class="progress progress-striped progress-warning active no-margin-bot">
                                                <div class="bar" style="width: 33%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <div class="task-info">
                                                <div class="desc">Dashboard v1.3</div>
                                                <div class="percent">90%</div>
                                            </div>
                                            <div class="progress progress-striped progress-danger active no-margin-bot">
                                                <div class="bar" style="width: 90%;"></div>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="external">
                                        <a href="#">See All Tasks</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END SETTINGS -->
                            <!-- BEGIN INBOX DROPDOWN -->
                            <li class="dropdown" id="header_inbox_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <i class="icon-envelope-alt"></i>
                                    <span class="badge badge-important">5</span>
                                </a>
                                <ul class="dropdown-menu extended inbox">
                                    <li>
                                        <p>You have 5 new messages</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url('assets/admin'); ?>/img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jonathan Smith</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is an example msg.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url('assets/admin'); ?>/img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jhon Doe</span>
                                                <span class="time">10 mins</span>
                                            </span>
                                            <span class="message">
                                                Hi, Jhon Doe Bhai how are you ?
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url('assets/admin'); ?>/img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jason Stathum</span>
                                                <span class="time">3 hrs</span>
                                            </span>
                                            <span class="message">
                                                This is awesome dashboard.
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="photo"><img src="<?php echo base_url('assets/admin'); ?>/img/avatar-mini.png" alt="avatar" /></span>
                                            <span class="subject">
                                                <span class="from">Jondi Rose</span>
                                                <span class="time">Just now</span>
                                            </span>
                                            <span class="message">
                                                Hello, this is metrolab
                                            </span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all messages</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END INBOX DROPDOWN -->
                            <!-- BEGIN NOTIFICATION DROPDOWN -->
                            <li class="dropdown" id="header_notification_bar">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                                    <i class="icon-bell-alt"></i>
                                    <span class="badge badge-warning">7</span>
                                </a>
                                <ul class="dropdown-menu extended notification">
                                    <li>
                                        <p>You have 7 new notifications</p>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Server #3 overloaded.
                                            <span class="small italic">34 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-warning"><i class="icon-bell"></i></span>
                                            Server #10 not respoding.
                                            <span class="small italic">1 Hours</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-important"><i class="icon-bolt"></i></span>
                                            Database overloaded 24%.
                                            <span class="small italic">4 hrs</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-success"><i class="icon-plus"></i></span>
                                            New user registered.
                                            <span class="small italic">Just now</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">
                                            <span class="label label-info"><i class="icon-bullhorn"></i></span>
                                            Application error.
                                            <span class="small italic">10 mins</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="#">See all notifications</a>
                                    </li>
                                </ul>
                            </li>
                            <!-- END NOTIFICATION DROPDOWN -->

                        </ul>
                    </div>
                    <!-- END  NOTIFICATION -->
                    <div class="top-nav ">
                        <ul class="nav pull-right top-menu" >
                            <!-- BEGIN SUPPORT -->
                            <li class="dropdown mtop5">

                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Chat">
                                    <i class="icon-comments-alt"></i>
                                </a>
                            </li>
                            <li class="dropdown mtop5">
                                <a class="dropdown-toggle element" data-placement="bottom" data-toggle="tooltip" href="#" data-original-title="Help">
                                    <i class="icon-headphones"></i>
                                </a>
                            </li>
                            <!-- END SUPPORT -->
                            <!-- BEGIN USER LOGIN DROPDOWN -->
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                    <img src="<?php echo base_url('assets/admin'); ?>/img/avatar1_small.jpg" alt="" />
                                    <span class="username">Jhon Doe</span>
                                    <b class="caret"></b>
                                </a>
                                <ul class="dropdown-menu extended logout">
                                    <li><a href="#"><i class="icon-user"></i> My Profile</a></li>
                                    <li><a href="#"><i class="icon-cog"></i> My Settings</a></li>
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
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-book"></i>
                                <span>Manage Admin</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="general.html">Input Admin</a></li>
                                <li><a class="" href="button.html">View Admin</a></li>
                            </ul>
                        </li>
                        <li class="sub-menu">
                            <a href="javascript:;" class="">
                                <i class="icon-cogs"></i>
                                <span>Manage Category</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('kategori/kategoriInput'); ?>">Input Category</a></li>
                                <li><a class="" href="<?php echo site_url('kategori/kategoriView'); ?>">View Category</a></li>
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
                                <span>Manage Product</span>
                                <span class="arrow"></span>
                            </a>
                            <ul class="sub">
                                <li><a class="" href="<?php echo site_url('produk/produkInput'); ?>">Input Product</a></li>
                                <li><a class="" href="<?php echo site_url('produk/produkView'); ?>">View Product</a></li>
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
                                <li><a class="" href="<?php echo site_url('banner/iklanManage'); ?>">Manage Iklan</a></li>
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