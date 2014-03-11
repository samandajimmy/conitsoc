
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
                <!-- BEGIN SAMPLE FORMPORTLET-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Merk Form </h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="POST" action="<?php echo $action; ?>" id="form">
                            <?php
                            if (isset($merk)) {
                                echo '<input type="hidden" name="idMerk" value="' . $merk[0]->id . '" />';
                            }
                            ?>
                            <fieldset>
                                <legend>Input Merk</legend>
                                <div class="control-group">
                                    <label class="control-label">Nama Merk</label>
                                    <div class="controls">
                                        <input type="text" name="namaMerk" placeholder="Nama Merk" <?php if (isset($merk))
                                echo 'value="' . $merk[0]->namaMerk . '"'; ?> required />
                                    </div>
                                </div>

                                <div class="control-group">
                                    <label class="control-label">Kategori</label>
                                    <div class="controls">
                                        <?php
                                        $kategoriIDX = 0;
                                        if (isset($kategoriMerk)) {
                                            $kategoriIDX = $kategoriMerk;
                                        }
                                        echo form_dropdown('idKategori[]', $kategori, $kategoriIDX, 'data-placeholder="Pilih kategori" class="chzn-select span6" multiple="multiple" tabindex="6" required');
                                        ?>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form>
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->
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