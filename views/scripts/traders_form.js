
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
});
	
$("#sample_editable_1 td:nth-child(6)").click(function(event){
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    var $td= $(this).parent('tr').children('td');  
    $('input[name="trader_id"]').val($td.eq(0).text());
    $('input[name="trader_company"]').val($td.eq(1).text());
    $('input[name="trader_company_address"]').val($td.eq(2).text());
    $('select[name="trader_type"]').children().filter(function() {
        return $(this).text() == $td.eq(3).text(); 
    }).prop('selected', true);
    $('select[name="trader_category"]').children().filter(function() {
        return $(this).text() == $td.eq(4).text(); 
    }).prop('selected', true);
});  

function row_del(row){  
    var $td= $(row).closest('tr').children('td'); 
    $.ajax({
        url: '/re7anna/traders/traders_del',
        data: {
            'trader_id': $td.eq(0).text()
        },
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}


function reset_traders_form(){
    $("label.error").remove();
    $("#user_edit .modal-header h3").html('تعديل تاجر');
    $("#user_edit .form-actions .btn").html('تعديل');
    $("#data-output").html('');
    $('input[name="trader_id"]').val('null');
    $('input[name="trader_company"]').val('');
    $('input[name="trader_company_address"]').val('');
    $('select[name="trader_type"]').children().prop('selected', false);
    $('select[name="trader_category"]').children().prop('selected', false);
}

$("#trader_edit_form").validate({
    errorClass: "error",
    rules: {
        trader_company: {
            required: true,
            minlength: 2
        },
        trader_company_address: {
            required: true,
            minlength: 5
        },
        trader_type: {
            required: true
        },
        trader_category: {
            required: true
        }
    },
    messages: {
        trader_company: {
            required: "يجب ادخال اسم الشركة",
            minlength: "يجب ألا يقل عن حرفين"
        },
        trader_company_address: {
            required: "يجب ادخال العنوان",
            minlength: "يجب ألا يقل عن 5 أحرف"
        },
        trader_type: {
            required: "يجب اختيار نوع التاجر",
            minlength: "اختيار غير صحيح"
        },
        trader_category: {
            required: "يجب اختيار فئة التاجر",
            minlength: "اختيار غير صحيح"
        }
    },

    submitHandler: function(){
        $.ajax({
            url: '/re7anna/traders/traders_edit',
            data: $("#trader_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


