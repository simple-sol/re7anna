jQuery(document).ready(function() {       
    App.init();
    UIJQueryUI.init();
});

$("#product-add").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();   
    product_form();
});

$('body').on('click', '.product-edit', function() {
    event.preventDefault();   
    product_form();
    var $td= $(this).closest('tr').children('td');  
    $('input[name="product_name"]').val($td.eq(1).text());
    $('input[name="quantity"]').val($td.eq(2).text());
    alert("here");
});

$("#invoice_info_edit").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();
    invoice_info();
});



$("#product_del").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();
    
});

function product_form(){
    $("#invoice_form").html($("#product_form").html());
}

function invoice_info(){
    $("#invoice_form").html($("#invoice_info").html());
}

function update_table(){
    $.ajax({
        url: '/re7anna/invoices/update_table',
        data: {},
        type: 'post',
        success: function(output) {
            $("#products-table").html(output);
        }
    });
}
/*
$("#invoice_form").validate({
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


*/