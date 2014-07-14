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
    'stores_form.js'
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
                                <a href="#user_edit" onClick="$('#user_edit .modal-header h3').html('اضافة مخزن');$('#user_edit .form-actions .btn').html('اضافة');" data-toggle="modal">
                                    <button class="btn green"><i class="icon-plus"></i>
                                        اضافة مخزن
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
                                    <th>رقم المخزن</th>
                                    <th>اسم المخزن</th>
                                    <th>عنوان المخزن</th>
                                    <th>نوع المخزن</th>
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
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>5</td>
                                    <td>lisa</td>
                                    <td>Lisa Wong</td>
                                    <td>434</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>nick12</td>
                                    <td>Nick Roberts</td>
                                    <td>232</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>goldweb</td>
                                    <td>Sergio Jackson</td>
                                    <td>132</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>webriver</td>
                                    <td>Antonio Sanches</td>
                                    <td>462</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>10</td>
                                    <td>gist124</td>
                                    <td>Nick Roberts</td>
                                    <td>موزع</td>
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