<?php
$plugins = array(
    'select2/select2.min.js',
    'data-tables/jquery.dataTables.js',
    'data-tables/DT_bootstrap.js',
    'jquery-validation/dist/jquery.validate.js',
);
$scripts = array(
    'app.js',
    'table-editable.js',
    'customers_form.js'
);

$styles = array(
    '../plugins/data-tables/DT_bootstrap_rtl.css',
);
require_once 'head.php';
require_once 'header.php';
?>
<!-- BEGIN BODY -->
<body class="page-header-fixed">
    <div class="page-container row-fluid">
        <? require_once 'side_bar.php';?>
        <!-- BEGIN PAGE -->
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="user_edit" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" onClick="reset_form();" class="close" type="button"></button>
                    <h3>تعديل عميل</h3>
                </div>
                <div id="data-output" class="modal-body error" >
                </div>
                <div class="modal-body">
                    <p></p>
                    <form id="customer_edit_form" method="post" class="form-horizontal">
                        <input type="hidden" name="customer_id" value="null" class="span6 m-wrap" />
                        <div class="control-group">
                            <label class="control-label">اسم العميل</label>
                            <div class="controls">
                                <input type="text" name="customer_name" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">رقم الهاتف</label>
                            <div class="controls">
                                <input type="text" name="customer_phone" class="span6 m-wrap" />
                            </div>
                        </div>
                        <<div class="control-group">
                            <label class="control-label">الوظيفة</label>
                            <div class="controls">
                                <input type="text" name="customer_job" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">السن</label>
                            <div class="controls">
                                <input type="text" name="customer_age" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">النوع</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="customer_gender" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <option value="male">ذكر</option>
                                    <option value="female">أنثى</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">الحالة الاجتماعية</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="customer_married" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <option value="1">متزوج</option>
                                    <option value="0">غير متزوج</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">فترة العمل</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="customer_job_period" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <option value="day">نهار</option>
                                    <option value="night">ليل</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">التصنيف المفضل</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="customer_favorites_category" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <option value="classic">classic</option>
                                    <option value="casual">casual</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">النوع المفضل</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="customer_favorites_type" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <option value="fruits">fruits</option>
                                    <option value="organic">organic</option>
                                    <option value="flowers">flowers</option>
                                </select>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">التركيز المفضل</label>
                            <div class="controls">
                                <select class="span6 m-wrap" name="customer_favorites_concentration" data-placeholder="اختار" tabindex="1">
                                    <option value="">اختر...</option>
                                    <option value="light">خفيف</option>
                                    <option value="medium">متوسط</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-actions">
                            <button type="submit" onClick='$("#data-output").html("");' class="btn blue">تعديل</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- END SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <!-- BEGIN PAGE CONTAINER-->        
            <div class="container-fluid">
                <!-- BEGIN PAGE HEADER-->
                <div class="row-fluid">
                    <div class="span12">
                        <!-- BEGIN STYLE CUSTOMIZER -->
                        <div class="color-panel hidden-phone">
                            <div class="color-mode-icons icon-color"></div>
                            <div class="color-mode-icons icon-color-close"></div>
                            <div class="color-mode">
                                <p>THEME COLOR</p>
                                <ul class="inline">
                                    <li class="color-black current color-default" data-style="default-rtl"></li>
                                    <li class="color-blue" data-style="blue-rtl"></li>
                                    <li class="color-brown" data-style="brown-rtl"></li>
                                    <li class="color-purple" data-style="purple-rtl"></li>
                                    <li class="color-grey" data-style="grey-rtl"></li>
                                    <li class="color-white color-light" data-style="light-rtl"></li>
                                </ul>
                                <label>
                                    <span>Layout</span>
                                    <select class="layout-option m-wrap small">
                                        <option value="fluid" selected>Fluid</option>
                                        <option value="boxed">Boxed</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Header</span>
                                    <select class="header-option m-wrap small">
                                        <option value="fixed" selected>Fixed</option>
                                        <option value="default">Default</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Sidebar</span>
                                    <select class="sidebar-option m-wrap small">
                                        <option value="fixed">Fixed</option>
                                        <option value="default" selected>Default</option>
                                    </select>
                                </label>
                                <label>
                                    <span>Footer</span>
                                    <select class="footer-option m-wrap small">
                                        <option value="fixed">Fixed</option>
                                        <option value="default" selected>Default</option>
                                    </select>
                                </label>
                            </div>
                        </div>
                        <!-- END BEGIN STYLE CUSTOMIZER -->  
                        <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                        <h3 class="page-title">المخازن
                            <small>يمكنك اضافة المخازن والتعديل عليها وخذفها عن طريق هذه الصفحة</small>

                        </h3>
                        <?= Temp::breadcrumb('traders_control'); ?>
                        <!-- END PAGE TITLE & BREADCRUMB-->
                    </div>
                </div>
                <!-- END PAGE HEADER-->
                <!-- BEGIN PAGE CONTENT-->
                <div class="row-fluid">
                    <div class="span12">

                        <!-- table start-->

                        <div class="table-toolbar">
                            <div class="btn-group">
                                <a href="#user_edit" onClick="$('#user_edit .modal-header h3').html('اضافة عميل');$('#user_edit .form-actions .btn').html('اضافة');" data-toggle="modal">
                                    <button class="btn green"><i class="icon-plus"></i>
                                        اضافة عميل
                                    </button>
                                </a>
                            </div>
                            <div class="btn-group pull-left">
                                <button class="btn dropdown-toggle" data-toggle="dropdown">Tools <i class="icon-angle-down"></i>
                                </button>
                                <ul class="dropdown-menu pull-left">
                                    <li><a href="#">Print</a></li>
                                    <li><a href="#">Save as PDF</a></li>
                                    <li><a href="#">Export to Excel</a></li>
                                </ul>
                            </div>
                        </div>
                        <table class="table table-striped table-hover table-bordered" id="sample_editable_1">
                            <thead>
                                <tr>
                                    <th>رقم العميل</th>
                                    <th>اسم العميل</th>
                                    <th>رقم الهاتف</th>
                                    <th>الوظيفة</th>
                                    <th>العمر</th>
                                    <th>النوع</th>
                                    <th>الحالة الاجتماعية</th>
                                    <th>فترة العمل</th>
                                    <th>التصنيف المفضل</th>
                                    <th>النوع المفضل</th>
                                    <th>التركيز المفضل</th>
                                    <th>تعديل</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td>2</td>
                                    <td>alex</td>
                                    <td>Alex Nilson</td>
                                    <td>موزع</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>5</td>
                                    <td>lisa</td>
                                    <td>Lisa Wong</td>
                                    <td>434</td>
                                    <td class="center">new user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>nick12</td>
                                    <td>Nick Roberts</td>
                                    <td>232</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>goldweb</td>
                                    <td>Sergio Jackson</td>
                                    <td>132</td>
                                    <td class="center">elite user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>webriver</td>
                                    <td>Antonio Sanches</td>
                                    <td>462</td>
                                    <td class="center">new user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>gist124</td>
                                    <td>Nick Roberts</td>
                                    <td>موزع</td>
                                    <td class="center">new user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td class="center">power user</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                            </tbody>
                        </table>

                        <!-- table end -->
                    </div>
                </div>
                <!-- END PAGE CONTENT -->
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