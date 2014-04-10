
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
                <a href="<?php echo site_url('merk/merkInput'); ?>" class="btn btn-large" type="button"><i class="icon-plus"></i> Tambah Merk</a>
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Merk List</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <!-- BEGIN FORM-->
                        <form method="POST" action="<?php echo $action ?>" id="form2">
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Nama Merk</th>
                                        <th>Kategori</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($merk)) {
                                        foreach ($merk as $rowMerk) {
                                            ?>
                                            <tr>
                                                <td class="center"><input type="checkbox" name="check[]" value="<?php echo $rowMerk->id; ?>" class="checkboxes" /></td>
                                                <td><?php echo $rowMerk->namaMerk; ?></td>
                                                <td>
                                                    <p>
                                                        <?php
                                                        $kattext = '';
                                                        $kategori = $this->merkModel->getKategoriByMerk($rowMerk->id);
                                                        if (isset($kategori)) {
                                                            foreach ($kategori as $rowKategori) {
                                                                $kattext .= $rowKategori->namaKategori . ', ';
                                                            }
                                                            echo substr($kattext, 0, strrpos($kattext, ', '));
                                                        }
                                                        ?>
                                                    </p>
                                                </td>
                                                <td class="center">
                                                    <a href="#"><i class="icon-trash" title="Hapus Merk" data-val="<?php echo $rowMerk->id; ?>" name="merk"></i></a>
                                                    <a href="<?php echo site_url('merk/merkEdit/' . $rowMerk->id); ?>"><i class="icon-edit" title="" data-val=""></i></a>
                                                </td>
                                            </tr>
                                            <?php
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </form>
                        <!-- END FORM-->
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