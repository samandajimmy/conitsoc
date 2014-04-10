
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
                $stock = array(
                    '2' => '- Pilih Satu -',
                    '1' => 'Stock',
                    '0' => 'Out of stock',
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
                                <th>Hot Produk</th>
                                <th>Status</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <input type="text" name="nama" class="span12" placeholder="Nama Produk" />
                                </th>
                                <th>
                                    <?php
                                    echo form_dropdown('kategori', $kategoriDrop, 0, 'id="kategori" class="span11" required');
                                    ?>
                                </th>
                                <th>
                                    <?php
                                    echo form_dropdown('merk', $merkDrop, 0, 'id="merk" class="span11" disabled');
                                    ?>
                                </th>
                                <th>
                                    <input type="number" min="1" name="range[from]" class="span12" placeholder="From"/>
                                    <input type="number" min="1" name="range[to]" class="span12" placeholder="To"/>
                                </th>
                                <th>
                                    <?php echo form_dropdown('id_hot', $search, '2', 'id="id_hot" class="span12"'); ?>
                                </th>
                                <th><?php echo form_dropdown('status', $status_drop); ?></th>
                                <th><input type="submit" value="Filter" /></th>
                            </tr>
                        </tbody>
                    </table>
                </form>

                <!-- BEGIN EXAMPLE TABLE widget-->
                <a href="<?php echo site_url('produk/produkInput'); ?>" class="btn btn-large" type="button"><i class="icon-plus"></i> Tambah Produk</a>
                <div class="widget">
                    <div class="widget-title">
                        <h4><i class="icon-reorder"></i> Product List</h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <form method="POST" action="<?php echo $action ?>" id="form2">
                            <table class="table table-striped table-bordered" id="sample_1">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_1 .checkboxes" /></th>
                                        <th>Nama</th>
                                        <th>Kategori</th>
                                        <th>Merk</th>
                                        <th>Berat</th>
                                        <th>Harga</th>
                                        <th>Disc</th>
                                        <th>Harga Disc</th>
                                        <th style="width:56px;">Gambar</th>
                                        <th style="width:60px;">Qty</th>
                                        <th>Hot</th>
                                        <th>Status</th>
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
                                                <td><?php echo $rowProduk->namaKategori ? $rowProduk->namaKategori : '[Unknown]'; ?></td>
                                                <td><?php echo $rowProduk->namaMerk ? $rowProduk->namaMerk : '[Unknown]'; ?></td>
                                                <td><?php echo $rowProduk->berat; ?></td>
                                                <td><?php echo 'Rp.' . number_format($rowProduk->hargaProduk, 0, ',', '.'); ?></td>
                                                <td><?php echo number_format($rowProduk->discountProduk, 0, ',', '.') . '%'; ?></td>
                                                <td><?php echo 'Rp.' . number_format($rowProduk->stlhDiscount, 0, ',', '.'); ?></td>
                                                <td><img src="<?php echo base_url('produk/thumbnail/' . $rowProduk->gambarProduk); ?>" class="img-rounded" /></td>										
                                                <td>																					
                                                    <input type="number" min="0" value="<?php echo $rowProduk->jml_stok; ?>" class="qty_produk span12" id="<?php echo $rowProduk->id; ?>" />
                                                </td>
                                                <td>													
                                                    <input type="checkbox" name="produk" class="check_best_seller" data-set="sample_1 .check_best_seller"  data-val="<?php echo $rowProduk->id; ?>" <?php if ($rowProduk->isBest_seller == 1) echo 'checked="checked"'; ?>/>
                                                </td>
                                                <td><?php echo form_dropdown('status', $status_drop, $rowProduk->status, 'class="span12 status_produk" data-val="' . $rowProduk->id . '"'); ?></td>

                                                <td class="center">
                                                    <a href="#"><i class="icon-trash" title="Hapus Produk" data-val="<?php echo $rowProduk->id; ?>" name="produk"></i></a>
                                                    <a href="<?php echo site_url('produk/produkEdit/' . $rowProduk->id); ?>"><i class="icon-edit" title="" data-val=""></i></a>
                                                        <?php
                                                        if ($this->session->userdata('tipeUser') == -1) {
                                                            echo '<a title="Delete product permanently"><i class="icon-remove-sign hapus_produk" id="' . $rowProduk->id . '" style="color: red;"></i></a>';
                                                        }
                                                        ?>
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