<?php

Class transController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | التحويلات';
        $this->registry->template->show('advanced_table');
    }

    public function addtrans() {
        $this->registry->template->title = 'ريحانة | التحويلات';
        $this->registry->template->show('invoices_trans');
    }

    public function handle_trans() {
        $errors = array();

        $products = Lists::products(1);
        $users = Lists::users(1);
        $user_data = Login::get_instance()->get_data($_SESSION['user_info']['username']);
        $invoice['info']['invoice_creator'] = $user_data['sys_users_id'];
        $invoice['info']['invoice_recipient'] = array_search($_POST['recipient'], $users);
        $invoice['info']['invoice_date'] = time();

        foreach ($_POST['product_name'] as $index => $val) {
            $invoice['products'][$index] =
                    array('product_id' => array_search($val, $products), 'invoice' => 1,
                        'product_quantity' => $_POST['quantity'][$index]);
        }

        $check = Operations::get_instance()->pre_validate($invoice['info'], 'invoices_transmission');
        if (is_array($check)) {
            $errors['info'] = 1212; //Operations::get_instance()->generate_errors();
            print_r($check);
        }

        foreach ($invoice['products'] as $index => $product) {
            $check = Operations::get_instance()->pre_validate($product, 'invoice_transmissions_details');
            if (is_array($check)) {
                $errors['products'][$index] = 1111; //Operations::get_instance()->generate_errors();
            }
        }

        if (empty($errors)) {
            $invoice_id = Operations::get_instance()->init($invoice['info'], 'invoices_transmission');
            foreach ($invoice['products'] as $index => $product) {
                $product['invoice'] = $invoice_id;
                Operations::get_instance()->init($product, 'invoice_transmissions_details');
            }
            echo 1;
        } else {
            $output = '';
            $output .= '<div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>خطأ فى اضافة الفاتورة</strong></div>';
            echo $output;
            return;
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
            $table_array[] = array($index, $value, $_POST['quantity'][$index]);
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

}

?>
