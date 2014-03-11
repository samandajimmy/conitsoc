
<div class="body-conitso">
    <div class="container">

        <div class="row">

            <div class="span12">
                <table>
                    <thead>
                        <tr>
                            <td>No Pemesanan</td>
                            <td>Tanggal Pemesanan</td>
                            <td>Biaya Pemesanan</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if (isset($pesanan)) {
                            foreach ($pesanan as $row) {
                                ?>
                                <tr>
                                    <td><?php echo $row->noPemesanan; ?></td>
                                    <td><?php echo $row->tglPemesanan; ?></td>
                                    <td><?php echo $row->biayaPemesanan; ?></td>
                                </tr>
                                <?php
                            }
                        }
                        ?>
                    </tbody>
                </table>
            </div><!--end span12-->

        </div><!--end row-->

    </div><!--end conatiner-->

</div>
