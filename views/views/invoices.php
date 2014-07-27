<?php
$plugins = array(
);

$scripts = array(
    'app.js',
    'invoices.js',
    'ui-jqueryui.js',
);

$styles = array(
    '../plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css',
);
require_once 'head.php';
require_once 'header.php';
?>
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <div class="page-container row-fluid">
        <? require_once 'side_bar.php';?>
        <!-- BEGIN PAGE -->
        <div class="page-content"><!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="product_form" style="display: none;">
                <input type="hidden" name="invoice_id" value="null" class="span6 m-wrap" />
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
                <div class="form-actions">
                    <button type="submit" onClick='$("#data-output").html("");' class="btn blue">تعديل</button>
                </div>
            </div>
            <div id="invoice_info" style="display: none;">
                <input type="hidden" name="invoice_id" value="null" class="span6 m-wrap" />
                <div class="control-group">
                    <label class="control-label">رقم الفاتورة</label>
                    <div class="controls">
                        <input type="text" name="invoice_number" class="span6 m-wrap" style="margin: 0 auto;" data-provide="typeahead" data-items="4" 
                               data-source="[&quot;Alabama&quot;,&quot;Alaska&quot;,&quot;Arizona&quot;,&quot;Arkansas&quot;,&quot;California&quot;,&quot;Colorado&quot;,&quot;Connecticut&quot;,&quot;Delaware&quot;,&quot;Florida&quot;,&quot;Georgia&quot;,&quot;Hawaii&quot;,&quot;Idaho&quot;,&quot;Illinois&quot;,&quot;Indiana&quot;,&quot;Iowa&quot;,&quot;Kansas&quot;,&quot;Kentucky&quot;,&quot;Louisiana&quot;,&quot;Maine&quot;,&quot;Maryland&quot;,&quot;Massachusetts&quot;,&quot;Michigan&quot;,&quot;Minnesota&quot;,&quot;Mississippi&quot;,&quot;Missouri&quot;,&quot;Montana&quot;,&quot;Nebraska&quot;,&quot;Nevada&quot;,&quot;New Hampshire&quot;,&quot;New Jersey&quot;,&quot;New Mexico&quot;,&quot;New York&quot;,&quot;North Dakota&quot;,&quot;North Carolina&quot;,&quot;Ohio&quot;,&quot;Oklahoma&quot;,&quot;Oregon&quot;,&quot;Pennsylvania&quot;,&quot;Rhode Island&quot;,&quot;South Carolina&quot;,&quot;South Dakota&quot;,&quot;Tennessee&quot;,&quot;Texas&quot;,&quot;Utah&quot;,&quot;Vermont&quot;,&quot;Virginia&quot;,&quot;Washington&quot;,&quot;West Virginia&quot;,&quot;Wisconsin&quot;,&quot;Wyoming&quot;]">
                    </div>
                </div>
                <div class="control-group">
                    <label class="control-label">الكمية</label>
                    <div class="controls">
                        <input type="text" name="quantity" class="span6 m-wrap" />
                    </div>
                </div>
                <div class="form-actions">
                    <button type="submit" onClick='$("#data-output").html("");' class="btn blue">تعديل</button>
                </div>
            </div>
            
            <div id="portlet-box" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>تعديل مخزن</h3>
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

                        <div class="span6">
                            <p style="font-size: 16px;">#5652256 / <?= date('Y-m-d')?> <span class="muted">فاتورة</span></p>
                        </div>
                    </div>
                    <hr />
                    <div class="row-fluid">
                        <div class="span4 invoice-payment">
                            <h4>معلومات الفاتورة :</h4>
                            <ul class="unstyled">
                                <li><strong>رقم الفاتورة #:</strong> 542554(DEMO)78</li>
                                <li><strong>اسم الشركة :</strong> FoodMaster Ltd</li>
                                <li><strong>تاريخ التعاقد :</strong> 45454DEMO545DEMO</li>
                                <li><strong>تاريخ الوصول :</strong> 542554(DEMO)78</li>
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
                                <tr>
                                    <td>1</td>
                                    <td>Hardware</td>
                                    <td>32</td>
                                    <td>$75</td>
                                    <td>$2152</td>
                                    <td>
                                        <a href="#portlet-box" data-toggle="modal" class="btn blue icn-only product-edit"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only product-del"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Furniture</td>
                                    <td>15</td>
                                    <td>$169</td>
                                    <td>$4169</td>
                                    <td>
                                        <a href="#portlet-box" data-toggle="modal" class="btn blue icn-only product-edit"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only product-del"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Foods</td>
                                    <td>69</td>
                                    <td>$49</td>
                                    <td>$1260</td>
                                    <td>
                                        <a href="#portlet-box" data-toggle="modal" class="btn blue icn-only product-edit"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only product-del"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Software</td>
                                    <td>149</td>
                                    <td>$12</td>
                                    <td>$866</td>
                                    <td>
                                        <a href="#portlet-box" data-toggle="modal" class="btn blue icn-only product-edit"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only product-del"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
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
                            <a class="btn green big hidden-print">تأكيد الفاتوة <i class="m-icon-big-swapright m-icon-white"></i></a>
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