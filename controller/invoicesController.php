<?php

Class invoicesController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | الفواتير';
        $this->registry->template->show('invoices');
    }

    public function addInvoice() {
        $this->registry->template->title = 'ريحانة | الفواتير';
        $this->registry->template->show('invoices');
    }

    public function addPayments() {
        $this->registry->template->title = 'ريحانة | اضافة دفعات';
        $this->registry->template->show('add_payment');
    }

    public function handle_invoice() {
        $errors = array();
        $products = Lists::products(1);
        $traders = Lists::traders(1);
        $invoice['info']['invoice_num'] = $_POST['invoice_num'];
        $invoice['info']['supplier'] = array_search($_POST['supplier'], $traders);
        $user_data = Login::get_instance()->get_data($_SESSION['user_info']['username']);
        $invoice['info']['invoice_creater'] = $user_data['sys_users_id'];
        $myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['contracted_date']);
        //$contracted = $myDateTime->format('Y-m-d');
        $invoice['info']['invoice_contract_date'] = $myDateTime->getTimestamp();
        $myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['delivery_date']);
        //$delivery = $myDateTime->format('Y-m-d');
        $invoice['info']['invoice_deliver_date'] = $myDateTime->getTimestamp();
        $invoice['info']['invoice_value'] = $_POST['total_price'];
        $invoice['info']['invoice_date'] = time();

        foreach ($_POST['product_name'] as $index => $val) {
            $invoice['products'][$index] =
                    array('product' => array_search($val, $products), 'invoice' => 1,
                        'quantity' => $_POST['quantity'][$index],
                        'unit_price' => $_POST['unit_price'][$index] * $_POST['quantity'][$index]);
        }

        $check = Operations::get_instance()->pre_validate($invoice['info'], 'purchasing_products_invoices');
        if (is_array($check)) {
            $errors['info'] = 1212; //Operations::get_instance()->generate_errors();
        }

        foreach ($invoice['products'] as $index => $product) {
            $check = Operations::get_instance()->pre_validate($product, 'purchasing_details');
            if (is_array($check)) {
                $errors['products'][$index] = 1111; //Operations::get_instance()->generate_errors();
            }
        }

        if (empty($errors)) {
            $invoice_id = Operations::get_instance()->init($invoice['info'], 'purchasing_products_invoices');
            foreach ($invoice['products'] as $index => $product) {
                $product['invoice'] = $invoice_id;
                Operations::get_instance()->init($product, 'purchasing_details');
            }
            echo 1;
        } else {
            $output = '';
            $output .= '<div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>خطأ فى اضافة الفاتورة</strong></div>';
            echo $output;
            return;
            foreach ($errors['info'] as $error) {
                $output .= '<div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>' . $error . '</strong></div>';
            }
            foreach ($errors['products'] as $index => $error) {
                $output .= '<div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>خطأ فى المنتج رقم #' . $index . '</strong></div>';
            }
        }
    }

    function handle_payments() {
        $errors = array();
        $payments = array();
        $invoice_id = $_POST['invoice_id'];
        $total_price = invoices::get_total_price($invoice_id);
        $total_payments = 0;
        foreach ($_POST['payment_amount'] as $index => $payment_amount) {
            $myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['payment_date'][$index]);
            $total_payments += $payment_amount;
            $payments[$index] = array(
                'invoice' => $invoice_id,
                'payment_amount' => $payment_amount,
                'payment_date' => $myDateTime->getTimestamp(),
            );
            $check = Operations::get_instance()->pre_validate($payments[$index], 'repayments');
            if (is_array($check)) {
                $errors['payments'][$index] = Operations::get_instance()->generate_errors();
            }
        }
        $check = ($total_price == $total_payments);
        if (!$check) {
            $errors['total_amount'] = 'error in payment';
        }


        if (empty($errors)) {
            foreach ($payments as $index => $array) {
                Operations::get_instance()->init($array, 'repayments');
            }
            echo 1;
        } else {
            $output .= '<div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>خطأ فى اضافة الدفع</strong></div>';
            echo $output;
        }
    }

    public function update_table() {
        $table_data = "";
        $table_array = array();
        if (empty($_POST['product_name'])) {
            echo '<tr><td colspan="5">لا توجد منتجات</tr>';
            return;
        }
        foreach ($_POST['product_name'] as $index => $value) {
            $table_array[] = array($index, $value, $_POST['quantity'][$index],
                $_POST['unit_price'][$index], $_POST['quantity'][$index] * $_POST['unit_price'][$index]);
        }

        $table_data_array = Temp::table_data($table_array, true);
        foreach ($table_data_array as $index => $value) {
            $table_data .= "<tr>\n";
            $table_data .= "$value";
            $table_data .= '
<td>
                                        <a href="#portlet-box" data-toggle="modal" class="btn blue icn-only product-edit"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only product-del"><i class="icon-remove icon-white"></i></a>
                                    </td>                
';
            $table_data .= "</tr>\n";
        }
        echo $table_data;
    }

    public function update_payments_table() {
        $table_data = "";
        $table_array = array();
        if (empty($_POST['payment_amount'])) {
            echo '<tr><td colspan="3">لا توجد دفعاتaa</tr>';
            return;
        }
        foreach ($_POST['payment_amount'] as $index => $value) {
            $table_array[] = array($index, $value, $_POST['payment_date'][$index]);
        }

        $table_data_array = Temp::table_data($table_array, true);
        foreach ($table_data_array as $index => $value) {
            $table_data .= "<tr>\n";
            $table_data .= "$value";
            $table_data .= '
<td>
                                        <a href="#portlet-box" data-toggle="modal" class="btn blue icn-only payment-edit"><i class="icon-edit icon-white"></i></a>
                                        <a href="#" class="btn red icn-only product-del"><i class="icon-remove icon-white"></i></a>
                                    </td>                
';
            $table_data .= "</tr>\n";
        }
        echo $table_data;
    }

}

?>
