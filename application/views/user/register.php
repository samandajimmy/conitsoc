
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
<div class="body_art">
<div class="container padop" style="background:white;">

    <div class="row-fluid">

        <div class="span8 register-wrap">
            <div class="register">

                <div class="titleHeader clearfix">
                    <h3>Become A Member</h3>
                </div><!--end titleHeader-->
                <div class="registerdesc">
                    <p>Bisa kami menyita 2 menit waktu anda untuk melengkapi form di bawah?<br />
                        setelah itu anda dapet kembali berbelanja dan menikmati beberapa keuntungan khusus. </p>
                </div>
                <?php echo form_open(site_url('page/register'), 'class="form-horizontal" id ="register"'); ?>
                <?php if (validation_errors()) : ?>
                    <div class="error-top"><img width="15px" height="15px;" src="<?php echo base_url('assets/user/img/ximg.jpg'); ?>" /><span>Data yang Anda Masukan Tidak Sesuai</span></div>
                <?php endif; ?>

                <div class="error-top" style="display: none;"><img width="15px" height="15px;" src="http://localhost/conitsoc/assets/user/img/ximg.jpg"><span></span></div>
                <div class="control-group">
                    <?php echo form_label('Email&nbsp;<span class="required">*</span>', $email['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($email);
                        if (form_error($email['name'])) {
                            ?>
                            <error_box><label class="error">
                                    <?php
                                    echo form_error($email['name']);
                                    ?>									
                                </label></error_box>
                            <?php
                        }
                        ?>

                    </div>
                </div><!--end control-group-->

                <div class="control-group">
                    <?php echo form_label('Password&nbsp;<span class="required">*</span>', $password['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($password);
                        if (form_error($password['name'])) {
                            ?>
                            <error_box><label class="error">
                                    <?php
                                    echo form_error($password['name']);
                                    ?>
                                </label></error_box>
                            <?php
                        }
                        ?>
                    </div>
                </div><!--end control-group--> 

                <div class="control-group">
                    <?php echo form_label('Ulangi Password&nbsp;<span class="required">*</span>', $conf_pass['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($conf_pass);
                        if (form_error($conf_pass['name'])) {
                            ?>
                            <error_box><label class="error">
                                    <?php
                                    echo form_error($conf_pass['name']);
                                    ?>
                                </label></error_box>
                            <?php
                        }
                        ?>
                    </div>
                </div><!--end control-group--> 

                <div class="control-group">
                    <?php echo form_label('Nama Lengkap&nbsp;<span class="required">*</span>', $nama_jelas['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($nama_jelas);
                        if (form_error($nama_jelas['name'])) {
                            ?>
                            <error_box><label class="error">
                                    <?php
                                    echo form_error($nama_jelas['name']);
                                    ?>
                                </label></error_box>
                            <?php
                        }
                        ?>
                    </div>
                </div><!--end control-group--> 

                <div class="control-group">
                    <?php echo form_label('No Handphone&nbsp;<span class="required">*</span>', $no_telp['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($no_telp);
                        if (form_error($no_telp['name'])) {
                            ?>
                            <error_box><label class="error">
                                    <?php
                                    echo form_error($no_telp['name']);
                                    ?>
                                </label></error_box>
                            <?php
                        }
                        ?>
                    </div>
                </div><!--end control-group--> 

                <div class="control-group">
                    <label class="control-label" for="jenis_kelamin">Jenis Kelamin<span class="required">*</span></label>
                    <div class="controls">
                        <?php
                        echo form_dropdown('jenis_kelamin', $jenis_kelamin, '', 'class="span12" id="jenis_kelamin"');
                        ?>
                    </div>
                </div><!--end control-group--> 

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input name="term" type="checkbox"> I'v read and agreed on <a href="#">Terms &amp; Conditions</a>
                        </label>
                        <?php
                        if (form_error('term')) {
                            ?>
                            <error_box><label class="error">
                                    <?php
                                    echo form_error('term');
                                    ?>
                                </label></error_box>
                            <?php
                        }
                        ?>
                        <div style="clear: both"></div>
                        <div class="btn-register">
                            <button type="submit" class="btn btn-info">Daftar Sekarang</button>
                        </div>
                    </div>
                </div><!--end control-group-->


                <?php echo form_close(); ?><!--end form-->

            </div><!--end register-->
        </div><!--end span9-->

        <div class="span4">
            <div class="whybecome">
                <div class="titlewhy"><h3>WHY BECOME A MEMBER?</h3></div>
                <div class="contentwhy">
                    <ul>
                        <li>
                            <p>Bebas repot karena anda tidak perlu mengisi informasi 
                                pengiriman atau tagihan tiap kali anda 
                                berbelanja.</p>
                        </li>
                        <li>
                            <p>
                                Jaminan bahwa anda selalu menjadi yang pertama 
                                menerima informasi mengenai program promo conitso.com
                            </p>
                        </li>
                        <li>
                            <p>
                                Menikmati promo-promo seru khusus member, mulai dari 
                                potongan belanja hingga hadiah langsung.
                            </p>
                        </li>
                    </ul>
                </div>
            </div>
            <div style="clear: both;"></div>
        </div>



    </div><!--end row-->

</div><!--end conatiner-->

</div>