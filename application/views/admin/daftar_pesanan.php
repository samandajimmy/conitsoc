
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

                <form class="form-horizontal" method="POST" action="<?php echo current_url(); ?>" id="form" enctype="multipart/form-data" >
                    <table class="table table-striped table-bordered table-advance table-hover">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Status</th>
                                <th>Konfirmasi</th>
                                <th>Email</th>
                                <th>Tanggal</th>
                                <th>Biaya</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th>
                                    <input type="text" name="ID" placeholder="ID Pemasanan" class="span12" />
                                </th>
                                <th>
                                    <?php echo form_dropdown('status', $status, 0); ?>
                                </th>
                                <th>
                                    <select name="konfirmasi">
                                        <option value="">Pilih satu</option>
                                        <option value="0">Belum dikonfirmasi</option>
                                        <option value="1">Telah dikonfirmasi</option>
                                    </select>
                                </th>
                                <th><input type="text" name="email" placeholder="Email Customer" class="span12"/></th>
                                <th>
                                    <input type="date" name="date[from]" placeholder="From" class="span12"/>
                                    <input type="date" name="date[to]" placeholder="To" class="span12"/>
                                </th>
                                <th>
                                    <input type="text" name="range[from]" placeholder="From" class="span12"/>
                                    <input type="text" name="range[to]" placeholder="To" class="span12"/>
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
                        <form method="POST" action="<?php //echo $action       ?>" id="form2">
                            <table class="table table-striped table-bordered" id="sample_2">
                                <thead>
                                    <tr>
                                        <th style="width:8px;"><input type="checkbox" class="group-checkable" data-set="#sample_2 .checkboxes1" /></th>
                                        <th>ID Pemesanan</th>
                                        <th>Status Pemesanan</th>
                                        <th>Status Konfirmasi</th>
                                        <th>Email</th>
                                        <th>Tanggal Pemesanan</th>
                                        <th>Total Biaya</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (isset($pesanan)) {
                                        foreach ($pesanan as $row) {
                                            if ($row->is_confirm == 0) {
                                                $confirm = 'Belum dikonfirmasi';
                                            } else {
                                                $confirm = 'Telah dikonfirmasi';
                                            }
                                            ?>
                                            <tr>
                                                <td class="center"><input type="checkbox" name="check[]" value="<?php echo $row->id; ?>" class="checkboxes1" /></td>
                                                <td><?php echo $row->noPemesanan; ?></td>
                                                <td><?php echo $row->namaStatus; ?></td>
                                                <td><?php echo $confirm; ?></td>
                                                <td><?php echo $row->email; ?></td>
                                                <td><?php echo $row->tglPemesanan; ?></td>
                                                <td><?php echo 'Rp.' . number_format($row->biayaPemesanan, 0, ',', '.'); ?></td>
                                                <td class="center">
                                                    <a href="<?php echo site_url('pemesanan/detail/' . $row->id); ?>" class="btn btn-small"><i class="icon-eye-open"></i> View</a>
                                                    <?php
                                                    if ($this->session->userdata('tipeUser') == -1) {
                                                        echo '<a title="Delete order permanently"><i class="icon-remove-sign hapus_pemesanan" id="' . $row->id . '" style="color: red;"></i></a>';
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