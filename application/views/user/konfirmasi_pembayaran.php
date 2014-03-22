<div class="container" style="padding-bottom: 30px;">

    <div class="row">

        <div class="span6">
            <div class="pembayaran">

                <div class="product-name">
                    Konfirmasi Pembayaran
                </div><!--end titleHeader-->

                <form method="POST" action="<?php echo current_url(); ?>" class="form-horizontal" id="konfirmasi">
                    
                    <?php $error_class = form_error('kode_transaksi') ? 'error' : ''; ?>
                    <div class="control-group <?php echo $error_class; ?>">
                        <label class="control-label" for="kode_transaksi">Kode Transaksi: </label>
                        <div class="controls">
                            <input type="text" name="kode_transaksi" id="kode_transaksi" value="<?php echo set_value('kode_transaksi'); ?>">
                            <?php echo form_error('kode_transaksi'); ?>
                        </div>
                    </div><!--end control-group-->

                    <?php $error_class = form_error('email') ? 'error' : ''; ?>
                    <div class="control-group <?php echo $error_class; ?>">
                        <label class="control-label" for="inputEMAdd">E-Mail: </label>
                        <div class="controls">
                            <input type="text" name="email" id="inputEMAdd" value="<?php echo set_value('email'); ?>">
                            <?php echo form_error('email'); ?>
                        </div>
                    </div><!--end control-group-->

                    <?php $error_class = form_error('nama_bank') ? 'error' : ''; ?>
                    <div class="control-group <?php echo $error_class; ?>">
                        <label class="control-label" for="nama_bank">Transfer Bank: </label>
                        <div class="controls">
                            <select name="nama_bank" id="nama_bank">
                                <option value="">- Pilih Satu -</option>
                                <option value="BCA">BCA</option>
                                <option value="Mandiri">Mandiri</option>
                            </select>
                            <?php echo form_error('nama_bank'); ?>
                        </div>
                    </div><!--end control-group-->

                    <?php $error_class = form_error('total_transfer') ? 'error' : ''; ?>
                    <div class="control-group <?php echo $error_class; ?>">
                        <label class="control-label" for="total_transfer">Total Transfer:</label>
                        <div class="controls">
                            <input type="text" name="total_transfer" id="total_transfer" value="<?php echo set_value('total_transfer'); ?>">
                            <?php echo form_error('total_transfer'); ?>
                        </div>
                    </div><!--end control-group-->

                    <?php $error_class = form_error('tgl_pembayaran') ? 'error' : ''; ?>
                    <div class="control-group <?php echo $error_class; ?>">
                        <label class="control-label" for="tgl_pembayaran">Tanggal:</label>
                        <div class="controls">
                            <input type="date" name="tgl_pembayaran" id="tgl_pembayaran" value="<?php echo set_value('tgl_pembayaran'); ?>">
                            <?php echo form_error('tgl_pembayaran'); ?>
                        </div>
                    </div><!--end control-group-->

                    <?php $error_class = form_error('catatan') ? 'error' : ''; ?>
                    <div class="control-group <?php echo $error_class; ?>">
                        <label class="control-label" for="catatan">Catatan:</label>
                        <div class="controls">
                            <textarea name="catatan" id="catatan" rows="5"><?php echo set_value('catatan'); ?></textarea>
                            <?php echo form_error('catatan'); ?>
                        </div>
                    </div><!--end control-group-->
                    <div class="control-group">
                        <div class="controls">
                            <button type="submit" class="btn btn-info">Checkout</button>
                        </div>
                    </div>



                </form><!--end form-->

            </div><!--end register-->
        </div><!--end span9-->


        <div class="span6">
            <div class="catatan_konfirmasi">
                <p>
                    Setelah proses konfirmasi ini selesai, bagian Sales-Online CONITSO.COM akan segera melakukan pengecekan. Jika telah disetujui oleh bagian keuangan bahwa dana Anda sudah masuk, maka Anda akan mendapatkan konfirmasi melalui kami via e-mail yang tercatat berupa PDF

                    Anda juga akan mendapatkan Nomor RESI JNE didalam NOTA PDF dan bisa ditelusur melalui link "Tracking Pengiriman"

                    Proses pengecekan ke bagian keuangan dan pengiriman barang akan dilakukan pada hari yang sama bilamana konfirmasi dan pembayaran dilakukan paling telat Jam 17.00 WIB setiap hari kerja atau 15.00 WIB pada hari Sabtu. Hari libur dan hari minggu kami tidak kerja dan konfirmasi secara otomatis akan diproses pada hari kerja selanjutnya.

                    Bilamana pada hari tersebut kami menemukan sesuatu halangan, misalnya dana tidak masuk, stok barang yang dibeli tidak jelas atau kosong, kami akan menghubungi Anda segera.

                    Seluruh status pesanan, status pembayaran, dan status pengiriman Anda dapat dilihat di My Account.
                </p>
            </div>
        </div><!--end span3-->

    </div><!--end row-->

</div>