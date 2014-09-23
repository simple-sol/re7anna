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
    'pages/login-rtl.css'
);
$script = <<<HERE
<script>
		jQuery(document).ready(function() {     
		  App.init();
		  Login.init();
		});
	</script>
HERE;
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
            <h3 style="color:red;">لقد تم ايقاف الحساب !</h3>
            <p style="color:red;">لن تتمكن من محاولة الدخول الى البرنامج نظرا لادخال معلومات الدخول بطريقة خاطئة عدة مرات</p>



            <div class="forget-password">
                <p> لتتمكن من الدخول الى حسابك ثانية برجاء
                    <a href="javascript:;"  id="forget-password" style="color:red;">ابلاغ الادارة</a>
                    لاستعادة كلمة المرور
                </p>
            </div>
            <br />
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
</body>
<!-- END BODY -->
</html>