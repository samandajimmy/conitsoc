<div class="container">
    <div class="row-fluid">
        <div class="span8">
            <div class="product-name">
                Project Form
            </div><!--end titleHeader-->
        </div>
    </div>
</div>

<div class="body_art">
    <div class="container padop" style="padding-bottom: 30px;">

        <div class="row-fluid">

            <div class="span8">
                <div class="pembayaran project-form">
                    <form method="POST" action="<?php echo current_url(); ?>" class="form-horizontal" id="posting_project" enctype="multipart/form-data">
                        <div class="error-top" style="display: none;"><img width="15px" height="15px;" src="<?php echo base_url('assets/user/img/ximg.jpg'); ?>" /><span></span></div>
                        <div class="control-group">
                            <label class="control-label" for="nama">Nama Proyek:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="nama" id="nama" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="keterangan">Keterangan Proyek:<span class="text-error">*</span></label>
                            <div class="controls">
                                <textarea name="keterangan" id="keterangan" rows="5" class="span12"></textarea>
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="kategori">Kategori:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="kategori" id="kategori" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="visibilitas">Visibilitas:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="visibilitas" id="visibilitas" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="negara">Negara:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="negara" id="negara" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="provinsi">Provinsi/Wilayah:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="provinsi" id="provinsi" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="kota">Kota:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="kota" id="kota" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="perkiraan_anggaran">Perkiraan Anggaran:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="perkiraan_anggaran" id="perkiraan_anggaran" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <label class="control-label" for="jenis_industri">Jenis Industri:<span class="text-error">*</span></label>
                            <div class="controls">
                                <input type="text" name="jenis_industri" id="jenis_industri" value="" class="span12">
                            </div>
                        </div><!--end control-group-->
                        <div class="splitter_line"></div>
                        <div class="control-group">
                            <label class="control-label" for="industri">Upload Document:<span class="text-error">*</span></label>
                            <div class="controls" style="position: relative;">
                                <div class="fileUpload btn btn-info" id="uploadBtn">
                                    <span>Choose File</span>
                                    <input type="file" name="content" class="upload" id="uploadFile"/>
                                </div>
                                <input type="text" id="file_text" placeholder="Where is your file" class="span12"/>
                                <p>Ukuran maksimum file yang dapat di-upload tidak lebih besar dari 2 MB</p>
                            </div>
                        </div><!--end control-group-->
                        <div class="control-group">
                            <div class="controls">
                                <button type="submit" class="btn btn-abu span4">Simpan</button>
                                <button type="submit" class="btn btn-abu span4">Posting</button>
                                <button type="reset" class="btn btn-abu span4">Batal</button>
                            </div>
                        </div>



                    </form><!--end form-->

                </div><!--end register-->
            </div><!--end span9-->

        </div><!--end row-->

    </div>
</div>