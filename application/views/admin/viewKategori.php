
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
                        <h4><i class="icon-reorder"></i> Category List</h4>
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
                                        <th>Nama Kategori</th>
                                        <th>Merk</th>
                                        <th>Spesifikasi</th>
										<th>Index</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($kategori)) {
                                        foreach ($kategori as $rowKategori) {
                                            ?>
                                            <tr>
                                                <td><input type="checkbox" name="check[]" class="checkboxes" value="1" /></td>
                                                <td><?php echo $rowKategori->namaKategori; ?></td>
                                                <td>
                                                    <?php
                                                    $merk = $this->merkModel->getMerkByKategori($rowKategori->id);
                                                    if (isset($merk)) {
                                                        foreach ($merk as $rowMerk) {
                                                            echo '<p>' . $rowMerk->namaMerk . '</p>';
                                                        }
                                                    }
                                                    ?>
                                                </td>
                                                <td>
                                                    <?php
                                                    $spesifikasi = $this->spesifikasiModel->getSpekByKategori($rowKategori->id);
                                                    if (isset($spesifikasi)) {
                                                        foreach ($spesifikasi as $rowSpek) {
                                                            echo '<p>' . $rowSpek->namaSpesifikasi . '</p>';
                                                        }
                                                    }
                                                    ?>
                                                    <a href="<?php echo site_url('kategori/kategoriEdit/' . $rowKategori->id . '/addSpek'); ?>">add spesifikasi</a>
                                                </td>
												<td>
													<p class="no-urut" id="no-urut<?php echo $rowKategori->id ?>">
													<?php echo $rowKategori->idx; ?><a href="#" class="urutan" id="<?php echo $rowKategori->id; ?>" style="float:right"><i class="icon-edit"></i></a>
													</p>
													<div id="form-urut-field-<?php echo $rowKategori->id; ?>"></div>
												</td>
                                                <td class="center">
                                                    <a href="#"><i class="icon-trash" title="Hapus Kategori" data-val="<?php echo $rowKategori->id; ?>" name="kategori"></i></a>
                                                    <a href="<?php echo site_url('kategori/kategoriEdit/' . $rowKategori->id); ?>"><i class="icon-edit" title="" data-val=""></i></a>
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