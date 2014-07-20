<?php
$plugins = array(
    'select2/select2.min.js',
    'data-tables/jquery.dataTables.js',
    'data-tables/DT_bootstrap.js',
    'jquery-validation/dist/jquery.validate.js',
);
$scripts = array(
    'app.js',
    'table-advanced.js',
);

$styles = array(
    '../plugins/data-tables/DT_bootstrap_rtl.css',
    '../plugins/select2/select2_metro_rtl.css',
);
$script = <<<HERE
<script>
		jQuery(document).ready(function() {       
		   App.init();
		   TableAdvanced.init();
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
            <!-- BEGIN PAGE CONTAINER-->        
            <div class="container-fluid">
                <!-- BEGIN PAGE TITLE & BREADCRUMB-->
                <h3 class="page-title">المخازن
                    <small>يمكنك اضافة المخازن والتعديل عليها وخذفها عن طريق هذه الصفحة</small>

                </h3>
                <?= Temp::breadcrumb('emp_control'); ?>
                <!-- END PAGE TITLE & BREADCRUMB-->
                <div class="portlet box green">
                    <div class="portlet-title">
                        <div class="caption"><i class="icon-globe"></i>Responsive Table With Expandable details</div>
                        <div class="tools">
                            <a href="javascript:;" class="reload"></a>
                            <a href="javascript:;" class="remove"></a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        <table class="table table-striped table-bordered table-hover table-full-width" id="sample_1">
                            <thead>
                                <tr>
                                    <th>Rendering engine</th>
                                    <th>Browser</th>
                                    <th class="hidden-480">Platform(s)</th>
                                    <th class="hidden-480">Engine version</th>
                                    <th class="hidden-480">CSS grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td class="hidden-480">Win 95+</td>
                                    <td class="hidden-480">4</td>
                                    <td class="hidden-480">X</td>
                                </tr>
                                <tr >
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.0
                                    </td>
                                    <td class="hidden-480">Win 95+</td>
                                    <td class="hidden-480">5</td>
                                    <td class="hidden-480">C</td>
                                </tr>
                                <tr >
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.5
                                    </td>
                                    <td class="hidden-480">Win 95+</td>
                                    <td class="hidden-480">5.5</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 6
                                    </td>
                                    <td class="hidden-480">Win 98+</td>
                                    <td class="hidden-480">6</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Trident</td>
                                    <td>Internet Explorer 7</td>
                                    <td class="hidden-480">Win XP SP2+</td>
                                    <td class="hidden-480">7</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Trident</td>
                                    <td>AOL browser (AOL desktop)</td>
                                    <td class="hidden-480">Win XP</td>
                                    <td class="hidden-480">6</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Firefox 1.0</td>
                                    <td class="hidden-480">Win 98+ / OSX.2+</td>
                                    <td class="hidden-480">1.7</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Firefox 1.5</td>
                                    <td class="hidden-480">Win 98+ / OSX.2+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Firefox 2.0</td>
                                    <td class="hidden-480">Win 98+ / OSX.2+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Firefox 3.0</td>
                                    <td class="hidden-480">Win 2k+ / OSX.3+</td>
                                    <td class="hidden-480">1.9</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Camino 1.0</td>
                                    <td class="hidden-480">OSX.2+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Camino 1.5</td>
                                    <td class="hidden-480">OSX.3+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Netscape 7.2</td>
                                    <td class="hidden-480">Win 95+ / Mac OS 8.6-9.2</td>
                                    <td class="hidden-480">1.7</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Netscape Browser 8</td>
                                    <td class="hidden-480">Win 98SE+</td>
                                    <td class="hidden-480">1.7</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Netscape Navigator 9</td>
                                    <td class="hidden-480">Win 98+ / OSX.2+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.0</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.1</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1.1</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.2</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1.2</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.3</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1.3</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.4</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1.4</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.5</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1.5</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.6</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">1.6</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.7</td>
                                    <td class="hidden-480">Win 98+ / OSX.1+</td>
                                    <td class="hidden-480">1.7</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Mozilla 1.8</td>
                                    <td class="hidden-480">Win 98+ / OSX.1+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Seamonkey 1.1</td>
                                    <td class="hidden-480">Win 98+ / OSX.2+</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Gecko</td>
                                    <td>Epiphany 2.20</td>
                                    <td class="hidden-480">Gnome</td>
                                    <td class="hidden-480">1.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>Safari 1.2</td>
                                    <td class="hidden-480">OSX.3</td>
                                    <td class="hidden-480">125.5</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>Safari 1.3</td>
                                    <td class="hidden-480">OSX.3</td>
                                    <td class="hidden-480">312.8</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>Safari 2.0</td>
                                    <td class="hidden-480">OSX.4+</td>
                                    <td class="hidden-480">419.3</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>Safari 3.0</td>
                                    <td class="hidden-480">OSX.4+</td>
                                    <td class="hidden-480">522.1</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>OmniWeb 5.5</td>
                                    <td class="hidden-480">OSX.4+</td>
                                    <td class="hidden-480">420</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>iPod Touch / iPhone</td>
                                    <td class="hidden-480">iPod</td>
                                    <td class="hidden-480">420.1</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Webkit</td>
                                    <td>S60</td>
                                    <td class="hidden-480">S60</td>
                                    <td class="hidden-480">413</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 7.0</td>
                                    <td class="hidden-480">Win 95+ / OSX.1+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 7.5</td>
                                    <td class="hidden-480">Win 95+ / OSX.2+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 8.0</td>
                                    <td class="hidden-480">Win 95+ / OSX.2+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 8.5</td>
                                    <td class="hidden-480">Win 95+ / OSX.2+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 9.0</td>
                                    <td class="hidden-480">Win 95+ / OSX.3+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 9.2</td>
                                    <td class="hidden-480">Win 88+ / OSX.3+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera 9.5</td>
                                    <td class="hidden-480">Win 88+ / OSX.3+</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Opera for Wii</td>
                                    <td class="hidden-480">Wii</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Nokia N800</td>
                                    <td class="hidden-480">N800</td>
                                    <td class="hidden-480">-</td>
                                    <td class="hidden-480">A</td>
                                </tr>
                                <tr >
                                    <td>Presto</td>
                                    <td>Nintendo DS browser</td>
                                    <td class="hidden-480">Nintendo DS</td>
                                    <td class="hidden-480">8.5</td>
                                    <td class="hidden-480">C/A<sup>1</sup></td>
                                </tr>
                            </tbody>
                        </table>
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