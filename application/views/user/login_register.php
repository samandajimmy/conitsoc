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
                        <label class="control-label">Email <span class="text-error">*</span></label>
                        <div class="controls">
                            <input type="email" name="email" class="span12" value="" placeholder="example@example.com">
                        </div>
                    </div>
                    <div class="control-group">
                        <label class="control-label">Password <span class="text-error">*</span></label>
                        <div class="controls">
                            <input type="password" name="password" class="span12" value="" placeholder="**************">
                        </div>
                    </div>
                    <div class="control-group">					
                        <div style="clear: both"></div>
                        <div class="controls">
                            <button type="submit" class="btn btn-info">Login</button>
                        </div>
                    </div>
                </form>
            </div><!--end login-->
        </div><!--end span9-->
        <div class="span6 register-button">
            <div class="register">
                <div class="title clearfix">
                    <h3>Pelanggan Baru</h3>
                </div><!--end titleHeader-->
                <p>Anda harus melakukan registrasi untuk mempercepat proses belanja dimasa mendatang plus mendapatkan sejumlah tawaran menarik lainnya, Anda akan ditawari opsi untuk menjadi anggota pada proses berikutnya</p>
                <?php
                $checkout = $this->uri->segment(3) == 'checkout' ? 'page/detail_data' : 'page/register_page';
                ?>
                <div class="btn-register">
                    <a href="<?php echo site_url($checkout); ?>" class="btn btn-primary">Daftar Sekarang</a>
                </div>

            </div><!--end register-->
        </div><!--end span9-->
    </div><!--end row-->

</div><!--end conatiner-->
