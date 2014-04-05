
<?php
$email = array(
    'name' => 'email',
    'id' => 'email',
    'type' => 'email',
    'value' => set_value('email')
);

$password = array(
    'name' => 'password',
    'id' => 'password',
    'type' => 'password',
    'value' => set_value('password')
);

$conf_pass = array(
    'name' => 'conf_pass',
    'id' => 'conf_pass',
    'type' => 'password',
    'value' => set_value('conf_pass')
);

$username = array(
    'name' => 'username',
    'id' => 'username',
    'value' => set_value('username')
);
?>

<div class="container">

    <div class="row">

        <div class="span9 register-wrap">
            <div class="register">

                <div class="titleHeader clearfix">
                    <h3>Become A Member</h3>
                </div><!--end titleHeader-->
				<div class="registerdesc">
					<p>Bisa kami menyita 2 menit waktu anda untuk melengkapi form di bawah?<br />
						setelah itu anda dapet kembali berbelanja dan menikmati beberapa keuntungan khusus. </p>
				</div>
                <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>

                <!--<legend>&nbsp;&nbsp;&nbsp;&nbsp;1. Personal Informations</legend>-->

                <div class="control-group">
                    <?php echo form_label('Email&nbsp;<span class="required">*</span>', $email['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($email);
                        if (form_error($email['name'])) {
                            ?>
                            <span class="help-inline"> <i class="icon-remove"></i>
                                <?php
                                echo ' ' . form_error($email['name']);
                                ?>
                            </span>
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
                            <span class="help-inline"> <i class="icon-remove"></i>
                                <?php
                                echo ' ' . form_error($password['name']);
                                ?>
                            </span>
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
                            <span class="help-inline"> <i class="icon-remove"></i>
                                <?php
                                echo ' ' . form_error($conf_pass['name']);
                                ?>
                            </span>
                            <?php
                        }
                        ?>
                    </div>
                </div><!--end control-group--> 

                <div class="control-group">
                    <?php echo form_label('Username&nbsp;<span class="required">*</span>', $username['id'], array('class' => 'control-label')); ?>
                    <div class="controls">
                        <?php
                        echo form_input($username);
                        if (form_error($username['name'])) {
                            ?>
                            <span class="help-inline"> <i class="icon-remove"></i>
                                <?php
                                echo ' ' . form_error($username['name']);
                                ?>
                            </span>
                            <?php
                        }
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
                            <span class="help-inline"> <i class="icon-remove"></i>
                                <?php
                                echo ' ' . form_error('term');
                                ?>
                            </span>
                            <?php
                        }
                        ?>
                        <br>
                        <button type="submit" class="btn btn-info">Daftar Sekarang</button>
                    </div>
                </div><!--end control-group-->


                <?php echo form_close(); ?><!--end form-->

            </div><!--end register-->
        </div><!--end span9-->
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



    </div><!--end row-->

</div><!--end conatiner-->
