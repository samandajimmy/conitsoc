
<link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/admin'); ?>/assets/uniform/css/uniform.default.css" />

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
        <!-- BEGIN ADVANCED TABLE widget-->
        <div class="row-fluid">
            <div class="span12">
                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Artikel List</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                            <a href="javascript:;" class="icon-remove"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" action="<?php echo $action ?>" id="form2">
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Judul Artikel</th>
                                        <th>Deskripsi Artikels</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($artikel)) {
                                        foreach ($artikel as $row) {
                                            ?>
                                            <tr>
                                                <td class="center"><input type="checkbox" name="check[]" value="<?php echo $row->id; ?>" class="checkboxes" /></td>
                                                <td><?php echo $row->judul; ?></td>
                                                <td><?php echo $row->deskripsi; ?></td>
                                                <td><img src="<?php echo base_url('artikel/thumbnail/' . $row->gambar); ?>" class="img-rounded" /></td>
                                                <td class="center">
                                                    <a href="#"><i class="icon-trash" title="Hapus Artikel" data-val="<?php echo $row->id; ?>" name="artikel"></i></a>
                                                    <a href="<?php echo site_url('artikel/edit/' . $row->id); ?>"><i class="icon-edit" title="" data-val=""></i></a>
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

        <!-- END ADVANCED TABLE widget-->
    </div>
    <!-- END PAGE CONTAINER-->
</div>
<!-- END PAGE -->

<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/uniform/jquery.uniform.min.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/data-tables/jquery.dataTables.js"></script>
<script type="text/javascript" src="<?php echo base_url('assets/admin'); ?>/assets/data-tables/DT_bootstrap.js"></script>


<!--common script for all pages-->
<script src="<?php echo base_url('assets/admin'); ?>/js/common-scripts.js"></script>

<!--script for this page only-->
<script src="<?php echo base_url('assets/admin'); ?>/js/dynamic-table.js"></script>

<!-- END JAVASCRIPTS -->