<div class="container" style="padding-bottom: 20px;">

    <div class="row-fluid">
        <?php
        $email = array(
            'name' => 'email',
            'id' => 'email',
            'type' => 'email',
            'class' => 'span12',
            'value' => set_value('email')
        );

        $password = array(
            'name' => 'password',
            'id' => 'password',
            'type' => 'password',
            'class' => 'span12',
            'value' => set_value('password')
        );

        $conf_pass = array(
            'name' => 'conf_pass',
            'id' => 'conf_pass',
            'type' => 'password',
            'class' => 'span12',
            'value' => set_value('conf_pass')
        );

        $nama_jelas = array(
            'name' => 'nama_jelas',
            'id' => 'nama_jelas',
            'class' => 'span12',
            'value' => set_value('nama_jelas')
        );

        $jenis_kelamin = array(
            'Pria' => 'Pria',
            'Wanita' => 'Wanita'
        );

        $no_telp = array(
            'name' => 'no_telepon',
            'id' => 'no_telepon',
            'class' => 'span12',
            'value' => set_value('no_telepon')
        );
        ?>
        <div class="span6 login-wrap">
            <div class="login">
                <div class="titleHeader clearfix">
                    <h3>SIGN IN CUSTOMER</h3>
                </div><!--end titleHeader-->

                <form method="POST" action="<?php echo $action_login; ?>" class="form-horizontal">

                    <?php
                    if ($checkout == 'checkout') {
                        echo form_hidden('prev_url', $checkout);
                    }
                    ?>
                    <div class="control-group">
                        <label class="control-label">Your Username <span class="text-error">*</span></label>
                        <div class="controls">
                            <input type="email" name="email" class="span12" value="" placeholder="example@example.com">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Your Password <span class="text-error">*</span></label>
                        <div class="controls">
                            <input type="password" name="password" class="span12" value="" placeholder="**************">
                        </div>
                    </div>
                    <div class="control-group">
                        <div class="controls">
                            <label class="checkbox">
                                <input type="checkbox"> Check me out
                            </label>
                        </div>							
                        <div style="clear: both"></div>
                        <div class="btn-login">
                            <button type="submit" class="btn btn-info">Login</button>
                        </div>
                    </div>
                </form>

<!--<table>
<tr>
<td width="50%">
<h3>New Customer</h3>
<p>By creating an account you will be able to shop faster, be up to date on an order's status, and keep track of the orders you have previously made.</p>
<a href="<?php echo site_url('page/register'); ?>" class="btn">Register</a>
</td>

<td width="50%">
<h3>Returning Customer</h3>
<form method="POST" action="<?php echo site_url('page/login'); ?>" class="">
<div class="controls">
    <label>Your Username: <span class="text-error">*</span></label>
    <input type="text" name="username" value="" placeholder="example@example.com">
</div>
<div class="controls">
    <label>Your Password: <span class="text-error">*</span></label>
    <input type="password" name="password" value="" placeholder="**************">
</div>
<div class="controls">
    <label class="checkbox">
        <input type="checkbox"> Check me out
    </label>
    <button type="submit" class="btn btn-primary">Login</button>
</div>
</form><!--end form
</td>
</tr>
</table>-->
            </div><!--end login-->
        </div><!--end span9-->
        <div class="span6 register-wrap">
            <div class="register">

                <div class="titleHeader clearfix">
                    <h3>Become A Member</h3>
                </div><!--end titleHeader-->
                <div class="registerdesc">
                    <p>Bisa kami menyita 2 menit waktu anda untuk melengkapi form di bawah?<br />
                        setelah itu anda dapet kembali berbelanja dan menikmati beberapa keuntungan khusus. </p>
                </div>
                <?php echo form_open($action_register, 'class="form-horizontal" id ="register"'); ?>
                <?php if (validation_errors()) : ?>
                    <div class="error-top"><img width="15px" height="15px;" src="<?php echo base_url('assets/user/img/ximg.jpg'); ?>" /><span>Data yang Anda Masukan Tidak Sesuai</span></div>
                <?php endif; ?>

                <?php
                if ($checkout == 'checkout') {
                    echo form_hidden('prev_url', $checkout);
                }
                ?>

                <div class="control-group">
                    <div class="controls">
                        <div style="clear: both"></div>
                        <div class="btn-register">
                            <button type="submit" class="btn btn-info">Daftar Sekarang</button>
                        </div>
                    </div>
                </div><!--end control-group-->


                <?php echo form_close(); ?><!--end form-->

            </div><!--end register-->
        </div><!--end span9-->
    </div><!--end row-->

</div><!--end conatiner-->
