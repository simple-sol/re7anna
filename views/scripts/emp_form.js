
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
    FormComponents.init();
});
	
$("#sample_editable_1 td:nth-child(12)").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    //alert($(event.target).text())  
    var $td= $(this).closest('tr').children('td');  
    $('input[name="emp_id"]').val($td.eq(0).text());
    $('input[name="emp_name"]').val($td.eq(1).text());
    $('input[name="emp_email"]').val($td.eq(2).text());
    $('input[name="emp_address"]').val($td.eq(3).text());
    $('select[name="emp_job_id"]').children().filter(function() {
        return $(this).text() == $td.eq(4).text(); 
    }).prop('selected', true);
    $('input[name="emp_salary"]').val($td.eq(5).text());
    $('select[name="emp_married"]').children().filter(function() {
        return $(this).text() == $td.eq(6).text(); 
    }).prop('selected', true);
    $('input[name="has_kids"]').val($td.eq(7).text());
    $('select[name="emp_gender"]').children().filter(function() {
        return $(this).text() == $td.eq(8).text(); 
    }).prop('selected', true);
    $('input[name="emp_birthdate"]').val($td.eq(9).text());
    $('input[name="emp_certificate"]').val($td.eq(10).text());
});  

function row_del(row){  
    var $td= $(row).closest('tr').children('td'); 
    $.ajax({
        url: '/re7anna/employee/emp_del',
        data: {
            'emp_id': $td.eq(0).text()
        },
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}


function reset_form(){
    $("label.error").remove();
    $("#user_edit .modal-header h3").html('تعديل موظف');
    $("#user_edit .form-actions .btn").html('تعديل');
    $("#data-output").html('');
    $('input[name="emp_id"]').val('null');
    $('input[name="emp_name"]').val('');
    $('input[name="emp_email"]').val('');
    $('input[name="emp_address"]').val('');
    $('select[name="emp_job_id"]').children().prop('selected', false);
    $('input[name="emp_salary"]').val('');
    $('select[name="emp_married"]').children().prop('selected', false);
    $('input[name="has_kids"]').val('');
    $('select[name="emp_gender"]').children().prop('selected', false);
    $('input[name="emp_birthdate"]').val('');
    $('input[name="emp_certificate"]').val('');
}

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
            minlength: 5
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
        },
        company_id: {
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
            minlength: "يجب ألا يقل عن 5 أحرف"
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
            url: '/re7anna/employee/emp_edit',
            data: $("#emp_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


