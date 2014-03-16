
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/uniform/css/uniform.default.css" />

<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/chosen-bootstrap/chosen/chosen.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/jquery-tags-input/jquery.tagsinput.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/clockface/css/clockface.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-datepicker/css/datepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-timepicker/compiled/timepicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-colorpicker/css/colorpicker.css" />
<link rel="stylesheet" href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-toggle-buttons/static/stylesheets/bootstrap-toggle-buttons.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-daterangepicker/daterangepicker.css" />


<!-- BEGIN PAGE -->
<div id="main-content">
    <!-- BEGIN PAGE CONTAINER-->
    <div class="container-fluid">
        <!-- BEGIN PAGE HEADER-->   
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <?php
                if ($notif != '') {
                    ?>
                    <div class="alert alert-info">
                        <button class="close" data-dismiss="alert">×</button>
                        <strong>Info!</strong> <?php echo $notif; ?>.
                    </div>
                    <?php
                }
                ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN PAGE CONTENT-->
        <div class="row-fluid">
            <div class="span12">
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> filter</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" action="<?php echo site_url('user/view_customer'); ?>" id="form3">
                            <table class="table table-striped table-bordered table-advance table-hover">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Nama</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th>
                                            <input type="text" name="entity_id[from]" placeholder="from" />
                                            <input type="text" name="entity_id[to]" placeholder="to"/>
                                        </th>
                                        <th>
                                            <select name="jenis_kelamin">
                                                <option value="0">- Pilih Satu -</option>
                                                <option value="Pria">Pria</option>
                                                <option value="Wanita">Wanita</option>
                                            </select>
                                        </th>
                                        <th><input type="text" name="nama" placeholder="Nama"/></th>
                                        <th>
                                            <?php echo form_dropdown('id_provinsi', $provinsi, 0, 'class="span11" id="id_provinsi"'); ?>
                                        </th>
                                        <th>
                                            <?php echo form_dropdown('id_kota', $kota, 0, 'class="span11" id="id_kota"'); ?>
                                        </th>
                                        <th><input type="submit" value="Filter" /></th>
                                    </tr>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Admin List</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" action="<?php echo $action; ?>" id="form2">
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>ID</th>
                                        <th>Title</th>
                                        <th>Nama</th>
                                        <th>Telepon</th>
                                        <th>Provinsi</th>
                                        <th>Kota</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($user)) {
                                        foreach ($user as $row) {
                                            $tipe_user = $this->userModel->get_tipe_user($row->tipeUser);
                                            ?>
                                            <tr>
                                                <td class="center"><input type="checkbox" name="check[]" value="<?php echo $row->id; ?>" class="checkboxes" /></td>
                                                <td><?php echo $row->idUser; ?></td>
                                                <td><?php echo $row->jenis_kelamin; ?></td>
                                                <td class="detail_user pointer" id="<?php echo $row->idUser; ?>" title="See Detail"><?php echo $row->nama_jelas; ?></td>
                                                <td><?php echo $row->no_telepon; ?></td>
                                                <td><?php echo $row->state_name; ?></td>
                                                <td><?php echo $row->city_name; ?></td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                    </div>
                </div>
                <!-- END EXAMPLE TABLE widget-->
            </div>
        </div>

        <!-- END PAGE CONTAINER-->
    </div>
    <!-- END PAGE -->
</div>

<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap/js/bootstrap-fileupload.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/jquery.blockui.js"></script>
<!-- ie8 fixes -->
<!--[if lt IE 9]>
<script src="js/excanvas.js"></script>
<script src="js/respond.js"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-toggle-buttons/static/js/jquery.toggle.buttons.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/chosen-bootstrap/chosen/chosen.jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/data-tables/DT_bootstrap.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-wysihtml5/wysihtml5-0.3.0.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-wysihtml5/bootstrap-wysihtml5.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/clockface/js/clockface.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/jquery-tags-input/jquery.tagsinput.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-daterangepicker/date.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-daterangepicker/daterangepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-colorpicker/js/bootstrap-colorpicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-timepicker/js/bootstrap-timepicker.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/bootstrap-inputmask/bootstrap-inputmask.min.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/assets/fancybox/source/jquery.fancybox.pack.js"></script>


<!--script for this page-->
<script src="<?php echo base_url('assets/admin'); ?>/js/form-component.js"></script>
<!--common script for all pages-->
<script src="<?php echo base_url('assets/admin'); ?>/js/common-scripts.js"></script>
<script src="<?php echo base_url('assets/admin'); ?>/js/dynamic-table.js"></script>