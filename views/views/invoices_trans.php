<?php
$plugins = array(
    'jquery-validation/dist/jquery.validate.js',
    'bootstrap-datepicker/js/bootstrap-datepicker.js',
    'bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
);

$scripts = array(
    'app.js',
    'invoices_trans.js',
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
            <div id="product_form" style="display: none;">
                <input type="hidden" name="product_num" value="null" />
                <div class="control-group">
                    <label class="control-label">اسم المنتج</label>
                    <div class="controls">
                        <input type="text" name="product_name" class="span6 m-wrap" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                               data-source="[<?php echo Temp::autocomplete_data('products'); ?>]">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">الكمية</label>
                    <div class="controls">
                        <input type="text" name="quantity" class="span6 m-wrap" />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" onClick='$("#data-output").html("");update_products();return false;' class="btn blue">تأكيد</button>
                </div>
            </div>
            <div id="invoice_info" style="display: none;">

                <div class="form-actions">
                    <button type="submit" onClick='$("#data-output").html("");update_invoice_info();return false;' class="btn blue">تأكيد</button>
                </div>
            </div>
            <div id="portlet-box" class="modal hide">
                <div class="modal-header">
                    <button id="data_dismiss" data-dismiss="modal" class="close" type="button"></button>
                    <h3 id="portlet-box-title">تعديل البيانات</h3>
                </div>
                <div id="data-output" class="modal-body">
                </div>
                <div class="modal-body">
                    <p></p>
                    <form id="invoice_form" method="post" class="form-horizontal">
                    </form>
                </div>
            </div>
            <!-- BEGIN PAGE CONTAINER-->        
            <div class="container-fluid">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">اضافة تحويل
                    <small></small>

                </h3>
                <?= Temp::breadcrumb('emp_control'); ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
                <div class="row-fluid invoice">
                    <div class="row-fluid">
                        <div class="span6">
                            <p style="font-size: 16px;"><span class="muted">تحويل  </span>
                                <span class="display_form_num"><?= $_POST['invoice_info']['invoice_id']; ?></span> / 
                                <? if (isset($invoice_date)) echo $invoice_date; else echo date('Y-m-d'); ?></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row-fluid">
                        <div class="span4 invoice-payment">
                            <h4>معلومات التحويل :</h4>
                            <form id="final_form">
                                <div id="debug"></div>
                                <div id="final_form_elements">
                                    <input class="hidden_input" type="hidden" name="invoice_id" value="null" />
                                    <div class="control-group">
                                        <label class="control-label">المستلم</label>
                                        <div class="controls">
                                            <input type="text" name="recipient" class="hidden_input span6 m-wrap" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                                                   data-source="[<?php echo Temp::autocomplete_data('users'); ?>]">
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المنتج</th>
                                    <th class="hidden-480">الكمية</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody id="products-table">
                                <?php
                                if (!empty($table_data)) {
                                    echo $table_data;
                                } else {
                                    echo '<tr><td colspan="5">لا توجد منتجات</tr>';
                                }
                                ?>
                            </tbody>
                        </table>
                        <a id="product-add" href="#portlet-box" data-toggle="modal" class="btn"><i class="icon-plus"></i> اضافة منتج</a>
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span8 invoice-block">
                            <a class="btn blue big hidden-print" onclick="javascript:window.print();">طباعة <i class="icon-print icon-big"></i></a>
                            <a id="confirm_invoice" class="btn green big hidden-print">تأكيد التحويل <i class="m-icon-big-swapright m-icon-white"></i></a>

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