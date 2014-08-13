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
    $('#invoice_form input[name="unit_price"]').val($td.eq(3).text());
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
        url: '/re7anna/invoices/handle_invoice',
        data: $("#final_form").serialize(),
        type: 'post',
        success: function(output) {
            $('#products-table').html(output);
        }
    });
    
});


$("#invoice_info_edit").click(function(event){  
    //Prevent the hyperlink to perform default behavior
    event.preventDefault();
    $("#portlet-box-title").html('تعديل بيانات الفاتورة');
    invoice_info();
    FormComponents.init();
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
    $('#invoice_form input[name="invoice_num"]').val($('#final_form input[name="invoice_num"]').val());
    $('#invoice_form input[name="company_id"]').val($('#final_form input[name="company_id"]').val());
    $('#invoice_form input[name="contracted_date"]').val($('#final_form input[name="contracted_date"]').val());
    $('#invoice_form input[name="delivery_date"]').val($('#final_form input[name="delivery_date"]').val());
}


function update_products(){
    var isValid = invoice_validate($("#invoice_form"));
    if(isValid == false) return;
    $('#data_dismiss').click();
    var product_num = $('#invoice_form input[name="product_num"]').val();
    var product_name = $('#invoice_form input[name="product_name"]').val();
    var quantity = $('#invoice_form input[name="quantity"]').val();
    var unit_price = $('#invoice_form input[name="unit_price"]').val();
    
    if(product_num == 'null'){
        var new_product_num = $('#final_form_elements > input').length - 4;
        $('#final_form_elements').append('<input type="hidden" name="product_name[' + new_product_num + ']" value="' + product_name + '">');
        $('#final_form_elements').append('<input type="hidden" name="quantity[' + new_product_num + ']" value="' + quantity + '">');
        $('#final_form_elements').append('<input type="hidden" name="unit_price[' + new_product_num + ']" value="' + unit_price + '">');
    } else {
        $('#final_form_elements input[name="product_name[' + product_num + ']"]').val(product_name);   
        $('#final_form_elements input[name="quantity[' + product_num + ']"]').val(quantity);
        $('#final_form_elements input[name="unit_price[' + product_num + ']"]').val(unit_price);   
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
    var isValid = invoice_validate($("#invoice_form"));
    if(isValid == false) return;
    var startDate = new Date($('#invoice_form input[name="contracted_date"]').val());
    var endDate = new Date($('#invoice_form input[name="delivery_date"]').val());
    if (new Date(startDate).getTime() >new Date(endDate).getTime()){
        $('<label for="delivery_date" class="redo">تم ادخال تاريخ الوصول أقدم من تاريخ التعاقد</label>').insertAfter('#invoice_form input[name="delivery_date"]');
        return;
    }
    $('#data_dismiss').click();
    var invoice_num = $('#invoice_form input[name="invoice_num"]').val();
    var company_id = $('#invoice_form input[name="company_id"]').val();
    var contracted_date = $('#invoice_form input[name="contracted_date"]').val();
    var delivery_date = $('#invoice_form input[name="delivery_date"]').val();
    
    $('#final_form input[name="invoice_num"]').val(invoice_num);
    $('#final_form input[name="company_id"]').val(company_id);
    $('#final_form input[name="contracted_date"]').val(contracted_date);
    $('#final_form input[name="delivery_date"]').val(delivery_date);
    
    $('.display_form_num').html('#' + invoice_num);
    $('#display_company_name').html(company_id);
    $('#display_contracted_date').html(contracted_date);
    $('#display_delivery_date').html(delivery_date);
}

function invoice_validate(form){
    form.validate({
        ignore: [],
        errorClass: "redo",
        rules: {
            invoice_num: {
                required: true,
                digits: true
            },
            company_id: {
                required: true
            },
            contracted_date: {
                required: true,
                date: true
            },
            delivery_date: {
                required: true,
                date: true
            },
            product_name: {
                required: true
            },
            quantity: {
                required: true,
                digits: true
            },
            unit_price: {
                required: true,
                number: true
            }
        },
        messages: {
            invoice_num: {
                required: 'يجب ادخال رقم الفاتورة',
                digits: 'يجب أن يكون رقم'
            },
            company_id: {
                required: 'يجب ادخال اسم الشركة'
            },
            contracted_date: {
                required: 'يجب ادخال تاريخ التعاقد',
                date: 'يجب أن يكون تاريخ'
            },
            delivery_date: {
                required: 'يجب ادخال تاريخ الوصول',
                date: 'يجب أن يكون تاريخ'
            },
            product_name: {
                required: 'يجب ادخال اسم المنتج'
            },
            quantity: {
                required: 'يجب ادخال الكمية',
                digits: 'يجب أن يكون رقم'
            },
            unit_price: {
                required: 'يجب ادخال سعر الوحدة',
                number: 'يجب أن يكون رقم'
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