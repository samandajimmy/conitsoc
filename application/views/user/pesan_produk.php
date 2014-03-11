
<div class="container">

    <div class="row">

        <div class="span8">
            <?php
            if ($cart != NULL) {
                ?>
                <form action="<?php echo $action; ?>" method="POST">
                    <table class="table">
                        <tbody>
                            <?php
                            foreach ($cart as $row) {
                                $hidden = array(
                                    'rowid[]' => $row['rowid'],
                                );
                                echo form_hidden($hidden);
                                $cartopt = $this->cart->product_options($row['rowid']);
                                $gambar = $cartopt['gambar'];
                                ?>
                                <tr>
                                    <td>
                                        <a href="#"><img src="<?php echo base_url('produk/gambar/' . $gambar); ?>" alt=""></a>
                                    </td>
                                    <td class="desc">
                                        <h4><a href="#" class="invarseColor">
                                                <?php echo $row['name']; ?>
                                            </a></h4>
                                        <ul class="unstyled">
                                            <li>Available In Stock</li>
                                            <li>No. CtAw9458</li>
                                        </ul>
                                    </td>
                                    <td class="quantity">
                                        <div class="input-prepend input-append">
                                            <button class="btn"><i class="icon-chevron-left"></i></button>
                                            <input type="text" name="jumlah" value="<?php echo $row['qty']; ?>">
                                            <button class="btn"><i class="icon-chevron-right"></i></button>
                                        </div>
                                    </td>
                                    <td class="sub-price">
                                        <h2><?php echo 'Rp. ' . number_format($row['price'], 0, ',', '.'); ?></h2>
                                    </td>
                                    <td class="total-price">
                                        <h2><?php echo 'Rp. ' . number_format($row['subtotal'], 0, ',', '.'); ?></h2>
                                        Ex-Tax: $8.00
                                    </td>
                                    <td>
                                        <a class="btn btn-small btn-success" data-title="Edit" data-placement="top" rel="tooltip"><i class="icon-pencil"></i></a>
                                        <a href="<?php echo site_url('page/keranjang_beli/' . $row['rowid'] . '/delete'); ?>" class="btn btn-small btn-danger" data-title="Remove" data-placement="top" rel="tooltip"><i class="icon-trash"></i></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                    </table>
                    <div style="float: right;">
                        <a href="<?php echo site_url('page/keranjang_beli/-1/delete'); ?>" class="btn">Hapus Keranjang</a>
                        <button class="btn" type="submit"> Ubah Keranjang </button>
                    </div>
                </form>
                <?php
            } else {
                ?>
                <p>Keranjang belanja anda saat ini sedang kosong. silahkan berbelanja bersama kami</p>
                <?php
            }
            ?>

        </div><!--end span12-->


        <div class="span4">
            <div class="cart-receipt">
                <table class="table table-receipt">
                    <tr>
                        <td class="alignRight">Sub Total</td>
                        <td class="alignLeft">$600.00</td>
                    </tr>
                    <tr>
                        <td class="alignRight">Pricing Sharge</td>
                        <td class="alignLeft">$15.00</td>
                    </tr>
                    <tr>
                        <td class="alignRight">Promotion Discound</td>
                        <td class="alignLeft">$0.00</td>
                    </tr>
                    <tr>
                        <td class="alignRight">VAT</td>
                        <td class="alignLeft">$12.00</td>
                    </tr>
                    <tr>
                        <td class="alignRight"><h2>Total</h2></td>
                        <td class="alignLeft"><h2><?php echo 'Rp. ' . number_format($this->cart->total(), 0, ',', '.'); ?></h2></td>
                    </tr>
                    <tr>
                        <td class="alignRight"><a href="<?php echo site_url('page/home'); ?>" class="btn">Lanjut Belanja</a></td>
                        <td class="alignLeft"><button class="btn btn-primary">Checkout</button></td>
                    </tr>
                </table>
            </div>
        </div><!--end span5-->


    </div><!--end row-->

</div><!--end conatiner-->

