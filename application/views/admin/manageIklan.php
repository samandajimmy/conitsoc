
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
                        <h4><i class="icon-reorder"></i> Iklan Form </h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="POST" action="<?php echo $action; ?>" id="form" enctype="multipart/form-data" >
                            <?php
                            if (isset($iklan_detail)) {
                                echo '<input type="hidden" name="idIklan" value="' . $iklan_detail[0]->id . '" />';
                            }
                            ?>
                            <fieldset>
                                <div class="control-group">
                                    <label class="control-label">Gambar Iklan</label>
                                    <div class="controls">
                                        <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" name="gambarIklan" />
                                            <div class="input-append">
                                                <div class="uneditable-input span6">
                                                    <i class="icon-file fileupload-exists"></i>
                                                    <span class="fileupload-preview"></span>
                                                </div>
                                                <span class="btn btn-file">
                                                    <span class="fileupload-new">Select file</span>
                                                    <span class="fileupload-exists">Change</span>
                                                    <input type="file" name="content" class="default" />
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="control-group">
                                    <div class="controls">
                                        <button type="submit" class="btn">Save</button>
                                    </div>
                                </div>
                            </fieldset>
                        </form> 
                        <!-- END FORM-->
                    </div>
                </div>
                <!-- END SAMPLE FORM PORTLET-->


                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Iklan List</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" action="<?php echo $action1 ?>" id="form2">
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Gambar</th>
                                        <th>Activate</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($iklan)) {
                                        foreach ($iklan as $row) {
                                            ?>
                                            <tr>
                                                <td class="center"><input type="checkbox" name="check[]" value="<?php echo $row->id; ?>" class="checkboxes" /></td>
                                                <td><img src="<?php echo base_url('banner/iklan/' . $row->gambarIklan); ?>" class="img-rounded" /></td>												
                                                <td>													
                                                    <input type="checkbox" name="iklan" class="check_iklan" data-val="<?php echo $row->id; ?>" <?php if ($row->isActive == 1) echo 'checked="checked"'; ?>/>
                                                </td>
                                                <td class="center">
                                                    <a class="icon-trash1"><i class="icon-trash" title="Hapus iklan" data-val="<?php echo $row->id; ?>" name="iklan"></i></a>
                                                    <a href="<?php echo site_url('banner/iklan_edit/' . $row->id) ?>"><i class="icon-edit" title="Edit Iklan" data-val=""></i></a>
                                                </td>
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