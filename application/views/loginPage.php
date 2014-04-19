<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9"> <![endif]-->
<!--[if !IE]><!--> <html lang="en"> <!--<![endif]-->
    <!-- BEGIN HEAD -->
    <head>
        <meta charset="utf-8" />
        <title>Login Ecome System</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/css/bootstrap.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/style.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/style-responsive.css" rel="stylesheet" />
        <link href="<?php echo base_url('assets/admin'); ?>/css/style-default.css" rel="stylesheet" id="style_color" />


        <script src="<?php echo base_url('assets/admin'); ?>/js/jquery-1.8.3.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="<?php echo base_url('assets/admin'); ?>/js/bootstrap-growl-master/jquery.bootstrap-growl.min.js"></script>
        <?php
        if ($notif) {
            ?>
            <script type="text/javascript">
                $(function() {
                    setTimeout(function() {
                        $.bootstrapGrowl("<?php echo $notif; ?>");
                    });
                });
            </script>
            <?php
        }
        ?>
    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="lock">
        <div class="lock-header">
            <!-- BEGIN LOGO -->
            <a class="center" id="logo" href="index.html">
                <img class="center" alt="logo" src="<?php echo base_url('assets/admin'); ?>/img/logo.png">
            </a>
            <!-- END LOGO -->
        </div>
        <div class="login-wrap">
            <div class="metro single-size red">
                <div class="locked">
                    <i class="icon-lock"></i>
                    <span>Login</span>
                </div>
            </div>
            <form action="<?php echo site_url('user/userLogin'); ?>" method="POST">
                <div class="metro double-size green">
                    <div class="input-append lock-input">
                        <input type="text" name="username" class="" placeholder="Username" />
                    </div>
                </div>
                <div class="metro double-size yellow">
                    <div class="input-append lock-input">
                        <input type="password" name="password" class="" placeholder="Password" />
                    </div>
                </div>
                <div class="metro single-size terques login">
                    <button type="submit" class="btn login-btn">
                        Login
                        <i class=" icon-long-arrow-right"></i>
                    </button>
                </div>
            </form>
            <div class="login-footer">
                <div class="remember-hint pull-left">
                    <input type="checkbox" id=""> Remember Me
                </div>
                <div class="forgot-hint pull-right">
                    <a id="forget-password" class="" href="javascript:;">Forgot Password?</a>
                </div>
            </div>
        </div>
    </body>
    <!-- END BODY -->
</html>