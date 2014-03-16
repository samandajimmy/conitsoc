
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

                <?php
                $search = array(
                    '2' => '- Pilih Satu -',
                    '1' => 'Hot',
                    '0' => 'Not Hot',
                );
                ?>

                <form class="form-horizontal" method="POST" action="<?php echo current_url(); ?>" id="form" enctype="multipart/form-data" >
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>Merk</th>
                                <th>Harga</th>
                                <th>Hot</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <input type="text" name="nama" placeholder="Nama Produk" />
                                </th>
                                <th>
                                    <input type="text" name="kategori" placeholder="Kategori" />
                                </th>
                                <th><input type="text" name="merk" placeholder="Merk"/></th>
                                <th>
                                    <input type="number" min="0" name="range[from]" placeholder="From"/>
                                    <input type="number" min="0" name="range[to]" placeholder="To"/>
                                </th>
                                <th>
                                    <?php echo form_dropdown('id_hot', $search, '2', 'id="id_hot"'); ?>
                                </th>
                                <th><input type="submit" value="Filter" /></th>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <!-- BEGIN EXAMPLE TABLE widget-->
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Product List</h4>
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
                                        <th>Nama Produk</th>
                                        <th>Kategori</th>
                                        <th>Merk</th>
                                        <th>Deskripsi Produk</th>
                                        <th>Harga</th>
                                        <th>Discount</th>
                                        <th>Harga Setelah Discount</th>
                                        <th>Gambar Produk</th>
                                        <th>Best Seller</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($produk)) {
                                        foreach ($produk as $rowProduk) {
                                            ?>
                                            <tr>
                                                <td class="center"><input type="checkbox" name="check[]" value="<?php echo $rowProduk->id; ?>" class="checkboxes" /></td>
                                                <td><?php echo $rowProduk->namaProduk; ?></td>
                                                <td><?php echo $rowProduk->namaKategori; ?></td>
                                                <td><?php echo $rowProduk->namaMerk; ?></td>
                                                <td><?php echo $rowProduk->deskripsiProduk; ?></td>
                                                <td><?php echo 'Rp.' . number_format($rowProduk->hargaProduk, 0, ',', '.'); ?></td>
                                                <td><?php echo number_format($rowProduk->discountProduk, 0, ',', '.') . '%'; ?></td>
                                                <td><?php echo 'Rp.' . number_format($rowProduk->stlhDiscount, 0, ',', '.'); ?></td>
                                                <td><img src="<?php echo base_url('produk/thumbnail/' . $rowProduk->gambarProduk); ?>" class="img-rounded" /></td>												
                                                <td>													
                                                    <input type="checkbox" name="produk" class="check_best_seller" data-set="sample_1 .check_best_seller"  data-val="<?php echo $rowProduk->id; ?>" <?php if ($rowProduk->isBest_seller == 1) echo 'checked="checked"'; ?>/>
                                                </td>
                                                <td class="center">
                                                    <a href="#"><i class="icon-trash" title="Hapus Produk" data-val="<?php echo $rowProduk->id; ?>" name="produk"></i></a>
                                                    <a href="<?php echo site_url('produk/produkEdit/' . $rowProduk->id); ?>"><i class="icon-edit" title="" data-val=""></i></a>
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