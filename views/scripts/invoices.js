jQuery(document).ready(function() {       
    App.init();
    UIJQueryUI.init();
});

$("#product-add").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();   
    product_form();
});

$('body').on('click', '.product-edit', function(e) {
    e.preventDefault();   
    product_form();
    var $td= $(this).closest('tr').children('td');
    $('#invoice_form input[name="product_num"]').val($td.eq(0).text());
    $('#invoice_form input[name="product_name"]').val($td.eq(1).text());
    $('#invoice_form input[name="quantity"]').val($td.eq(2).text());
    $('#invoice_form input[name="unit_price"]').val($td.eq(3).text());
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


function update_products(){
    
    var product_num = $('#invoice_form input[name="product_num"]').val();
    if(product_num == 'null'){
        var new_product_num = $('#final_form_elements > input').length - 4;
        $('#final_form_elements').append('<input type="hidden" name="product_name[' + new_product_num + ']" value="' + 
            $('#invoice_form input[name="product_name"]').val() + '">');
        $('#final_form_elements').append('<input type="hidden" name="quantity[' + new_product_num + ']" value="' +
            $('#invoice_form input[name="quantity"]').val() + '">');
        $('#final_form_elements').append('<input type="hidden" name="unit_price[' + new_product_num + ']" value="' +
            $('#invoice_form input[name="unit_price"]').val() + '">');
    } else {
        $('#final_form_elements input[name="product_name[' + product_num + ']"]').val($('#invoice_form input[name="product_name"]').val());   
        $('#final_form_elements input[name="quantity[' + product_num + ']"]').val($('#invoice_form input[name="quantity"]').val());
        $('#final_form_elements input[name="unit_price[' + product_num + ']"]').val($('#invoice_form input[name="unit_price"]').val());   
    }
    $.ajax({
        url: '/re7anna/invoices/update_table',
        data: $("#final_form_elements").serialize(),
        type: 'post',
        success: function(output) {
            $('#products-table').html(output);
        }
    });
}

function update_invoice_info(){
    $('#final_form input[name="invoice_num"]').val($('#invoice_form input[name="invoice_num"]').val());
    $('#final_form input[name="company_id"]').val($('#invoice_form input[name="company_id"]').val());
    $('#final_form input[name="contracted_date"]').val($('#invoice_form input[name="contracted_date"]').val());
    $('#final_form input[name="delivery_date"]').val($('#invoice_form input[name="delivery_date"]').val());
    
    $('#display_form_num').html($('#invoice_form input[name="invoice_num"]').val());
    $('#display_company_name').html($('#invoice_form input[name="company_id"]').val());
    $('#display_contracted_date').html($('#invoice_form input[name="contracted_date"]').val());
    $('#display_delivery_date').html($('#invoice_form input[name="delivery_date"]').val());
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