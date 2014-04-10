
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
                        <h4><i class="icon-reorder"></i> Product Form </h4>
                        <span class="tools">
                            <a href="javascript:;" class="icon-chevron-down"></a>
                        </span>
                    </div>
                    <div class="widget-body">
                        <!-- BEGIN FORM-->
                        <form class="form-horizontal" method="POST" action="<?php echo $action ? $action : ''; ?>" id="form_produk" enctype="multipart/form-data" >
                            <?php
                            if (isset($produk)) {
                                $produks = $produk[0] ? $produk[0] : '';
                                $gambar_detail = $this->produkModel->get_gambar_detail($produks->id);
                                echo '<input type="hidden" name="idProduk" value="' . $produks->id . '" />';
                            }
                            ?>
                            <fieldset>
                                <div class="span6">
                                    <legend>Input Produk</legend>                    
                                    <div class="control-group">
                                        <label class="control-label" for="namaProduk">Nama Produk</label>
                                        <div class="controls">
                                            <input type="text" name="namaProduk" class="span11" placeholder="Nama Produk" id="namaProduk" required <?php
                                            if (isset($produk))
                                                echo 'value="' . $produks->namaProduk . '"';
                                            ?> />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="kategori">Kategori</label>
                                        <div class="controls">
                                            <?php
                                            if (isset($produk)) {
                                                echo form_dropdown('idKategori', $kategoriDrop, $produks->idKategori, 'id="kategori" class="span11" required');
                                            } else {
                                                echo form_dropdown('idKategori', $kategoriDrop, 0, 'id="kategori" class="span11" required');
                                            }
                                            ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="merk">Merk</label>
                                        <div class="controls">
                                            <?php
                                            if (isset($produk)) {
                                                echo form_dropdown('idMerk', $merkDrop, $produks->idMerk, 'id="merk" class="span11"');
                                            } else {
                                                echo form_dropdown('idMerk', $merkDrop, 0, 'id="merk" class="span11" disabled');
                                            }
                                            ?>
                                        </div>
                                    </div>                    
                                    <div class="control-group">
                                        <label class="control-label" for="hargaProduk">Harga</label>
                                        <div class="controls">
                                            <input type="number" min="1" name="hargaProduk" class="span11" placeholder="Harga Produk" id="hargaProduk" <?php
                                            if (isset($produk))
                                                echo 'value="' . $produks->hargaProduk . '"';
                                            ?> required />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="berat">Berat</label>
                                        <div class="controls">
                                            <input type="number" min="1" name="berat" class="span11" placeholder="Berat Produk" id="berat" <?php
                                            if (isset($produk))
                                                echo 'value="' . $produks->berat . '"';
                                            ?> required />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="jml_stok">Jumlah Stok</label>
                                        <div class="controls">
                                            <input type="number" min="1" name="jml_stok" class="span11" placeholder="Jumlah Stok" id="jml_stok" <?php
                                            if (isset($produk))
                                                echo 'value="' . $produks->jml_stok . '"';
                                            ?> required />
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label" for="deskripsiProduk">Deskripsi Produk</label>
                                        <div class="controls">
                                            <textarea name="deskripsiProduk" id="deskripsiProduk" rows="6" class="span11" required><?php
                                                if (isset($produk))
                                                    echo $produks->deskripsiProduk;
                                                ?></textarea>
                                        </div>
                                    </div>
                                    <?php
                                    if (isset($produk) && $produks->discountProduk > 0) {
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label" for="checkDiscount" style="padding-top: 0px">Discount</label>
                                            <div class="controls">
                                                <input type="checkbox" id="checkDiscount" checked="checked" />
                                            </div>
                                        </div>
                                        <div id="fieldDiscount">
                                            <div class="control-group">
                                                <label class="control-label" for="discountProduk">Jumlah Discount</label>
                                                <div class="controls">
                                                    <input type="number" class="span11" min="1" name="discountProduk" placeholder="Jumlah Discount" id="jumlahDiscount" value="<?php echo $produks->discountProduk ?>" required />
                                                    <span class="add-on">%</span>
                                                    <span class="help-block" id="hitungDiscount">Hitung harga discount.</span>
                                                </div>
                                            </div>
                                            <div class="control-group">
                                                <label class="control-label" for="stlhDiscount">Harga Setelah Discount</label>
                                                <div class="controls">
                                                    <input type="number" class="span11" min="1" name="stlhDiscount" placeholder="Harga Setelah Discount" id="hargaAfter" value="<?php echo $produks->stlhDiscount ?>" required />
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="control-group">
                                            <label class="control-label" for="checkDiscount" style="padding-top: 0px">Discount</label>
                                            <div class="controls">
                                                <input type="checkbox" id="checkDiscount" />
                                            </div>
                                        </div>
                                        <div id="fieldDiscount"></div>
                                        <?php
                                    }
                                    ?>
                                    <div class="control-group">
                                        <label class="control-label">Gambar Produk</label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" name="gambarProduk" />
                                                <div class="input-append">
                                                    <div class="uneditable-input span3">
                                                        <i class="icon-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-file">
                                                        <span class="fileupload-new">Select file</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file" name="content" class="default gambar_produk"/>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php echo isset($produks->gambarProduk) ? '<div><img src="' . base_url('produk/thumbnail/' . $produks->gambarProduk) . '" /></div>' : ''; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Detail Gambar 1</label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" name="detail_gambar[]" />
                                                <div class="input-append">
                                                    <div class="uneditable-input span3">
                                                        <i class="icon-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-file detail_gambar" <?php echo isset($gambar_detail[0]->id) ? 'id="' . $gambar_detail[0]->id . '"' : ''; ?>>
                                                        <span class="fileupload-new">Select file</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file" name="detail_content[]" class="default gambar_produk"/>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php echo isset($gambar_detail[0]->detail_gambar) ? '<div><img src="' . base_url('produk/detail/thumbnail/' . $gambar_detail[0]->detail_gambar) . '" /></div>' : ''; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Detail Gambar 2</label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" name="detail_gambar[]" />
                                                <div class="input-append">
                                                    <div class="uneditable-input span3">
                                                        <i class="icon-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-file detail_gambar" <?php echo isset($gambar_detail[1]->id) ? 'id="' . $gambar_detail[1]->id . '"' : ''; ?>>
                                                        <span class="fileupload-new">Select file</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file" name="detail_content[]" class="default gambar_produk"/>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php echo isset($gambar_detail[1]->detail_gambar) ? '<div><img src="' . base_url('produk/detail/thumbnail/' . $gambar_detail[1]->detail_gambar) . '" /></div>' : ''; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <label class="control-label">Detail Gambar 3</label>
                                        <div class="controls">
                                            <div data-provides="fileupload" class="fileupload fileupload-new"><input type="hidden" name="detail_gambar[]" />
                                                <div class="input-append">
                                                    <div class="uneditable-input span3">
                                                        <i class="icon-file fileupload-exists"></i>
                                                        <span class="fileupload-preview"></span>
                                                    </div>
                                                    <span class="btn btn-file detail_gambar" <?php echo isset($gambar_detail[2]->id) ? 'id="' . $gambar_detail[2]->id . '"' : ''; ?>>
                                                        <span class="fileupload-new">Select file</span>
                                                        <span class="fileupload-exists">Change</span>
                                                        <input type="file" name="detail_content[]" class="default gambar_produk"/>
                                                    </span>
                                                </div>
                                            </div>
                                            <?php echo isset($gambar_detail[2]->detail_gambar) ? '<div><img src="' . base_url('produk/detail/thumbnail/' . $gambar_detail[2]->detail_gambar) . '" /></div>' : ''; ?>
                                        </div>
                                    </div>
                                    <div class="control-group">
                                        <div class="controls">
                                            <button type="submit" class="btn">Save</button>
                                        </div>
                                    </div>
                                </div>

                                <div class="span6">

                                    <div id="spek">
                                        <?php
                                        if (isset($produk)) {
                                            $isiSpek = $this->produkModel->getIsiSpesifikasi($produks->idKategori);
                                            echo '<legend>Spesifikasi Produk</legend>';
                                            foreach ($isiSpek as $row) {
                                                $spek = $this->produkModel->get_isi_spesifikasi($row->idSpesifikasi, $produks->id);
                                                $speks = isset($spek) ? $spek : FALSE;
                                                ?>
                                                <div class="control-group">
                                                    <label class="control-label"><?php echo $row->namaSpesifikasi ?></label>
                                                    <div class="controls">
                                                        <input type="hidden" name="idProdukSpesifikasi[]" value="<?php echo $speks ? $speks[0]->id : ''; ?>" />
                                                        <input type="hidden" name="idSpesifikasi[]" value="<?php echo $speks ? $speks[0]->idSpesifikasi : ''; ?>" />
                                                        <input type="text" class="span11" name="isiSpesifikasi[]" placeholder="Detail Spesifikasi" class="spek" value="<?php echo $speks ? $speks[0]->isiSpesifikasi : ''; ?>" />
                                                    </div>
                                                </div>
                                                <?php
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                            </fieldset>
                        </form> 
                        <!-- END FORM-->
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