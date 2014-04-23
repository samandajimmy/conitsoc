<html>
    <head>
        <style>
            body {font-family: sans-serif;
                  font-size: 10pt;
            }
            p {    margin: 0pt;
            }
            td { vertical-align: top; font-size: 14px;}
            .items td {
                border-left: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            table thead td { background-color: #EEEEEE;
                             text-align: center;
                             border: 0.1mm solid #000000;
            }
            .items td.blanktotal {
                background-color: #FFFFFF;
                border: 0mm none #000000;
                border-top: 0.1mm solid #000000;
                border-right: 0.1mm solid #000000;
            }
            .items td.totals {
                text-align: right;
                border: 0.1mm solid #000000;
            }
        </style>
    </head>
    <body>
        <?php
        $detail = $detail[0];
        $produk = $produk;
        ?>
        <table width="100%" height="75" style="font-family: serif; margin: 0 auto;" cellpadding="10" bgcolor="#000000">
            <tr>
                <td width="50%" style="border: 0.1mm solid #888888;"><img src="<?php echo base_url('assets/user/img'); ?>/conitso_logo.png" style="height: 50px; max-height: 50px;"></td>
                <td width="50%" style="border: 0.1mm solid #888888; color:white; text-align:right; font-size:43px;">Online Invoice</td>
            </tr>
        </table>
        <table width="100%" height="75" style="font-family: serif; margin: 5px auto;" cellpadding="10">
            <tr>
                <td width="50%">

                    <table width="100%" height="250" style="font-family: serif;" bgcolor="#e5e5e5">

                        <tr>
                            <td colspan="3" align="middle"><h3>Transaction Detail</h3></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%" >Transaction Code</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->noPemesanan ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Time of Transaction</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->tglPemesanan ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Shipping Method</td>
                            <td>:</td>
                            <td width="50%">JNE REG</td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Shipping Cost</td>
                            <td>:</td>
                            <td width="50%"><?php echo 'Rp. ' . number_format($detail->biayaPengiriman, 0, ',', '.') . ' x ' . $detail->beratPemesanan . ' kg'; ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Total Payment</td>
                            <td>:</td>
                            <td width="50%"><?php echo 'Rp. ' . number_format($detail->biayaPemesanan, 0, ',', '.'); ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Kode Unik</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->kode_unik ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%" >Payment Status</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->namaStatus; ?></td>
                        </tr>
                    </table>
                </td>
                <td width="50%">
                    <table width="100%" height="250" style="font-family: serif;" bgcolor="#e5e5e5">

                        <tr>
                            <td colspan="3" align="middle"><h3>Shipping Information</h3></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Recipient Name</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->nama_jelas; ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Phone</td>
                            <td>:</td>
                            <td width="50%" ><?php echo $detail->no_telepon; ?></td>
                        </tr>
                        <tr>
                            <td rowspan="" align="right" width="50%" >Address</td>
                            <td rowspan="">:</td>
                            <td rowspan="" width="50%" ><?php echo $detail->alamat; ?><br></td>
                        </tr>
                        <tr>
                            <td rowspan="" colspan="1" align="right" width="50%"></td>
                            <td rowspan=""></td>
                            <td rowspan="" width="50%"></td>
                        </tr>
                        <tr>
                            <td rowspan="" colspan="1" align="right" width="50%"></td>
                            <td rowspan=""></td>
                            <td rowspan="" width="50%"></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">City</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->city_name; ?></td>
                        </tr>
                        <tr>
                            <td align="right" width="50%">Postal Code</td>
                            <td>:</td>
                            <td width="50%"><?php echo $detail->kode_pos; ?></td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>


        <table class="items" width="100%" style="font-size: 9pt; margin: 5px auto; border: 1px solid #eeeeee;">
            <thead>
                <tr>
                    <td width="10%">SKU</td>
                    <td width="40%">Item Name</td>
                    <td width="15%">Price</td>
                    <td width="5%">Qty</td>
                    <td width="5%">Weight</td>
                    <td width="25%">Total</td>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($produk as $row) {
                    ?>
                    <!-- ITEMS HERE -->
                    <tr>
                        <td align="center">MF1234567</td>
                        <td align="center"><?php echo $row['name']; ?></td>
                        <td><?php echo 'Rp. ' . number_format($row['price'], 0, ',', '.'); ?></td>
                        <td align="right"><?php echo $row['qty']; ?></td>
                        <td align="right"><?php echo $row['berat']; ?></td>
                        <td align="right"><?php echo 'Rp. ' . number_format($row['subtotal'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                }
                ?>
                <tr>
                    <td align="center"></td>
                    <td align="center">Biaya Pengiriman JNE REG (1 kg) + ADM</td>
                    <td><?php echo 'Rp. ' . number_format($detail->biayaPengiriman, 0, ',', '.'); ?></td>
                    <td align="right">-</td>
                    <td align="right">-</td>
                    <td align="right"><?php echo 'Rp. ' . number_format($detail->biayaPengiriman, 0, ',', '.'); ?></td>
                </tr>
                <tr>
                    <td align="center"></td>
                    <td align="center">Insurance **</td>
                    <td>200</td>
                    <td align="right">-</td>
                    <td align="right">-</td>
                    <td align="right">200</td>
                </tr>
                <tr>
                    <td align="center"></td>
                    <td align="center">Kode Unik</td>
                    <td>74</td>
                    <td align="right">-</td>
                    <td align="right">-</td>
                    <td align="right">74</td>
                </tr>
                <!-- END ITEMS HERE -->
                <tr style="background: #eeeeee">
                    <td colspan="3" align="right">Grand Total</td>
                    <td colspan="2">1*</td>
                    <td><?php echo 'Rp. ' . number_format($detail->biayaPemesanan, 0, ',', '.'); ?></td>
                </tr>
            </tbody>
        </table>
        <div style="width: 100%; margin: 0 auto;">
            <p>
                * Berat pengiriman dibulatkan ke atas
                <br> ** Biaya asuransi untuk pengiriman pesanan Anda. Penjelasan mengenai asuransi bisa dilihat <a rel="nofollow" target="_blank" href="#" title="">disini</a><br><br>
                Kepada Yth. <b>Bapak/Ibu <?php echo $detail->nama_jelas; ?></b>, <br>
                Terima kasih atas kepercayaan Anda berbelanja di Conitso.com.
                berikut kami kirimkan e-Invoice yang berlaku sebagai nota pembelian anda.<br>
                File PDF invoice dapat Anda download melalui <a href="#">link berikut ini</a>.<br><br>
                Sebagai informasi, Nota Pembelian ini bukan sebagai bukti pembelian dan <b>hanya sah</b> apabila Anda telah
                melakukan pembayaran ke nomor rekening resmi kami yang tertera di bawah.<br><br>
            </p>

            <table width="80%" style="font-family: serif;" cellpadding="10" border="3" bordercolor="#EEEEEE" >
                <tr>
                    <td width="50%">
                        <table>
                            <tr>
                                <td><img src="https://www.jakartanotebook.com/images/front/cart-bank_01.png" style="float:left;" alt="BCA"></td>
                                <td><b>548-503-5921</b> a/n Cecep Hernawan<br>
                                    Cab. Central Park</td>
                            </tr>
                        </table></td>
                    <td width="50%">
                        <table>
                            <tr>
                                <td><img src="https://www.jakartanotebook.com/images/front/cart-bank_02.png" style="float:left;" alt="Mandiri"></td>
                                <td><b>1170004531455</b> a/n<br>
                                    Cab. Taman Anggrek, Jakarta</td>
                            </tr>
                        </table></td>
                </tr>
                <tr>
                    <td width="50%">                        
                        <table>
                            <tr>
                                <td><img src="https://www.jakartanotebook.com/images/front/cart-bank_03.png" style="float:left;" alt="BNI"></td>
                                <td><b>0099689812</b> a/n Cecep Hernawan<br>
                                    Cab. Daan Mogot, Jakarta</td>
                            </tr>
                        </table></td>
                    <td width="50%"></td>
                </tr>
            </table>
            <br>
            <p>
                Diharapkan untuk melakukan pembayaran transfer menggunakan kode unik agar pesanan anda bisa segera diproses secara otomatis oleh sistem kami<br>
                Anda dapat melihat Terms and Conditions Conitso.com <a href="#">disini</a> dan jawaban untuk Frequently Asked Questions (FAQ) Conitso.com <a href="#">disini</a>.<br>
                Pertanyaan-pertanyaan lain bilamana diperlukan, Anda dapat mer-reply email ini dan kami akan menjawabnya maksimak 1x24 jam pada hari kerja. Sales kami siap membantu Anda!<br><br>
            </p>

            <table width="100%" style="border: 1px solid #eeeeee">
                <tr>
                    <td>Copyright by Conitso.com 2011 - 2014. All rights reserved.</td>
                    <td align="right"><a rel="nofollow" target="_blank" href="#">Terms &amp; Conditions</a></td>
                </tr>
            </table>

        </div>
    </body>
</html>
