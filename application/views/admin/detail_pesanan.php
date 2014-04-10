
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
                <h3 class="page-title">
                    Order Detail
                </h3>
                <!-- END PAGE TITLE & BREADCRUMB-->
            </div>
        </div>
        <!-- END PAGE HEADER-->
        <!-- BEGIN ADVANCED TABLE widget-->
        <div class="row-fluid">
            <div class="span12">
                <?php
                $detail = $pemesanan['detail'][0];
                $produk = $pemesanan['produk'];
                ?>
                <div class="tabbable custom-tab">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#tab_1_1" data-toggle="tab">Info</a></li>
                        <li class=""><a href="#tab_1_2" data-toggle="tab">Billing Info</a></li>
                        <li class=""><a href="#tab_1_3" data-toggle="tab">Shipping Info</a></li>
                        <li class=""><a href="#tab_1_4" data-toggle="tab">Product Info</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tab_1_1">
                            <script type="text/javascript">
                                $(document).ready(function() {
                                    toggleChangeOrderStatus(false);
                                    toggleOrderTotals(false);
                                    toggleCC(false);
                                });

                                function toggleChangeOrderStatus(editmode) {
                                    if (editmode) {
                                        $('#pnlChangeOrderStatus').show();
                                        $('#btnChangeOrderStatus').hide();
                                    } else {
                                        $('#pnlChangeOrderStatus').hide();
                                        $('#btnChangeOrderStatus').show();
                                    }
                                }

                            </script>
                            <table class="adminContent">
                                <tbody>
                                    <tr>
                                        <td class="adminTitle">
                                            <strong>
                                                <label for="OrderStatus" title="The status of this order.">Order status</label>
                                            </strong>
                                        </td>
                                        <td class="adminData">
                                            <strong><?php echo $detail->namaStatus; ?></strong>&nbsp;
                                            <?php echo $detail->idStatus == 3 ? '' : '<input type="submit" name="cancelorder" value="Cancel order" id="cancelorder" data-val="' . $detail->id_pemesanan . '" class="adminButton">'; ?>

                                            <input type="submit" name="btnChangeOrderStatus" value="Change status" onclick="toggleChangeOrderStatus(true);
                                    return false;" id="btnChangeOrderStatus" class="adminButton" style="display: inline-block;">
                                            <div id="pnlChangeOrderStatus" style="display: none;">
                                                <em>This option is only for advanced users (not recommended to change manually). All appropriate actions (such as inventory adjustment, sending notification emails, reward points, gift card activation/deactivation, etc) should be done manually in this case.</em>
                                                <br>
                                                <?php
                                                echo form_dropdown('id_status', $status, '0', 'id="id_status"');
                                                ?>
                                                <input type="submit" name="btnSaveOrderStatus" value="Save" data-val="<?php echo $detail->id_pemesanan; ?>" id="btnSaveOrderStatus" class="adminButton">
                                                <input type="submit" name="btnCancelOrderStatus" value="Cancel" onclick="toggleChangeOrderStatus(false);
                                    return false;" id="btnCancelOrderStatus" class="adminButton">
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="Id" title="The unique ID of this order.">Order ID</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo $detail->noPemesanan; ?>
                                        </td>
                                    </tr>
                                    <tr class="adminSeparator">
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="adminTitle">
                                            <label for="CustomerId" title="The email of customer who placed this order.">Customer</label>
                                        </td>
                                        <td class="adminData">
                                            <a href=""><?php echo $detail->email; ?></a>
                                        </td>
                                    </tr>

                                    <tr>
                                        <td class="adminTitle">
                                            <label for="CustomerId" title="The username customer who placed this order.">Username</label>
                                        </td>
                                        <td class="adminData">
                                            <a href=""><?php echo $detail->username; ?></a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="OrderSubtotalExclTax" title="The total quantity of this order.">Total Qty</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo $detail->jmlPemesanan; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="OrderShippingExclTax" title="The total shipping cost for this order.">Order shipping</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo 'Rp. ' . number_format($detail->biayaPengiriman, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="Tax" title="Total weight applied to this order.">Total Order Weight</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo $detail->beratPemesanan; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="kode_unik" title="Kode Unik for this order.">Kode Unik</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo $detail->kode_unik; ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="OrderTotal" title="The total cost of this order (includes discounts, shipping and tax).">Order total</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo 'Rp. ' . number_format($detail->biayaPemesanan, 0, ',', '.'); ?>
                                        </td>
                                    </tr>
                                    <tr class="adminSeparator">
                                        <td colspan="2">
                                            <hr>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="PaymentMethod" title="The payment method used for this transaction. You can manage Payment Methods from Configuration : Payment : Payment Methods.">Payment method</label>
                                        </td>
                                        <td class="adminData">
                                            Bank Transfer
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="PaymentStatus" title="The status of the payment.">Payment status</label>
                                        </td>
                                        <td class="adminData">
                                            <strong><?php echo $detail->is_confirm ? 'Telah Dikonfirmasi' : 'Belum Dikonfirmasi'; ?></strong> &nbsp;
                                            <?php echo $detail->is_confirm ? '' : '<input type="submit" name="markorderaspaid" value="Mark as confirmed" data-val="' . $detail->id_pemesanan . '" id="markorderaspaid" class="adminButton" onclick="">'; ?>

                                            &nbsp;
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="CreatedOn" title="The date/time the order was placed/created.">Created on</label>
                                        </td>
                                        <td class="adminData">
                                            <?php echo $detail->tglPemesanan; ?>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </div>
                        <div class="tab-pane" id="tab_1_2">
                            <?php
                            $param = $this->userModel->getProfileDetail($detail->idUser);
                            $user = $param[0];
                            ?>
                            <table class="adminContent">
                                <tbody><tr>
                                        <td class="adminTitle">
                                            <label for="BillingAddress" title="Billing address info">Billing address</label>
                                        </td>
                                        <td class="adminData">
                                            <table class="detail_order" style="border: solid 1px black; padding: 5px;">
                                                <tbody><tr>
                                                        <td>
                                                            Full name:
                                                        </td>
                                                        <td>
                                                            <?php echo $user->nama_jelas; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->email; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone:
                                                        </td>
                                                        <td>
                                                            <?php echo $user->no_telepon; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address :
                                                        </td>
                                                        <td>
                                                            <?php echo $user->alamat; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City:
                                                        </td>
                                                        <td>
                                                            <?php echo $user->city_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State / province:
                                                        </td>
                                                        <td>
                                                            <?php echo $user->state_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Zip / postal code:
                                                        </td>
                                                        <td>
                                                            <?php echo $user->kode_pos; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Country:
                                                        </td>
                                                        <td>
                                                            Indonesia
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                </tbody></table>
                        </div>
                        <div class="tab-pane" id="tab_1_3">
                            <table class="adminContent">
                                <tbody><tr>
                                        <td class="adminTitle">
                                            <label for="ShippingAddress" title="Shipping address info">Shipping address</label>
                                        </td>
                                        <td class="adminData">
                                            <table class="detail_order" style="border: solid 1px black; padding: 5px;">
                                                <tbody><tr>
                                                        <td>
                                                            Full name:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->nama_jelas; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Email:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->email; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Phone:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->no_telepon; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Address :
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->alamat; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            City:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->city_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            State / province:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->state_name; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Zip / postal code:
                                                        </td>
                                                        <td>
                                                            <?php echo $detail->kode_pos; ?>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>
                                                            Country:
                                                        </td>
                                                        <td>
                                                            Indonesia
                                                        </td>
                                                    </tr>
                                                </tbody></table>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="ShippingMethod" title="The customers chosen shipping method for this order. You can manage shipping methods from Configuration : Shipping : Shipping Methods.">Shipping method</label>
                                        </td>
                                        <td class="adminData">
                                            JNE Reguler
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="adminTitle">
                                            <label for="ShippingStatus" title="The status of the shipping.">Shipping status</label>
                                        </td>
                                        <td class="adminData">
                                            Not yet shipped
                                        </td>
                                    </tr>
                                </tbody></table>
                        </div>
                        <div class="tab-pane" id="tab_1_4">
                            <table class="adminContent">
                                <tbody>
                                    <tr>
                                        <td class="adminData">
                                            <table class="tablestyle" border="1" cellspacing="0" style="width: 100%; border-collapse: collapse;">
                                                <colgroup><col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                    <col>
                                                </colgroup><thead>
                                                    <tr class="headerstyle">
                                                        <th align="center">
                                                            Product name
                                                        </th>
                                                        <th align="center">
                                                            Price
                                                        </th>
                                                        <th align="center">
                                                            Quantity
                                                        </th>
                                                        <th align="center">
                                                            Weight
                                                        </th>
                                                        <th align="center">
                                                            Total
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    foreach ($produk as $row) {
                                                        ?>
                                                        <tr>
                                                            <td style="width: 25%;">
                                                                <div style="padding-left: 10px; padding-right: 10px; text-align: left;">
                                                                    <em>
                                                                            <?php echo $row['name']; ?></em>
                                                                    <br>
                                                                    [Auto-ship, Every 100 Days]
                                                                </div>
                                                            </td>
                                                            <td align="center" style="width: 15%;">
                                                                <?php echo 'Rp. ' . number_format($row['price'], 0, ',', '.'); ?>
                                                            </td>
                                                            <td align="center" style="width: 10%;">
                                                                <div>
                                                                    <?php echo $row['qty']; ?></div>
                                                            </td>
                                                            <td align="center" style="width: 15%;">
                                                                <?php echo $row['subtotalberat']; ?>
                                                            </td>
                                                            <td align="center" style="width: 15%;">
                                                                <?php echo 'Rp. ' . number_format($row['subtotal'], 0, ',', '.'); ?>
                                                            </td>
                                                        </tr>
                                                        <?php
                                                    }
                                                    ?>
                                                </tbody>
                                            </table>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
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