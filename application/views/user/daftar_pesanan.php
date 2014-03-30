<div class="container">

    <div class="row">
        <aside class="span3">

            <div class="user_info">
                <div class="header">
                    <h3>Personal Details</h3>
                </div><!--end titleHeader-->
                <ul class="unstyled">
                    <li><a class="invarseColor" href="<?php echo site_url('page/purchase_history'); ?>"><i class="icon-info-sign"></i>&nbsp;&nbsp;Purchase History</a></li>
                    <li><a class="invarseColor" href="<?php echo site_url('page/user_info'); ?>"><i class="icon-user"></i>&nbsp;&nbsp;Account Detail</a></li>
                </ul>
            </div><!--end categories-->
        </aside>


        <div class="span9">
            <table class="table table-striped" id="tab_purchase">
                <thead>
                    <tr>
                        <th></th>
                        <th>Purchase Date</th>
                        <th>Transaction Code</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Confirm</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($pesanan)) {
                        foreach ($pesanan as $pesanans) {
                            $date = strtotime($pesanans->tglPemesanan);
                            ?>
                            <tr>
                                <td align="right">></td>
                                <td align="left"><?php echo date('d M Y H:i', $date); ?></td>
                                <td><?php echo $pesanans->noPemesanan; ?></td>
                                <td><?php echo $pesanans->namaStatus; ?>?</td>
                                <td><?php echo 'Rp. '.  number_format($pesanans->biayaPemesanan, 0, ',', '.'); ?></td>
                                <td><a href="<?php echo site_url('page/konfirmasi_pembayaran/'.$pesanans->id_pemesanan); ?>" class="btn btn-info">Confirm</a></td>
                            </tr>
                            <?php
                        }
                    }
                    ?>
                </tbody>
            </table>
        </div><!--end span9-->

    </div>
</div><!--end featuredItems--> 
