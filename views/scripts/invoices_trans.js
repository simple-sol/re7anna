jQuery(document).ready(function() {       
    App.init();
    FormComponents.init();
});


$("#product-add").click(function(event){  
    //Prevent the hyperlink to perform default behavior  
    event.preventDefault();   
    product_form();
    $("#portlet-box-title").html('اضافة منتج');
});

$('body').on('click', '.product-edit', function(e) {
    e.preventDefault();   
    product_form();
    $("#portlet-box-title").html('تعديل منتج');
    var $td= $(this).closest('tr').children('td');
    $('#invoice_form input[name="product_num"]').val($td.eq(0).text());
    $('#invoice_form input[name="product_name"]').val($td.eq(1).text());
    $('#invoice_form input[name="quantity"]').val($td.eq(2).text());
});


    
    
$('body').on('click', '#confirm_invoice', function(e) {
    $("html, body").animate({
        scrollTop: 0
    }, 500);
    $('.alert').remove();
    var isValid = invoice_validate($('#final_form'));
    var form_elements = $('#final_form').serializeArray();
    var products = false;
    $.each(form_elements, function(i, field){
        if(field.name.indexOf('product_name') != -1){
            products = true;
        }
    });
    if(products == false){
        $('#final_form_elements').append('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong class="redo">يجب اضافة منتج واحد على الأقل</strong></div>');
        return;
    } 
    if(isValid == false) return;
    e.preventDefault();
    $.ajax({
        url: '/re7anna/trans/handle_trans',
        data: $("#final_form").serialize(),
        type: 'post',
        success: function(output) {
            console.log(output);
            if(output == 1){
                $('#final_form').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>تم اضافة التحويل بنجاح</strong></div>');                
            }else{
                $('#debug').html(output);
            }
        }
    });
    
});


$("#invoice_info_edit").click(function(event){  
    //Prevent the hyperlink to perform default behavior
    event.preventDefault();
    $("#portlet-box-title").html('تعديل بيانات التحويل');
    invoice_info();
    FormComponents.init();
});



$('body').on('click', '.product-del', function(e) {
    //Prevent the hyperlink to perform default behavior  
    e.preventDefault();
    var $td= $(this).closest('tr').children('td');
    $('#final_form input[name="quantity[' + $td.eq(0).text() + ']"]').remove();
    $('#final_form input[name="product_name[' + $td.eq(0).text() + ']"]').remove();
    $(this).closest('tr').remove();
    
    $.ajax({
        url: '/re7anna/trans/update_table',
        data: $("#final_form").serialize(),
        type: 'post',
        success: function(output) {
            $('#products-table').html(output);
            var sum = 0;
            $('#products-table td:nth-child(5)').each(function() {
                var value = $(this).text();
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            remove_alerts();
            $('#final_form').append('<div class="alert alert-info"><button class="close" data-dismiss="alert"></button><strong>تم حذف المنتج بنجاح</strong></div>');
        }
    });
});

function product_form(){
    $("#invoice_form").html($("#product_form").html());
}

function invoice_info(){
    $("#invoice_form").html($("#invoice_info").html());
    $('#invoice_form input[name="recipient"]').val($('#final_form input[name="recipient"]').val());
}


function update_products(){
    var isValid = invoice_validate($("#invoice_form"));
    if(isValid == false) return;
    $('#data_dismiss').click();
    var product_num = $('#invoice_form input[name="product_num"]').val();
    var product_name = $('#invoice_form input[name="product_name"]').val();
    var quantity = $('#invoice_form input[name="quantity"]').val();
    
    if(product_num == 'null'){
        var elements_num = $('#final_form_elements > input').length;
        if(elements_num <= 6){
            var new_product_num = 1;
        }else{
            var new_product_num = ((elements_num - 6)/3) + 1;
        }
        $('#final_form_elements').append('<input type="hidden" name="product_name[' + new_product_num + ']" value="' + product_name + '">');
        $('#final_form_elements').append('<input type="hidden" name="quantity[' + new_product_num + ']" value="' + quantity + '">');
    } else {
        $('#final_form_elements input[name="product_name[' + product_num + ']"]').val(product_name);   
        $('#final_form_elements input[name="quantity[' + product_num + ']"]').val(quantity);
    }

    $.ajax({
        url: '/re7anna/trans/update_table',
        data: $("#final_form").serialize(),
        type: 'post',
        success: function(output) {
            $('#products-table').html(output);
            var sum = 0;
            $('#products-table td:nth-child(5)').each(function() {
                var value = $(this).text();
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            remove_alerts();
            $('#final_form').append('<div class="alert alert-info"><button class="close" data-dismiss="alert"></button><strong>تم تعديل المنتج بنجاح</strong></div>');
        }
    });
    
}

function update_invoice_info(){
    var isValid = invoice_validate($("#invoice_form"));
    if(isValid == false) return;
    $('#data_dismiss').click();
    var recipient = $('#invoice_form input[name="recipient"]').val();
    
    $('#display_recipient').html(recipient);
    remove_alerts();
    $('#final_form').append('<div class="alert alert-info"><button class="close" data-dismiss="alert"></button><strong>تم تعديل بيانات التحويل بنجاح</strong></div>');
    $('#info_button').html('تعديل بيانات التحويل');
    
    
}

function remove_alerts(){
    $('.alert-info').remove();
    $('.alert-error').remove();
    $('.alert-success').remove();
    
}
function invoice_validate(form){
    form.validate({
        ignore: [],
        errorClass: "redo",
        rules: {
            recipient: {
                required: true
            },
            product_name: {
                required: true
            },
            quantity: {
                required: true,
                digits: true
            }
        },
        messages: {
            recipient: {
                required: 'يجب ادخال اسم المستلم'
            },
            product_name: {
                required: 'يجب ادخال اسم المنتج'
            },
            quantity: {
                required: 'يجب ادخال الكمية',
                digits: 'يجب أن يكون رقم'
            }
        },
        errorPlacement: function(error, element) {
            if(element.hasClass('hidden_input')) {
                element.parent().append('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong class="redo">' + error.text()+ '</strong></div>');
            } else {
                error.insertAfter(element);
            }
        }
    });
    return form.valid();
}