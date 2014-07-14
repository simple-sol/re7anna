
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
});
	
$("#sample_editable_1 td:nth-child(5)").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    //alert($(event.target).text())  
    var $td= $(this).closest('tr').children('td');  
    $('input[name="market_id"]').val($td.eq(0).text());
    $('input[name="market_name"]').val($td.eq(1).text());
    $('input[name="market_address"]').val($td.eq(2).text());
    $('select[name="market_type"]').children().filter(function() {
        return $(this).text() == $td.eq(3).text(); 
    }).prop('selected', true);
});  

function row_del(row){  
    var $td= $(row).closest('tr').children('td'); 
    $.ajax({
        url: '/re7anna/markets/markets_del',
        data: {
            'market_id': $td.eq(0).text()
        },
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}


function reset_form(){
    $("label.error").remove();
    $("#user_edit .modal-header h3").html('تعديل سوق');
    $("#user_edit .form-actions .btn").html('تعديل');
    $("#data-output").html('');
    $('input[name="market_id"]').val('null');
    $('input[name="market_name"]').val('');
    $('input[name="market_address"]').val('');
    $('select[name="market_type"]').children().prop('selected', false);
}

$("#market_edit_form").validate({
    errorClass: "error",
    rules: {
        market_name: {
            required: true,
            minlength: 2
        },
        market_address: {
            required: true,
            minlength: 5
        },
        market_type: {
            required: true
        }
    },
    messages: {
        market_name: {
            required: "يجب ادخال اسم السوق",
            minlength: "يجب ألا يقل عن حرفين"
        },
        market_address: {
            required: "يجب ادخال العنوان",
            minlength: "يجب ألا يقل عن 5 أحرف"
        },
        market_type: {
            required: "يجب اختيار النوع"
        }
    },

    submitHandler: function(){
        $.ajax({
            url: '/re7anna/markets/markets_edit',
            data: $("#market_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


