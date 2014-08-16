jQuery(document).ready(function() {       
    App.init();
    FormComponents.init();
});

function add_payment(){
    $("html, body").animate({
        scrollTop: 0
    }, 500);
    var isValid = form_validate($("#payment_form"));
    if(isValid == false) return;
    $('#data_dismiss').click();
    var payment_num = $('#payment_form input[name="payment_num"]').val();
    var payment_amount = $('#payment_form input[name="payment_amount"]').val();
    var payment_date = $('#payment_form input[name="payment_date"]').val();
    update_payments(payment_num, payment_amount, payment_date, 'add');
}

$('body').on('click', '.payment-edit', function(e) {
    e.preventDefault();
    $('#modal_payment_form .redo').remove();
    var $td= $(this).closest('tr').children('td');
    $('#modal_payment_form input[name="payment_num"]').val($td.eq(0).text());
    $('#modal_payment_form input[name="payment_amount"]').val($td.eq(1).text());
    $('#modal_payment_form input[name="payment_date"]').val($td.eq(2).text());
});

function update_payment(){
    $("html, body").animate({
        scrollTop: 0
    }, 500);
    var isValid = form_validate($("#modal_payment_form"));
    if(isValid == false) return;
    $('#data_dismiss').click();
    var payment_num = $('#modal_payment_form input[name="payment_num"]').val();
    var payment_amount = $('#modal_payment_form input[name="payment_amount"]').val();
    var payment_date = $('#modal_payment_form input[name="payment_date"]').val();
    update_payments(payment_num, payment_amount, payment_date, 'update');
}

function update_payments(payment_num, payment_amount, payment_date, type){
    if(payment_num == 'null'){
        var elements_num = $('#final_form_elements > input').length;
        if(elements_num <= 2){
            var new_payment_num = 1;
        }else{
            var new_payment_num = ((elements_num - 2)/2) + 1;
        }
        $('#final_form_elements').append('<input type="hidden" name="payment_amount[' + new_payment_num + ']" value="' + payment_amount + '">');
        $('#final_form_elements').append('<input type="hidden" name="payment_date[' + new_payment_num + ']" value="' + payment_date + '">');
    } else {
        $('#final_form_elements input[name="payment_amount[' + payment_num + ']"]').val(payment_amount);   
        $('#final_form_elements input[name="payment_date[' + payment_num + ']"]').val(payment_date);
    }

    $.ajax({
        url: '/re7anna/invoices/update_payments_table',
        data: $("#final_form").serialize(),
        type: 'post',
        success: function(output) {
            $('#payment_form input[name="payment_amount"]').val('');
            $('#payment_form input[name="payment_date"]').val('');
            $('#payments-table').html(output);
            var sum = 0;
            $('#payments-table td:nth-child(2)').each(function() {
                var value = $(this).text();
                if(!isNaN(value) && value.length != 0) {
                    sum += parseFloat(value);
                }
            });
            $('#total_payment').html(sum);
            //$('#final_form input[name="total_payment"]').val(sum);
            remove_alerts();
            if(type == 'add')
                var msg = 'تم اضافة الدفعة بنجاح';
            else
                var msg = 'تم تعديل الدفعه بنجاح';
            $('#final_form').append('<div class="alert alert-info"><button class="close" data-dismiss="alert"></button><strong>'+msg+'</strong></div>');
        }
    });    
}

$('body').on('click', '#confirm_payments', function(e) {
    $("html, body").animate({
        scrollTop: 0
    }, 500);
    $('.alert').remove();
    var isValid = form_validate($('#final_form'));
    var form_elements = $('#final_form').serializeArray();
    var payments = false;
    $.each(form_elements, function(i, field){
        if(field.name.indexOf('payment_amount') != -1){
            payments = true;
        }
    });
    if(payments == false){
        $('#data-output').html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong class="redo">يجب اضافة دفعة واحدة على الأقل</strong></div>');
        return;
    } 
    if(isValid == false) return;
    e.preventDefault();
    $.ajax({
        url: '/re7anna/invoices/handle_payments',
        data: $("#final_form").serialize(),
        type: 'post',
        success: function(output) {
            console.log(output);
            if(output == 1){
                $('#final_form').append('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button><strong>تم اضافة الدفعات بنجاح</strong></div>');                
            }else{
                $('#debug').html(output);
            }
        }
    });
    
});



function remove_alerts(){
    $('.alert-info').remove();
    $('.alert-error').remove();
    $('.alert-success').remove();
    
}
function form_validate(form){
    form.validate({
        ignore: [],
        errorClass: "redo",
        rules: {
            payment_amount: {
                required: true,
                number: true
            },
            payment_date: {
                required: true,
                date: true
            }
        },
        messages: {
            payment_amount: {
                required: 'يجب ادخال قيمة الدفعة',
                number: 'يجب أن تكون قيمة الدفعة رقم'
            },
            payment_date: {
                required: 'يجب ادخال التاريخ',
                date: 'خطأ فى التاريخ'
            }
        },
        errorPlacement: function(error, element) {
            if(element.hasClass('inpage')) {
                $('#data-output').html('');
                $('#data-output').append('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button><strong class="redo">' + error.text()+ '</strong></div>');
            } else {
                error.insertAfter(element);
            }
        }
    });
    return form.valid();
}