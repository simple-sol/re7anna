
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
});
	
$("#sample_editable_1 td:nth-child(12)").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    //alert($(event.target).text())  
    var $td= $(this).closest('tr').children('td');  
    $('input[name="customer_id"]').val($td.eq(0).text());
    $('input[name="customer_name"]').val($td.eq(1).text());
    $('input[name="customer_phone"]').val($td.eq(2).text());
    $('input[name="customer_job"]').val($td.eq(3).text());
    $('input[name="customer_age"]').val($td.eq(4).text());
    $('select[name="customer_gender"]').children().filter(function() {
        return $(this).text() == $td.eq(5).text(); 
    }).prop('selected', true);
    
    $('select[name="customer_married"]').children().filter(function() {
        return $(this).text() == $td.eq(6).text(); 
    }).prop('selected', true);
    $('select[name="customer_job_period"]').children().filter(function() {
        return $(this).text() == $td.eq(7).text(); 
    }).prop('selected', true);
    $('select[name="customer_favourites_category"]').children().filter(function() {
        return $(this).text() == $td.eq(8).text(); 
    }).prop('selected', true);
    $('select[name="customer_favourites_type"]').children().filter(function() {
        return $(this).text() == $td.eq(9).text(); 
    }).prop('selected', true);
    $('select[name="customer_favourites_concentration"]').children().filter(function() {
        return $(this).text() == $td.eq(10).text(); 
    }).prop('selected', true);
});  

function row_del(row){  
    var $td= $(row).closest('tr').children('td'); 
    $.ajax({
        url: '/re7anna/customers/customers_del',
        data: {
            'customer_id': $td.eq(0).text()
        },
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}


function reset_form(){
    $("label.error").remove();
    $("#user_edit .modal-header h3").html('تعديل عميل');
    $("#user_edit .form-actions .btn").html('تعديل');
    $("#data-output").html('');
    $('input[name="customer_id"]').val('null');
    $('input[name="customer_name"]').val('');
    $('input[name="customer_phone"]').val('');
    $('input[name="customer_job"]').val('');
    $('input[name="customer_age"]').val('');
    $('select[name="customer_gender"]').children().prop('selected', false);
    $('select[name="customer_married"]').children().prop('selected', false);
    $('select[name="customer_job_period"]').children().prop('selected', false);
    $('select[name="customer_favourites_category"]').children().prop('selected', false);
    $('select[name="customer_favourites_type"]').children().prop('selected', false);
    $('select[name="customer_favourites_concentration"]').children().prop('selected', false);
}

$("#customer_edit_form").validate({
    errorClass: "error",
    rules: {
        customer_name: {
            required: true,
            minlength: 2
        },
        customer_phone: {
            required: true,
            digits: true
        },
        customer_job: {
            required: true
        },
        customer_age: {
            required: true,
            digits: true
        },
        customer_gender: {
            required: true
        },
        customer_married: {
            required: true,
            digits: true
        },
        customer_job_period: {
            required: true
        },
        customer_favourites_category: {
            required: true
        },
        customer_favourites_type: {
            required: true
        },
        customer_favourites_concentration: {
            required: true
        }
    },
    messages: {
        customer_name: {
            required: "يجب ادخال اسم العميل",
            minlength: "يجب ألا يقل عن حرفين"
        },
        customer_phone: {
            required: "يجب ادخال رقم الهاتف",
            digits: "يجب أن يكون رقم"
        },

        customer_job: {
            required: "يجب ادخال الوظيفة"
        },
        customer_age: {
            required: "يجب ادخال العمر",
            digits: "يجب أن يكون رقم"
        },
        emp_salary: {
            required: "يجب ادخال المرتب",
            number: "يجب أن يكون رقم"
        },
        customer_married: {
            required: "يجب اختيار الحالة الاجتماعية",
            digits: "اختيار غير صحيح"
        },
        
        customer_gender: {
            required: "يجب اختيار النوع"
        },
        customer_job_period: {
            required: "يجب اختيار فترة العمل"
        },
        customer_favourites_category: {
            required: "يجب اختيار التصنيف المفضل"
        },
        customer_favourites_type: {
            required: "يجب اختيار النوع المفضل"
        },
        customer_favourites_concentration: {
            required: "يجب اختيار التركيز المفضل"
        }
    },

    submitHandler: function(){
        $.ajax({
            url: '/re7anna/customers/customers_edit',
            data: $("#customer_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


