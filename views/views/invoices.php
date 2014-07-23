<?php
$plugins = array(
);

$scripts = array(
    'app.js',
    'ui-jqueryui.js',
);

$styles = array(
    '../plugins/jquery-ui/jquery-ui-1.10.1.custom.min.css',
);
$script = <<<HERE
<script>
		jQuery(document).ready(function() {       
		   App.init();
		   UIJQueryUI.init();
		});
	</script>
HERE;
require_once 'head.php';
require_once 'header.php';
?>
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <div class="page-container row-fluid">
        <? require_once 'side_bar.php';?>
        <!-- BEGIN PAGE -->
        <div class="page-content"><!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="user_edit" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" onClick="reset_form();" class="close" type="button"></button>
                    <h3>تعديل مخزن</h3>
                </div>
                <div id="data-output" class="modal-body error" >
                </div>
                <div class="modal-body">
                    <p></p>
                    <form id="store_edit_form" method="post" class="form-horizontal">
                        <input type="hidden" name="store_id" value="null" class="span6 m-wrap" />
                        <div class="control-group">
                            <label class="control-label">اسم المخزن</label>
                            <div class="controls">
                                <input type="text" name="store_name" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">عنوان المخزن</label>
                            <div class="controls">
                                <input type="text" name="store_address" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">نوع المخزن</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="store_type" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <?= Temp::load_list_options('store_type'); ?>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">تاريخ التعاقد</label>
                            <div class="controls">
                                <input class="m-wrap hasDatepicker" size="16" type="text" value="" id="ui_date_picker_change_year_month">
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">تاريخ الوصول</label>
                            <div class="controls">
                                <input class="m-wrap hasDatepicker" size="16" type="text" value="" id="ui_date_picker_change_year_month">
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" onClick='$("#data-output").html("");' class="btn blue">تعديل</button>
                        </div>
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
                                <li style="font-size: 16px;font-weight: bold;"><a href="#user_edit" data-toggle="modal">تعديل</a></li>
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
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Hardware</td>
                                    <td class="hidden-480">32</td>
                                    <td class="hidden-480">$75</td>
                                    <td>$2152</td>
                                    <td>
                                        <a href="#" class="btn blue icn-only"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Furniture</td>
                                    <td class="hidden-480">15</td>
                                    <td class="hidden-480">$169</td>
                                    <td>$4169</td>
                                    <td>
                                        <a href="#" class="btn blue icn-only"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Foods</td>
                                    <td class="hidden-480">69</td>
                                    <td class="hidden-480">$49</td>
                                    <td>$1260</td>
                                    <td>
                                        <a href="#" class="btn blue icn-only"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                                <tr>
                                    <td>3</td>
                                    <td>Software</td>
                                    <td class="hidden-480">149</td>
                                    <td class="hidden-480">$12</td>
                                    <td>$866</td>
                                    <td>
                                        <a href="#" class="btn blue icn-only"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only"><i class="icon-remove icon-white"></i></a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="#" class="btn"><i class="icon-plus"></i> اضافة منتج</a>
                    </div>
                    <br />
                    <div class="row-fluid">
                        <div class="span8 invoice-block">
                            <ul class="unstyled amounts">
                                <li><strong>Sub - Total amount:</strong> $9265</li>
                                <li><strong>Discount:</strong> 12.9%</li>
                                <li><strong>VAT:</strong> -----</li>
                                <li><strong>Grand Total:</strong> $12489</li>
                            </ul>
                            <br />
                            <a class="btn blue big hidden-print" onclick="javascript:window.print();">Print <i class="icon-print icon-big"></i></a>
                            <a class="btn green big hidden-print">Submit Your Invoice <i class="m-icon-big-swapright m-icon-white"></i></a>
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