<?php
$plugins = array(
    'select2/select2.min.js',
    'data-tables/jquery.dataTables.js',
    'data-tables/DT_bootstrap.js',
);
$scripts = array(
    'app.js',
    'table-editable.js',
    'input-setter.js',
);

$styles = array(
    '../plugins/data-tables/DT_bootstrap_rtl.css',
);

$script = <<<HERE
<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableEditable.init();
		});
	</script>
        <script type="text/javascript">  
$(document).ready(function()  
{  
  
$("#sample_editable_1 td:nth-child(11)").click(function(event){  
  
//Prevent the hyperlink to perform default behavior  
event.preventDefault();  
//alert($(event.target).text())  
  
var \$td= $(this).closest('tr').children('td');  
  
  
var name= \$td.eq(0).text();
var name= \$td.eq(1).text();  
var city= \$td.eq(2).text();
$('input[name="emp_name"]').val(\$td.eq(0).text());
$('input[name="emp_email"]').val(\$td.eq(1).text());
$('input[name="emp_add"]').val(\$td.eq(2).text());
$('input[name="emp_job"]').val(\$td.eq(3).text());
$('input[name="emp_sal"]').val(\$td.eq(4).text());
$('input[name="emp_st"]').val(\$td.eq(5).text());
$('input[name="emp_kids"]').val(\$td.eq(6).text());
$('input[name="emp_gen"]').val(\$td.eq(7).text());
$('input[name="emp_bday"]').val(\$td.eq(8).text());
$('input[name="emp_cert"]').val(\$td.eq(9).text());
}  
  
);  
  
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
        <div class="page-content">
            <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>portlet Settings</h3>
                </div>
                <div class="modal-body">
                    <p>Here will be a configuration form</p>
                </div>
            </div>
            <div id="user_edit" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>تعديل البيانات</h3>
                </div>
                <div class="modal-body">
                    <p></p>
                    <form id="edit_form" class="form-horizontal">
                        <div class="control-group">
                            <label class="control-label">اسم الموظف</label>
                            <div class="controls">
                                <input type="text" name="emp_name" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">البريد الاكترونى</label>
                            <div class="controls">
                                <div class="input-prepend"><span class="add-on">@</span><input class="m-wrap " name="emp_email" type="text" placeholder="Email Address" /></div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">العنوان</label>
                            <div class="controls">
                                <input type="text" name="emp_add" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">الوظيفة</label>
                            <div class="controls">
                                <input type="text" name="emp_job" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">المرتب</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <span class="add-on">$</span><input class="m-wrap " name="emp_sal" type="text" /><span class="add-on">.00</span>
                                </div>
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">الحالة الاجتماعية</label>
                            <div class="controls">
                                <input type="text" name="emp_st" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">الأولاد</label>
                            <div class="controls">
                                <input type="text" name="emp_kids" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">النوع</label>
                            <div class="controls">
                                <input type="text" name="emp_gen" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">اسم الموظف</label>
                            <div class="controls">
                                <input type="text" name="emp_name" class="span6 m-wrap" />
                            </div>
                        </div>
                        <div class="control-group">
                            <label class="control-label">اسم الموظف</label>
                            <div class="controls">
                                <input type="text" name="emp_name" class="span6 m-wrap" />
                            </div>
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
                        <?= Temp::breadcrumb('user_control'); ?>
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
                                <button id="sample_editable_1_new" class="btn green"><i class="icon-plus"></i>
                                    إضافة مخزن جديد 
                                </button>
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
                                    <th>اسم الموظف</th>
                                    <th>البريد الالكترونى</th>
                                    <th>العنوان</th>
                                    <th>الوظيفة</th>
                                    <th>المرتب</th>
                                    <th>الحالة الاجتماعية</th>
                                    <th>الأولاد</th>
                                    <th>النوع</th>
                                    <th>تاريخ الميلاد</th>
                                    <th>المؤهل الدراسى</th>
                                    <th>تعديل</th>
                                    <th>حذف</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr >
                                    <td>alex</td>
                                    <td>Alex Nilson</td>
                                    <td>1234</td>
                                    <td class="center">power user</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>lisa</td>
                                    <td>Lisa Wong</td>
                                    <td>434</td>
                                    <td class="center">new user</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>nick12</td>
                                    <td>Nick Roberts</td>
                                    <td>232</td>
                                    <td class="center">power user</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>goldweb</td>
                                    <td>Sergio Jackson</td>
                                    <td>132</td>
                                    <td class="center">elite user</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>webriver</td>
                                    <td>Antonio Sanches</td>
                                    <td>462</td>
                                    <td class="center">new user</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td><a href="#user_edit" data-toggle="modal">Edit</a></td>
                                    <td><a class="delete" href="javascript:;">Delete</a></td>
                                </tr>
                                <tr >
                                    <td>gist124</td>
                                    <td>Nick Roberts</td>
                                    <td>62</td>
                                    <td class="center">new user</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
                                    <td>أى كلام</td>
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