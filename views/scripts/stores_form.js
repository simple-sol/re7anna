
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
});
	
$("#sample_editable_1 td:nth-child(5)").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    //alert($(event.target).text())  
    var $td= $(this).closest('tr').children('td');  
    $('input[name="store_id"]').val($td.eq(0).text());
    $('input[name="store_name"]').val($td.eq(1).text());
    $('input[name="store_address"]').val($td.eq(2).text());
    $('select[name="store_type"]').children().filter(function() {
        return $(this).text() == $td.eq(3).text(); 
    }).prop('selected', true);
});  

function row_del(row){  
    var $td= $(row).closest('tr').children('td'); 
    $.ajax({
        url: '/re7anna/stores/stores_del',
        data: {
            'store_id': $td.eq(0).text()
        },
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}


function reset_form(){
    $("label.error").remove();
    $("#user_edit .modal-header h3").html('تعديل مخزن');
    $("#user_edit .form-actions .btn").html('تعديل');
    $("#data-output").html('');
    $('input[name="store_id"]').val('null');
    $('input[name="store_name"]').val('');
    $('input[name="store_address"]').val('');
    $('select[name="store_type"]').children().prop('selected', false);
}

$("#store_edit_form").validate({
    errorClass: "error",
    rules: {
        store_name: {
            required: true,
            minlength: 2
        },
        store_address: {
            required: true,
            minlength: 5
        },
        store_type: {
            required: true
        }
    },
    messages: {
        store_name: {
            required: "يجب ادخال اسم المخزن",
            minlength: "يجب ألا يقل عن حرفين"
        },
        store_address: {
            required: "يجب ادخال العنوان",
            minlength: "يجب ألا يقل عن 5 أحرف"
        },
        store_type: {
            required: "يجب اختيار النوع"
        }
    },

    submitHandler: function(){
        $.ajax({
            url: '/re7anna/stores/stores_edit',
            data: $("#store_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


