<?php
$plugins = array(
    'jquery-validation/dist/jquery.validate.js',
    'bootstrap-datepicker/js/bootstrap-datepicker.js',
    'bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
);

$scripts = array(
    'app.js',
    'payments.js',
    'form-components.js'
);

$styles = array(
    '../plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css',
    '../plugins/bootstrap-datepicker/css/datepicker.css',
    '../plugins/bootstrap-datetimepicker/css/datetimepicker.css',
);
require_once 'head.php';
?>
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <? require_once 'header.php';?>
    <div class="page-container row-fluid">
        <? require_once 'side_bar.php';?>
        <!-- BEGIN PAGE -->
        <div class="page-content"><!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-box" class="modal hide">
                <div class="modal-header">
                    <button id="data_dismiss" data-dismiss="modal" class="close" type="button"></button>
                    <h3 id="portlet-box-title">تعديل البيانات</h3>
                </div>
                <div class="modal-body">
                    <p></p>
                    <form id="modal_payment_form" method="post" class="form-horizontal">
                        <input type="hidden" name="payment_num" value="" />
                        <div class="control-group">
                            <label class="control-label">قيمة الدفعة</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">$</span><input class="m-wrap" name="payment_amount" type="text" /><span class="add-on">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">تاريخ الدفع</label>
                            <div class="controls">
                                <div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                    <input class="m-wrap m-ctrl-medium date-picker" name="payment_date" readonly="" size="16" type="text" value=""><span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" onClick='$("#data-output").html("");update_payment();return false;' class="btn blue">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- BEGIN PAGE CONTAINER-->        
            <div class="container-fluid">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">اضافة دفعات 
                    <small>اضافة الدفعات للفواتير</small>
                </h3>
                <?= Temp::breadcrumb('emp_control'); ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
                <div class="row-fluid invoice">
                    <div class="row-fluid">
                        <form id="final_form">
                            <div id="debug"></div>
                            <div id="final_form_elements">
                                <input class="hidden_input" type="hidden" name="invoice_id" value="<?= $_GET['id'];?>" />
                                <input class="hidden_input" type="hidden" name="invoice_total_price" value="<?= invoices::get_total_price($_GET['invoice_id']);?>" />
                            </div>
                        </form>
                        <div class="span6">
                            <p style="font-size: 16px;"><span class="muted">فاتورة  </span>
                                <span class="display_form_num"><?= $invoice_num; ?></span> / 
                                <? if (isset($invoice_date)) echo $invoice_date; else echo date('Y-m-d'); ?></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row-fluid">
                        <form id="payment_form" action="" method="post">
                            <input type="hidden" name="payment_num" value="null" />
                            <div id="data-output">
                            </div>
                            <div class="control-group">
                                <label class="control-label">قيمة الدفعة</label>
                                <div class="controls">
                                    <div class="input-prepend input-append">
                                        <span class="add-on">$</span><input class="m-wrap inpage" name="payment_amount" type="text" /><span class="add-on">.00</span>
                                    </div>
                                </div>
                            </div>
                            <div class="control-group">
                                <label class="control-label">تاريخ الدفع</label>
                                <div class="controls">
                                    <div class="input-append date date-picker" data-date="12-02-2012" data-date-format="dd-mm-yyyy" data-date-viewmode="years">
                                        <input class="m-wrap m-ctrl-medium date-picker inpage" name="payment_date" readonly="" size="16" type="text" value=""><span class="add-on"><i class="icon-calendar"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="submit" onClick='$("#data-output").html("");add_payment();return false;' class="btn blue">اضافة</button>
                            </div>
                        </form>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>قيمة الدفعة</th>
                                    <th>التاريخ</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="payments-table">
                                <?php
                                if (!empty($table_data)) {
                                    echo $table_data;
                                } else {
                                    echo '<tr><td colspan="3">لا توجد دفعات</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span8 invoice-block">
                            <ul class="unstyled amounts">
                                <li style="font-size: 16px"><strong>الاجمالى: </strong><span id="total_payment">0</span>$</li>
                            </ul>
                            <br />
                            <a class="btn blue big hidden-print" onclick="javascript:window.print();">طباعة <i class="icon-print icon-big"></i></a>
                            <a id="confirm_payments" class="btn green big hidden-print">تأكيد<i class="m-icon-big-swapright m-icon-white"></i></a>

                        </div>
                    </div>
                </div>
            </div>
            <!-- END PAGE CONTAINER-->
        </div>
        <!-- END PAGE --> 
    </div>
    <!-- END CONTAINER -->
    <?php require_once 'foot.php'; ?>
</body>
<!-- END BODY -->
</html>