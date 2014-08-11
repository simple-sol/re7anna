<?php
$plugins = array(
    'jquery-validation/dist/jquery.validate.js',
    'bootstrap-datepicker/js/bootstrap-datepicker.js',
    'bootstrap-datetimepicker/js/bootstrap-datetimepicker.js',
);

$scripts = array(
    'app.js',
    'invoices.js',
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
                               data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">الكمية</label>
                    <div class="controls">
                        <input type="text" name="quantity" class="span6 m-wrap" />
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">سعر الوحدة</label>
                    <div class="controls">
                        <div class="input-prepend input-append">
                            <span class="add-on">$</span><input class="m-wrap " name="unit_price" type="text" /><span class="add-on">.00</span>
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" onClick='$("#data-output").html("");update_products();return false;' class="btn blue">تأكيد</button>
                </div>
            </div>
            <div id="invoice_info" style="display: none;">

                <div class="control-group">
                    <label class="control-label">رقم الفاتورة</label>
                    <div class="controls">
                        <input name="invoice_num" type="text" value="547878" class="span6 m-wrap">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">اسم الشركة</label>
                    <div class="controls">
                        <input type="text" name="company_id" class="span6 m-wrap" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                               data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,
                               &quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,
                               &quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,
                               &quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,
                               &quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,
                               &quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,
                               &quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,
                               &quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,
                               &quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,
                               &quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,
                               &quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">تاريخ التعاقد</label>
                    <div class="controls">
                        <div class="input-append date date-picker" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                            <input name="contracted_date" class="m-wrap m-ctrl-medium date-picker" readonly="" size="16" type="text" value=""><span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">تاريخ الوصول</label>
                    <div class="controls">
                        <div class="input-append date date-picker" data-date="102/2012" data-date-format="mm/yyyy" data-date-viewmode="years" data-date-minviewmode="months">
                            <input name="delivery_date" class="m-wrap m-ctrl-medium date-picker" readonly="" size="16" type="text" value=""><span class="add-on"><i class="icon-calendar"></i></span>
                        </div>
                    </div>
                </div>
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
                <h3 class="page-title">اضافة فاتورة
                    <small></small>

                </h3>
                <?= Temp::breadcrumb('emp_control'); ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
                <div class="row-fluid invoice">
                    <div class="row-fluid">
                        <form id="final_form">
                            <div id="final_form_elements">
                                <input class="hidden_input" type="hidden" name="invoice_id" value="null" />
                                <input class="hidden_input" type="hidden" name="invoice_num" />
                                <input class="hidden_input" type="hidden" name="company_id" />
                                <input class="hidden_input" type="hidden" name="contracted_date" />
                                <input class="hidden_input" type="hidden" name="delivery_date" />
                            </div>
                        </form>
                        <div class="span6">
                            <p style="font-size: 16px;"><span class="muted">فاتورة  </span>
                                <span class="display_form_num"><?= $_POST['invoice_info']['invoice_num']; ?></span> / 
                                <? if (isset($invoice_date)) echo $invoice_date; else echo date('Y-m-d'); ?></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row-fluid">
                        <div class="span4 invoice-payment">
                            <h4>معلومات الفاتورة :</h4>
                            <ul id="invoice-info-box" class="unstyled">
                                <li><strong>رقم الفاتورة :</strong><span class="display_form_num"><? if (isset($invoice_num)) echo $invoice_num; ?></span></li>
                                <li><strong>اسم الشركة :</strong><span id="display_company_name"><? if (isset($company_name)) echo $company_name; ?></span></li>
                                <li><strong>تاريخ التعاقد :</strong><span id="display_contracted_date"><? if (isset($contracted_date)) echo $contracted_date; ?></span></li>
                                <li><strong>تاريخ الوصول :</strong><span id="display_delivery_date"><? if (isset($delivery_date)) echo $delivery_date; ?></span></li>
                                <li id="invoice_info_edit" style="font-size: 16px;font-weight: bold;"><a href="#portlet-box" data-toggle="modal">تعديل</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="row-fluid">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>المنتج</th>
                                    <th class="hidden-480">الكمية</th>
                                    <th class="hidden-480">سعر الوحدة</th>
                                    <th>السعر الكلى</th>
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
                            <ul class="unstyled amounts">
                                <li style="font-size: 16px"><strong>الكمية الكلية:</strong> $9265</li>
                            </ul>
                            <br />
                            <a class="btn blue big hidden-print" onclick="javascript:window.print();">طباعة <i class="icon-print icon-big"></i></a>
                            <a id="confirm_invoice" class="btn green big hidden-print">تأكيد الفاتوة <i class="m-icon-big-swapright m-icon-white"></i></a>

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