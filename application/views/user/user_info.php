<?php 
$profiles = $profile[0];
$nama = isset($profile) ? $profiles->nama_jelas : '';
$telp = isset($profile) ? $profiles->no_telepon : '';
$alamat = isset($profile) ? $profiles->alamat : '';
$provinsis = isset($profile) ? $profiles->provinsi : 0;
$kotas = isset($profile) ? $profiles->kota : 0;
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
                    <form action="" class="form_user" method="post" accept-charset="utf-8" id="">

                        <input type="hidden" value="2" name="idCustomer" required=""> 
                        <input type="hidden" value="5" name="idUser"> 
                        <input type="hidden" value="0" name="type_address" id="type_address" required="">

                        <div class="control-group"> 
                            <label for="nama_jelas" class="control-label">Nama Jelas </label>    
                            <div class="controls"> 
                                <input type="text" name="nama_jelas" value="<?php echo $nama ? $nama : set_value('nama_jelas'); ?>" id="nama_jelas" required=""> 
                            </div> 
                        </div><!--end control-group-->  
                        <div class="control-group"> 
                            <label for="no_telepon" class="control-label">Nomor Telepon </label>  
                            <div class="controls"> 
                                <input type="text" name="no_telepon" value="<?php echo $telp ? $telp : set_value('no_telepon'); ?>" id="no_telepon" required="">  
                            </div> 
                        </div><!--end control-group-->  
                        <div class="control-group">
                            <label for="alamat" class="control-label">Alamat </label>     
                            <div class="controls">
                                <textarea name="alamat" rows="5" id="alamat"><?php echo $alamat ? $alamat : set_value('alamat'); ?></textarea>
                            </div> 
                        </div><!--end control-group-->  
                        <div class="control-group"> 
                            <label for="provinsi" class="control-label">Provinsi </label>     
                            <div class="controls"> 
                                <?php echo form_dropdown('provinsi', $provinsi, $provinsis, 'id="provinsi"'); ?>
                            </div> 
                        </div><!--end control-group--> 
                        <div class="control-group"> 
                            <label for="kota" class="control-label">Kota </label>           
                            <div class="controls"> 
                                <?php echo form_dropdown('kota', $kota, $kotas, 'id="kota"'); ?>                 
                            </div> 
                        </div><!--end control-group--> 
                        <div class="control-group">
                            <label for="kode_pos" class="control-label">Kode Pos </label>  
                            <div class="controls"> 
                                <input type="text" name="kode_pos" value="<?php echo $kode ? $kode : set_value('kode_pos'); ?>" id="kode_pos" required="">   
                            </div> 
                        </div><!--end control-group--> 
                        <div class="control-group"> 
                            <label for="jenis_kelamin" class="control-label">Jenis Kelamin </label>      
                            <div class="controls"> 
                                <label class="radio inline">
                                    <input type="radio" name="jenis_kelamin" value="Pria" checked=""> Laki-laki</label> 
                                <label class="radio inline"><input type="radio" name="jenis_kelamin" value="Wanita"> Perempuan</label>
                            </div>
                        </div><!--end control-group-->  

                    </form>
                </div>
                <div class="tab-pane fade" id="change_password">
                    <p>Food truck fixie locavore, accusamus mcsweeney's marfa nulla single-origin coffee squid. Exercitation +1 labore velit, blog sartorial PBR leggings next level wes anderson artisan four loko farm-to-table craft beer twee. Qui photo booth letterpress, commodo enim craft beer mlkshk aliquip jean shorts ullamco ad vinyl cillum PBR. Homo nostrud organic, assumenda labore aesthetic magna delectus mollit. Keytar helvetica VHS salvia yr, vero magna velit sapiente labore stumptown. Vegan fanny pack odio cillum wes anderson 8-bit, sustainable jean shorts beard ut DIY ethical culpa terry richardson biodiesel. Art party scenester stumptown, tumblr butcher vero sint qui sapiente accusamus tattooed echo park.</p>
                </div>
            </div>
        </div><!--end span9-->

    </div>
</div><!--end featuredItems--> 
