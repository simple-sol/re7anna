var Login = function () {

    var handleLogin = function () {
        $('.login-form').validate({
            errorElement: 'label', //default input error message container
            errorClass: 'help-inline', // default input error message class
            focusInvalid: false, // do not focus the last invalid input
            rules: {
                username: {
                    required: true
                },
                password: {
                    required: true
                }
            },

            messages: {
                username: {
                    required: "يجب ادخال اسم المستخدم"
                },
                password: {
                    required: "يجب ادخال كلمة المرور"
                }
            },

            invalidHandler: function (event, validator) { //display error alert on form submit   
                //$('.alert-error', $('.login-form')).show();
            },

            highlight: function (element) { // hightlight error inputs
                $(element)
                        .closest('.control-group').addClass('error'); // set error class to the control group
            },

            success: function (label) {
                label.closest('.control-group').removeClass('error');
                label.remove();
            },

            errorPlacement: function (error, element) {
                error.addClass('help-small no-left-padding').insertAfter(element.closest('.input-icon'));
            },

            submitHandler: function (form) {
                form.submit();
            }
        });
        $("#submit_login").click(function () {
            if ($('.login-form').validate().form()) {
                alert();
                $('.login-form').submit();
            }
            else{
                return false;
            }
        });
    }


    return {
        init: function () {

           // handleLogin();

        }

    };

}();