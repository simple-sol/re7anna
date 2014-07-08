
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
});
	
$(document).ready(function()  
{
    $("#sample_editable_1 td:nth-child(12)").click(function(event){  
        //Prevent the hyperlink to perform default behavior  
        event.preventDefault();  
        //alert($(event.target).text())  
        var $td= $(this).closest('tr').children('td');  
        $('input[name="emp_id"]').val($td.eq(0).text());
        $('input[name="emp_name"]').val($td.eq(1).text());
        $('input[name="emp_email"]').val($td.eq(2).text());
        $('input[name="emp_address"]').val($td.eq(3).text());
        $('input[name="emp_job_id"]').val($td.eq(4).text());
        $('input[name="emp_salary"]').val($td.eq(5).text());
        $('input[name="emp_married"]').val($td.eq(6).text());
        $('input[name="has_kids"]').val($td.eq(7).text());
        $('input[name="emp_gender"]').val($td.eq(8).text());
        $('input[name="emp_birthdate"]').val($td.eq(9).text());
        $('input[name="emp_certificate"]').val($td.eq(10).text());
    });  
});  

$("#emp_edit_form").validate({
    errorClass: "error",
    rules: {
        emp_name: {
            required: true,
            minlength: 2
        },
        emp_email: {
            required: true,
            email: true
        },
        emp_address: {
            required: true,
            minlength: 10
        },
        emp_job_id: {
            required: true,
            digits: true
        },
        emp_salary: {
            required: true,
            number: true
        },
        emp_married: {
            required: true,
            digits: true
        },
        has_kids: {
            required: true,
            digits: true
        },
        emp_gender: {
            required: true,
            digits: true
        },
        emp_birthdate: {
            required: true,
            date: true
        },
        emp_certificate: {
            required: true
        }
    },
    messages: {
        emp_name: {
            required: "يجب ادخال اسم الموظف",
            minlength: "يجب ألا يقل عن حرفين"
        },
        emp_email: {
            required: "يجب ادخال البريد الالكترونى",
            email: "البريد الاكترونى غير صحيح"
        },

        emp_address: {
            required: "يجب ادخال العنوان",
            minlength: "يجب ألا يقل عن 10 أحرف"
        },
        emp_job_id: {
            required: "يجب اختيار وظيفة",
            digits: "اختيار غير صحيح"
        },
        emp_salary: {
            required: "يجب ادخال المرتب",
            number: "يجب أن يكون رقم"
        },
        emp_married: {
            required: "يجب اختيار الحالة الاجتماعية",
            digits: "اختيار غير صحيح"
        },
        has_kids: {
            required: "يجب اختيار الأولاد",
            digits: "اختيار غير صحيح"
        },
        emp_gender: {
            required: "يجب اختيار النوع",
            digits: "اختيار غير صحيح"
        },
        emp_birthdate: {
            required: "يجب اختيار تاريخ الميلاد",
            date: "تاريخ غير صحيح"
        },
        emp_certificate: {
            required: "يجب ادخال المؤهل الدراسى"
        }
    },

    submitHandler: function(){
        $.ajax({
            url: '/re7anna/user/emp_edit',
            data: $("#emp_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


