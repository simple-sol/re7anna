<?php
$plugins = array(
    'jquery-validation/dist/jquery.validate.min.js',
    'select2/select2.min.js',
);
$scripts = array(
    'app.js',
    'login.js',
);

$styles = array(
    'pages/login-rtl.css',
);
require_once 'head.php';
?>
<!-- BEGIN BODY -->
<body class="login">
    <!-- BEGIN LOGO -->
    <div class="logo">
        <img src="<?= TEMPLATE_URL; ?>img/RE_logo_big.png" alt="" /> 
    </div>
    <!-- END LOGO -->
    <!-- BEGIN LOGIN -->
    <div class="content">
        <!-- BEGIN LOGIN FORM -->
        <form class="form-vertical login-form" action="" method="post">
            <h3 class="form-title">مرحبا!...تسجيل الدخول الى حسابك</h3>
            <div class="alert alert-error hide">
                <button class="close" data-dismiss="alert"></button>
                <span>برجاء ادخل اسم المستخدم وكلمة المرور</span>
            </div>
            <div class="control-group">
                <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
                <label class="control-label visible-ie8 visible-ie9">اسم المستخدم</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-user"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم" name="username"/>
                    </div>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label visible-ie8 visible-ie9">كلمة المرور</label>
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-lock"></i>
                        <input class="m-wrap placeholder-no-fix" type="password" autocomplete="off" placeholder="كلمة المرور" name="password"/>
                    </div>
                </div>
            </div>
            <div class="form-actions">
                <!--<label class="checkbox">
                <input type="checkbox" name="remember" value="1"/> Remember me
                </label>-->

                <button type="submit" class="btn red pull-right">
                    الدخول الى البرنامج <i class="m-icon-swapright m-icon-white"></i>
                </button>            
            </div>
            <div class="forget-password">
                <h4>لا استطيع الدخول الى حسابى</h4>
                <p>
                    <a href="javascript:;"  id="forget-password">ابلاغ الادارة</a>
                    لاستعادة كلمة المرور
                </p>
            </div>
            <!--<div class="create-account">
                    <p>
                            Don't have an account yet ?&nbsp; 
                            <a href="javascript:;" id="register-btn" >Create an account</a>
                    </p>
            </div>-->
        </form>
        <!-- END LOGIN FORM --> 



        <!-- BEGIN FORGOT PASSWORD FORM -->
        <form class="form-vertical forget-form" action="index.html" method="post">
            <h3 >تقرير عدم التمكن من الدخول</h3>
            <p>ادخل اسم المستخدم الخاص بك لابلاغ الادارة عن المشكلة</p>
            <div class="control-group">
                <div class="controls">
                    <div class="input-icon left">
                        <i class="icon-envelope"></i>
                        <input class="m-wrap placeholder-no-fix" type="text" autocomplete="off" placeholder="اسم المستخدم" name="email" />
                    </div>

                </div>
            </div>


            <div class="control-group">
                <div class="controls">
                    <div class="input-icon left">
                        <textarea class="proplem_cause m-wrap">شرح سبب المشكلة ...</textarea>
                    </div>

                </div>
            </div>



            <div class="form-actions">
                <button type="button" id="back-btn" class="btn pull-left">
                    <i class="m-icon-swapleft"></i> الرجوع
                </button>
                <button type="submit" class="btn green pull-right">
                    إبلاغ الادارة <i class="m-icon-swapright m-icon-white"></i>
                </button>            
            </div>
        </form>
        <!-- END FORGOT PASSWORD FORM -->

    </div>
    <!-- END LOGIN -->
    <?php require_once 'foot.php'; ?>