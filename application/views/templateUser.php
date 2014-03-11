<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
    <!--<![endif]-->
    <head>

        <!-- Basic Page Needs
        ================================================== -->
        <meta charset="utf-8">
        <title>
            Conitso.com | <?php echo $title; ?>
        </title>
        <meta name="description" content="">
        <meta name="author" content="Ahmed Saeed">
        <!-- Mobile Specific Metas
        ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <!-- CSS
        ================================================== -->
        <link rel="stylesheet" href="<?php echo base_url('assets/user'); ?>/css/bootstrap.min.css" media="screen">
        <!-- jquery ui css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/css/jquery-ui-1.10.1.min.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/css/customize.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/css/font-awesome.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/css/style.css">
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/css/custom.css">
        <!-- flexslider css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/css/flexslider.css">
        <!-- fancybox -->
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/js/fancybox/jquery.fancybox.css">
        <!-- bxslider css-->
        <link rel="stylesheet" href="<?php echo base_url('assets/user/'); ?>/js/bxslider/jquery.bxslider.css">
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <script src="http://ie7-js.googlecode.com/svn/version/2.1(beta4)/IE9.js"></script>
        <link rel="stylesheet" href="css/font-awesome-ie7.css">
        <![endif]-->
        <!-- Favicons
        ================================================== -->
        <link rel="shortcut icon" href="<?php echo base_url('assets/user/'); ?>/images/favicon.html">
        <link rel="apple-touch-icon" href="<?php echo base_url('assets/user/'); ?>/images/apple-touch-icon.html">
        <link rel="apple-touch-icon" sizes="72x72" href="<?php echo base_url('assets/user/'); ?>/images/apple-touch-icon-72x72.html">
        <link rel="apple-touch-icon" sizes="114x114" href="<?php echo base_url('assets/user/'); ?>/images/apple-touch-icon-114x114.html">
    </head>

    <body>

        <?php
        $logged_in = $this->session->userdata('logged_in');
        ?>

        <div id="mainContainer" class="clearfix">

            <!--begain header-->
            <header>

                <div class="middleHeader">
                    <div class="container">
                        <div class="middleContainer clearfix">

                            <div class="siteLogo pull-left">
                                <a
                                    href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url('assets/user'); ?>/img/conitso_logo.png" />
                                </a>
                            </div>
                            <div class="pull-left">
                                <div>
                                    <ul class="pull-right inline">
                                        <li>
                                            <a class="invarseColor" href="#">
                                                SOLUTION
                                            </a>
                                        </li>
                                        <li class="divider-vertical">
                                        </li>
                                        <li>
                                            <a class="invarseColor" href="#">
                                                CONSULTANT
                                            </a>
                                        </li>
                                        <li class="divider-vertical">
                                        </li>
                                        <li>
                                            <a class="invarseColor" href="#">
                                                CERTFICATION
                                            </a>
                                        </li>
                                        <li class="divider-vertical">
                                        </li>
                                        <li>
                                            <a class="invarseColor" href="#">
                                                POSTING PROJECT
                                            </a>
                                        </li>
                                    </ul>

                                </div>
                                <div>
                                    <form method="#" action="#" class="siteSearch">
                                        <div class="input-append search-wrap">
                                            <input type="text" class="search-conitso span5" id="appendedInputButton" placeholder="Search Kategori">
                                            <button class="btn btn-primary bgcolor-white" type="submit" name="">
                                                <i class="icon-search color-black">
                                                </i>
                                            </button>
                                        </div>
                                    </form><!--end form-->
                                </div>
                            </div>

                            <div class="pull-right">
                                <div class="login_register">
                                    <ul>
                                        <li>
                                            <a>
                                                Service
                                            </a>
                                        </li>
                                        <li style="min-width: 93px;">
                                            <a
                                                href="<?php echo site_url('page/register'); ?>">Register
                                            </a>
                                        </li>
                                        <?php
                                        if ($logged_in) {
                                            ?>
                                            <li>
                                                <a
                                                    href="<?php echo site_url('page/logout'); ?>">Logout
                                                </a>
                                            </li>
                                            <?php
                                        } else {
                                            ?>
                                            <li>
                                                <a id="user_login">
                                                    Login
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                    <div id="box">
                                        <ul class="login_box">
                                            <li>
                                                <form
                                                    method="POST" action="<?php echo site_url('page/login'); ?>">
                                                    <input type="text" placeholder="Username" name="username" />
                                                    <input type="password" placeholder="Password" name="password" />
                                                    <input type="submit" value="Login" />
                                                    <a class="pull-right">
                                                        Forgot Password??
                                                    </a>
                                                </form>
                                        </ul>
                                    </div>
                                </div>
                                <div class="pull-right margin14">
                                    <div class="btn-group">
                                        <img class="to-buy" src="<?php echo base_url('assets/user'); ?>/img/item_promo_icon.png" />
                                    </div>
                                    <div class="btn-group">
                                        <img class="to-buy" src="<?php echo base_url('assets/user'); ?>/img/how_to_buy_icon.png" />
                                    </div>

                                    <div class="btn-group" id="ym">
                                        <img class="hotline-button" src="<?php echo base_url('assets/user'); ?>/img/hotline_button.png" />
                                        <img class="ym-button" src="<?php echo base_url('assets/user'); ?>/img/ym button.png" />
                                        <div class="ym-drop">
                                            <ul>
                                                <li>
                                                    <a>
                                                        <img class="ym-on" src="<?php echo base_url('assets/user'); ?>/img/ym-on.png" />@johan_conitso
                                                    </a>
                                                </li>
                                                <li>
                                                    <a>
                                                        <img class="ym-on" src="<?php echo base_url('assets/user'); ?>/img/ym-sleep.png" />@andrew_conitso
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div><!--end pull-right-->

                        </div><!--end middleCoontainer-->

                    </div><!--end container-->
                </div><!--end middleHeader-->

                <div class="mainNav">
                    <div class="container">
                        <div class="navbar">
                            <ul class="nav">
                                <?php
                                $kategori = $this->kategoriModel->getAllKategoriIdx();
                                if (isset($kategori)) {
                                    foreach ($kategori as $row) {
                                        if ($row->idx > 7) {
                                            break;
                                        }
                                        ?>
                                        <li class="" id="<?php echo $row->namaKategori; ?>">
                                                <!--<a href="<?php //echo site_url('page/daftar_produk/' . $row->id . '/kategori');  ?>">-->
                                            <a>
                                                <span
                                                    data-title="<?php echo $row->namaKategori; ?>"><?php echo $row->namaKategori; ?>
                                                </span>
                                            </a>
                                        </li>
                                        <?php
                                    }
                                    ?>
                                    <li id="other">
                                        <a href="#">
                                            <span data-title="other">
                                                other
                                            </span>
                                        </a>
                                    </li>
                                    <li id="cart">
                                        <a
                                            href="<?php echo site_url('page/keranjang_beli'); ?>">
                                            <span data-title="Cart Item" style="float: left;">
                                                Cart Item
                                            </span>
                                            <i class="icon-chevron-down">
                                            </i> <img class="cart-icon" src="<?php echo base_url('assets/user'); ?>/img/cart_icon.png" />
                                        </a>
                                    </li>
                                    <?php
                                }
                                ?>

                            </ul><!--end nav-->
                        </div>
                    </div>
                    <?php
                    if (isset($kategori)) {
                        foreach ($kategori as $kategori) {
                            if ($kategori->idx > 7) {
                                $other[] = $kategori;
                            } else {
                                ?>
                                <div
                                    class="dropdown-frame" id="<?php echo $kategori->namaKategori ?>">
                                    <div class="container">
                                        <div class="dropdown-outer span4">
                                            <ul class="inner-menu">
                                                <div class="judul-kategori">
                                                    <h3 class="text-kategori">
                                                        <?php echo $kategori->namaKategori; ?>
                                                    </h3>
                                                </div>
                                                <?php
                                                $merk = $this->merkModel->getMerkByKategori($kategori->id);
                                                if (isset($merk)) {
                                                    $i = 1;
                                                    foreach ($merk as $merk) {
                                                        ?>
                                                        <li>
                                                                <!--<a href="<?php echo site_url('page/daftar_produk/' . $merk->idMerk . '/merk'); ?>">-->
                                                            <a>
                                                                <?php echo $merk->namaMerk; ?>
                                                            </a>
                                                        </li>
                                                        <?php
                                                        $i++;
                                                    }
                                                    ?>
                                                </ul>
                                                <ul class="inner-menu">
                                                    <div class="judul-kategori">
                                                        <h3 class="text-kategori">
                                                            Short by Price
                                                        </h3>
                                                    </div>
                                                    <li>
                                                        <a>
                                                            < 1 juta
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>
                                                            1 juta - 5 juta
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>
                                                            5 juta - 10 juta
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a>
                                                            > 10 juta
                                                        </a>
                                                    </li>

                                                </ul>
                                            </div>

                                            <div class="img-cat span8">
                                            </div>
                                        </div>
                                    </div>
                                    <?php
                                }
                            }
                        }
                    }
                    ?>
                    <?php
                    if (isset($other)) {
                        ?>
                        <div class="dropdown-frame" id="other">
                            <div class="container">
                                <div class="dropdown-outer span4">
                                    <ul class="inner-menu">
                                        <div class="judul-kategori">
                                            <h3 class="text-kategori">
                                                Other
                                            </h3>
                                        </div>
                                        <?php
                                        foreach ($other as $other) {
                                            ?>
                                            <li>
                                                <a
                                                    href="<?php echo site_url('page/daftar_produk/' . $other->id . '/kategori'); ?>"><?php echo $other->namaKategori; ?>
                                                </a>
                                            </li>
                                            <?php
                                        }
                                        ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                    ?>

                </div><!--end mainNav-->

            </header>
            <!-- end header -->

			
    <div class="container">

        <div class="row">

            <div class="span12">
			<?php echo $notif ? '<div class="alert alert-info"><button class="close" data-dismiss="alert">×</button><strong>Info!</strong> '.$notif.'.</div>' : ''; ?>
            </div><!--end span12-->

        </div><!--end row-->
    </div><!--end featuredItems--> 

            <?php
            if (isset($slide_promo)) {
                $this->load->view($slide_promo);
            }

            if (isset($slide_best_seller)) {
                $this->load->view($slide_best_seller);
            }

            if (isset($view)) {
                $this->load->view($view);
            }

            if (isset($slide_hot_product)) {
                $this->load->view($slide_hot_product);
            }
            ?>
            <!--begain footer-->
            <footer>
                <div class="footerOuter">
                    <div class="container">
                        <div class="row-fluid">

                            <div class="span3">
                                <div class="titleHeader clearfix">
                                    <h3>
                                        Quick Help
                                    </h3>
                                </div>

                                <div class="usefullLinks">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <ul class="unstyled">
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Forgot Password
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Help Center
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Warranty
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Download
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        How To Buy
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        FAQ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Shipping Cost
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="titleHeader clearfix">
                                    <h3>
                                        Quick Help
                                    </h3>
                                </div>

                                <div class="usefullLinks">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <ul class="unstyled">
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Forgot Password
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Help Center
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Warranty
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div><!--end span6-->

                            <div class="span3">
                                <div class="titleHeader clearfix">
                                    <h3>
                                        Product Category
                                    </h3>
                                </div>
                                <div class="usefullLinks">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <ul class="unstyled">
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Forgot Password
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Help Center
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                                <div class="titleHeader clearfix">
                                    <h3>
                                        Quick Help
                                    </h3>
                                </div>

                                <div class="usefullLinks">
                                    <div class="row-fluid">
                                        <div class="span12">
                                            <ul class="unstyled">
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Forgot Password
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Help Center
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Warranty
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Download
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        How To Buy
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        FAQ
                                                    </a>
                                                </li>
                                                <li>
                                                    <a class="invarseColor white" href="#">
                                                        Shipping Cost
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div><!--end span6-->

                            <div class="span3">
                                <div class="titleHeader clearfix">
                                    <h3>
                                        Our Shop, Mangga Dua
                                    </h3>
                                </div>

                                <div class="contactInfo">
                                    <p class="infoContact">
                                        Ruko Garden Shopping Arcade No. 8EK<br>
                                        Podomoro City - Central Park<br>
                                        Jl. Letjen S. Parman Kav. 28<br>
                                        Grogol - Petamburan<br>
                                        Jakarta Barat - 11470<br>
                                        see map detail<br><br>
                                        Telp : (021) 5698 5511 (Hunting)<br>
                                        COD : (021) 2920 6363<br>
                                        Fax : (021) 5698 5522<br>
                                        E-mail : sales@jakartanotebook.com<br>
                                        Jam Buka<br>
                                        Senin - Jumat : 10:00 - 19:00<br>
                                        Sabtu : 10:00 - 17:00<br>
                                        Minggu / Hari Libur : Tutup
                                    </p>
                                </div>

                            </div><!--end span3-->

                            <div class="span3">
                                <div class="titleHeader clearfix">
                                    <h3>
                                        Our Shop, Pluit
                                    </h3>
                                </div>

                                <div class="contactInfo">
                                    <p class="infoContact">
                                        Jl. Letjen S. Parman Kav. 28<br>
                                        Grogol - Petamburan<br>
                                        Jakarta Barat - 11470<br>
                                        see map detail<br><br>
                                        Telp : (021) 5698 5511 (Hunting)<br>
                                        COD : (021) 2920 6363<br>
                                        Fax : (021) 5698 5522<br>
                                        E-mail : sales@jakartanotebook.com<br>
                                        Jam Buka<br>
                                        Senin - Jumat : 10:00 - 19:00<br>
                                    </p>
                                </div>
                                <div class="foot-button">
                                    <div class="foot-button-top">
                                        <div class="btn-group">
                                            <img class="item-to-foot" src="<?php echo base_url('assets/user'); ?>/img/item_promo_icon.png" />
                                        </div>
                                        <div class="btn-group">
                                            <img class="how-to-foot" style="margin-left: 20px;" src="<?php echo base_url('assets/user'); ?>/img/how_to_buy_icon.png" />
                                        </div>
                                    </div>
                                    <div class="foot-button-bottom">
                                        <div class="btn-group">
                                            <img class="hotline-button" src="<?php echo base_url('assets/user'); ?>/img/hotline_button.png" />
                                        </div>
                                    </div>
                                </div>

                            </div><!--end span3-->

                        </div><!--end row-fluid-->

                    </div><!--end container-->
                </div><!--end footerOuter-->
                <div class="bottom_foot">
                    <div class="container">
                        <div class="row">
                            <div class="span12">
                                <p>
                                    Copyright GeekyStudio.com - Toko Online dengan sensai belanja online store ala mall | All Right Reserved
                                </p>
                                <p>
                                    Untuk pengalaman browsing terbaik gunakan browser Google Chrome
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>
            <!--end footer-->

        </div><!--end mainContainer-->


        <!-- JS
        ================================================== -->

        <script type="text/javascript">
            var baseURL = "<?php echo base_url(); ?>";
            var siteURL = "<?php echo site_url(); ?>";
        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js">
        </script>
        <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/jquery-ui.min.js">
        </script>
        <!-- bxslider -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/bxslider/jquery.bxslider.min.js">
        </script>
        <!-- jQuery.Cookie -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/jquery.cookie.js">
        </script>
        <!-- bootstrap -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/bootstrap.min.js">
        </script>
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/customize.js">
        </script>
        <!-- flexslider -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/jquery.flexslider-min.js">
        </script>
        <!-- cycle2 -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/jquery.cycle2.min.js">
        </script>
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/jquery.cycle2.carousel.min.js">
        </script>
        <!-- tweets -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/jquery.tweet.js">
        </script>
        <!-- placeholder -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/jquery.placeholder.min.html">
        </script>
        <!-- fancybox -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/fancybox/jquery.fancybox.js">
        </script>
        <!-- custom function-->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/custom.js">
        </script>
        <!-- bxslider -->
        <script
            src="<?php echo base_url('assets/user/'); ?>/js/bxslider/jquery.bxslider.min.js">
        </script>

    </body>

</html>