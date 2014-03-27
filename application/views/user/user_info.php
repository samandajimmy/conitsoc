<?php
$profiles = $profile[0];
$nama = isset($profile) ? $profiles->nama_jelas : '';
$telp = isset($profile) ? $profiles->no_telepon : '';
$alamat = isset($profile) ? $profiles->alamat : '';
$provinsis = isset($profile) ? $profiles->provinsi : 0;
$provinsiss = $provinsis ? $provinsis : set_value('provinsi');
$kotas = isset($profile) ? $profiles->kota : 0;
$kotass = $kotas ? $kotas : set_value('kota');
$kode = isset($profile) ? $profiles->kode_pos : '';
$jenis_kelamin = isset($profile) ? $profiles->jenis_kelamin : '';
?>
<div class="container">

    <div class="row">
        <aside class="span3">

            <div class="user_info">
                <div class="header">
                    <h3>Personal Details</h3>
                </div><!--end titleHeader-->
                <ul class="unstyled">
                    <li><a class="invarseColor" href="#"><i class="icon-info-sign"></i>&nbsp;&nbsp;Purchase History</a></li>
                    <li><a class="invarseColor" href="#"><i class="icon-user"></i>&nbsp;&nbsp;Account Detail</a></li>
                </ul>
            </div><!--end categories-->
        </aside>


        <div class="span9">
            <ul id="user_tab" class="nav nav-tabs">
                <li class="active"><a href="#account_information" data-toggle="tab">Account Information</a></li>
                <li class=""><a href="#change_password" data-toggle="tab">Change Password</a></li>
            </ul>
            <div id="user_tabContent" class="tab-content">
                <div class="tab-pane fade active in" id="account_information">
                    <form action="<?php echo current_url(); ?>" class="form_user" method="post" accept-charset="utf-8" id="form_info">

                        <input type="hidden" value="2" name="idCustomer" required=""> 
                        <input type="hidden" value="5" name="idUser"> 
                        <input type="hidden" value="0" name="type_address" id="type_address" required="">

                        <?php $error_class = form_error('nama_jelas') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="nama_jelas" class="control-label">Nama Jelas </label>    
                            <div class="controls"> 
                                <input type="text" name="nama_jelas" value="<?php echo set_value('nama_jelas') ? set_value('nama_jelas') : $nama; ?>" id="nama_jelas"> 
                                <?php echo form_error('nama_jelas'); ?>
                            </div> 
                        </div><!--end control-group-->  
                        <?php $error_class = form_error('no_telepon') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="no_telepon" class="control-label">Nomor Telepon </label>  
                            <div class="controls"> 
                                <input type="text" name="no_telepon" value="<?php echo set_value('no_telepon') ? set_value('no_telepon') : $telp; ?>" id="no_telepon">  
                                <?php echo form_error('no_telepon'); ?>
                            </div> 
                        </div><!--end control-group-->  
                        <?php $error_class = form_error('alamat') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="alamat" class="control-label">Alamat </label>     
                            <div class="controls">
                                <textarea name="alamat" rows="5" id="alamat"><?php echo set_value('alamat') ? set_value('alamat') : $alamat; ?></textarea>
                                <?php echo form_error('alamat'); ?>
                            </div> 
                        </div><!--end control-group-->  
                        <?php $error_class = form_error('provinsi') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="provinsi" class="control-label">Provinsi </label>     
                            <div class="controls"> 
                                <?php echo form_dropdown('provinsi', $provinsi, $provinsiss, 'id="provinsi"'); ?>
                                <?php echo form_error('provinsi'); ?>
                            </div> 
                        </div><!--end control-group--> 
                        <?php $error_class = form_error('kota') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="kota" class="control-label">Kota </label>           
                            <div class="controls"> 
                                <?php echo form_dropdown('kota', $kota, $kotass, 'id="kota"'); ?> 
                                <?php echo form_error('kota'); ?>
                            </div> 
                        </div><!--end control-group--> 
                        <?php $error_class = form_error('kode_pos') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="kode_pos" class="control-label">Kode Pos </label>  
                            <div class="controls"> 
                                <input type="text" name="kode_pos" value="<?php echo set_value('kode_pos') ? set_value('kode_pos') : $kode; ?>" id="kode_pos">   
                                <?php echo form_error('kode_pos'); ?>
                            </div> 
                        </div><!--end control-group--> 
                        <?php $error_class = form_error('jenis_kelamin') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="jenis_kelamin" class="control-label">Jenis Kelamin </label>      
                            <div class="controls"> 
                                <label class="radio inline">
                                    <input type="radio" name="jenis_kelamin" value="Pria" <?php echo $jenis_kelamin = 'Pria' ? 'checked' : ''; ?>> Laki-laki</label> 
                                <label class="radio inline">
                                    <input type="radio" name="jenis_kelamin" value="Wanita" <?php echo $jenis_kelamin = 'Perempuan' ? 'checked' : ''; ?>> Perempuan</label>
                                <?php echo form_error('jenis_kelamin'); ?>
                            </div>
                        </div><!--end control-group-->  

                        <div class="control-group">   
                            <div class="controls"> 
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </div><!--end control-group-->  

                    </form>
                </div>
                <div class="tab-pane fade" id="change_password">
                    
                    <form action="<?php echo current_url(); ?>" class="form_user" method="post" accept-charset="utf-8" id="form_info">
                        <?php $error_class = form_error('nama_jelas') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="password" class="control-label">Current Password </label>    
                            <div class="controls"> 
                                <input type="password" name="password" value="<?php echo set_value('password') ? set_value('password') : ''; ?>" id="password"> 
                                <?php echo form_error('password'); ?>
                            </div> 
                        </div><!--end control-group-->  
                        <?php $error_class = form_error('no_telepon') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="new" class="control-label">New</label>  
                            <div class="controls"> 
                                <input type="password" name="new" value="<?php echo set_value('new') ? set_value('new') : ''; ?>" id="new">  
                                <?php echo form_error('new'); ?>
                            </div> 
                        </div><!--end control-group-->  
                        <?php $error_class = form_error('alamat') ? 'error' : ''; ?>
                        <div class="control-group <?php echo $error_class; ?>">
                            <label for="confirm" class="control-label">Confirm Password </label>     
                            <div class="controls">
                                <input type="password" name="confirm" value="<?php echo set_value('confirm') ? set_value('confirm') : ''; ?>" id="confirm">  
                                <?php echo form_error('confirm'); ?>
                            </div> 
                        </div><!--end control-group-->  
                        <?php $error_class = form_error('provinsi') ? 'error' : ''; ?> 

                        <div class="control-group">   
                            <div class="controls"> 
                                <input type="submit" class="btn btn-info" value="Save">
                            </div>
                        </div><!--end control-group-->  

                    </form>
                </div>
            </div>
        </div><!--end span9-->

    </div>
</div><!--end featuredItems--> 
