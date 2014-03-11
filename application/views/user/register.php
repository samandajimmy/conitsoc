
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

        <div class="span9">
            <div class="register">

                <div class="titleHeader clearfix">
                    <h3>Become A Member</h3>
                </div><!--end titleHeader-->

                <?php echo form_open($this->uri->uri_string(), 'class="form-horizontal"'); ?>

                <legend>&nbsp;&nbsp;&nbsp;&nbsp;1. Personal Informations</legend>

                <div class="control-group">
                    <?php echo form_label('Email ', $email['id'], array('class' => 'control-label')); ?>
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
                    <?php echo form_label('Password ', $password['id'], array('class' => 'control-label')); ?>
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
                    <?php echo form_label('Ulangi Password ', $conf_pass['id'], array('class' => 'control-label')); ?>
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
                    <?php echo form_label('Username ', $username['id'], array('class' => 'control-label')); ?>
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
                
                <hr>

                <div class="control-group">
                    <div class="controls">
                        <label class="checkbox">
                            <input name="term" type="checkbox"> I'v read and agreed on <a href="#">Terms &amp; Condations</a>
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
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div><!--end control-group-->


                <?php echo form_close(); ?><!--end form-->

            </div><!--end register-->
        </div><!--end span9-->



    </div><!--end row-->

</div><!--end conatiner-->
