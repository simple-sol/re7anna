<?php

Class transController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | التحويلات';
        $this->registry->template->show('advanced_table');
    }

    public function add_trans() {
        if ($_POST) {
            $transmition_info = array(
                'invoice_date' => time(),
                'invoice_recipient' => '',
                'invoice_creator' => '',
                'invoice_reason' => '',
                'invoice_state' => '',
                'parent' => '',
            );
            $id = Operations::get_instance()->init($transmition_info, 'invoices_transmission');

            foreach ($products as $product_info) {
                $transmition_details = array(
                    'product_id' => $product_info,
                    'product_quantity' => $product_info,
                    'invoice' => $id,
                );
                Operations::get_instance()->init($transmition_details, 'invoices_transmission_details');
            }
        }
    }

    public function addtrans() {
        $this->registry->template->title = 'ريحانة | التحويلات';
        $this->registry->template->show('invoices_trans');
    }

    public function handle_trans() {
        $errors = array();
        $user_data = Login::get_instance()->get_data($_SESSION['user_info']['username']);
        $invoice['info']['invoice_creator'] = $user_data['sys_users_id'];
        $invoice['info']['invoice_recipient'] = $_POST['recipient'];
        $invoice['info']['invoice_date'] = time();

        foreach ($_POST['product_name'] as $index => $val) {
            $invoice['products'][$index] =
                    array('product_id' => 1, 'invoice' => 1,
                        'product_quantity' => $_POST['quantity'][$index]);
        }

        $check = Operations::get_instance()->pre_validate($invoice['info'], 'invoices_transmission');
        if (is_array($check)) {
            $errors['info'] = 1212; //Operations::get_instance()->generate_errors();
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
                echo 1;
            }
        } else {
            $output = '';
            $output .= '<div class="alert alert-error">
                <button class="close" data-dismiss="alert"></button>
                <strong>خطأ فى اضافة التحويل</strong></div>';
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

}

?>
