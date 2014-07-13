
jQuery(document).ready(function() {       
    App.init();
    TableEditable.init();
});
	
$("#sample_editable_1 td:nth-child(4)").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();  
    //alert($(event.target).text())  
    var $td= $(this).closest('tr').children('td');  
    $('input[name="owner_id"]').val($td.eq(0).text());
    $('input[name="owner_name"]').val($td.eq(1).text());
    $('input[name="owner_proportion"]').val($td.eq(2).text());    
});  

function row_del(row){  
    var $td= $(row).closest('tr').children('td'); 
    $.ajax({
        url: '/re7anna/owners/owners_del',
        data: {
            'owner_id': $td.eq(0).text()
        },
        type: 'post',
        success: function(output) {
            alert(output);
        }
    });
}


function reset_form(){
    $("label.error").remove();
    $("#user_edit .modal-header h3").html('تعديل مالك');
    $("#user_edit .form-actions .btn").html('تعديل');
    $("#data-output").html('');
    $('input[name="owner_id"]').val('null');
    $('input[name="owner_name"]').val('');
    $('input[name="owner_proportion"]').val('');
}

$("#owner_edit_form").validate({
    errorClass: "error",
    rules: {
        owner_name: {
            required: true,
            minlength: 2
        },
        owner_proportion: {
            required: true,
            number: true
        }
    },
    messages: {
        owner_name: {
            required: "يجب ادخال اسم المالك",
            minlength: "يجب ألا يقل عن حرفين"
        },
        
        owner_proportion: {
            required: "يجب ادخال النسبة",
            number: "يجب أن يكون رقم"
        }
    },

    submitHandler: function(){
        $.ajax({
            url: '/re7anna/owners/owners_edit',
            data: $("#owner_edit_form").serialize(),
            type: 'post',
            success: function(output) {
                $("#data-output").html(output);
            }
        });
    }
});


