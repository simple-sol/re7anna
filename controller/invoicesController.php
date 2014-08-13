<?php

Class invoicesController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | الفواتير';
        //$this->registry->template->show('invoices');
    }

    public function addInvoice() {
        $this->registry->template->title = 'ريحانة | الفواتير';
        $this->registry->template->show('invoices');
    }

    public function handle_invoice() {
        $errors = array();
        $invoice['info']['invoice_id'] = $_POST['invoice_id'];
        $invoice['info']['invoice_num'] = $_POST['invoice_num'];
        $company_name = select::select_by_field(array('company_name' => $_POST['company_id']), 'perfume_company', '1');
        $invoice['info']['company_id'] = $company_name[0]['company_id'];

        $myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['contracted_date']);
        $contracted = $myDateTime->format('Y-m-d');
        $invoice['info']['contracted_date'] = $contracted;
        $myDateTime = DateTime::createFromFormat('m/d/Y', $_POST['delivery_date']);
        $delivery = $myDateTime->format('Y-m-d');
        $invoice['info']['delivery_date'] = $delivery;

        function insert_new_product($product_name) {
            return Operations::get_instance()->init(array('product_name' => $product_name), 'products_info');
        }

        foreach ($_POST['product_name'] as $index => $val) {
            $product_id =
                    select::select_by_field(array('product_name' => $_POST['product_name'][$index]), 'products_info', '1');
            $product_id = empty($product_name[0]['product_id']) ?
                    insert_new_product($_POST['product_name'][$index]) : $product_name[0]['product_id'];
            $invoice['products'][$index] =
                    array('product_id' => $product_id, 'invoice_id' => 1,
                        'quantity' => $_POST['quantity'][$index], 'price' => $_POST['total_price'][$index]);
        }
        $check = Operations::get_instance()->pre_validate($invoice['info'], 'invoices');
        if (is_array($check)) {
            $errors['info'] = Operations::get_instance()->generate_errors();
        }
        foreach ($invoice['products'] as $index => $product) {
            $check = Operations::get_instance()->pre_validate($product, 'invoices_products');
            if (is_array($check)) {
                $errors['products'][$index] = Operations::get_instance()->generate_errors();
            }
        }
        if (empty($errors))
            $invoice_id = Operations::get_instance()->init($invoice['info'], 'invoices');
        foreach ($invoice['products'] as $index => $product) {
            $product['invoice_id'] = $invoice_id;
            Operations::get_instance()->init($invoice['products'], 'invoices_products');
        }
    }

    public function update_table() {
        $table_data = "";
        $table_data_array = Temp::table_data(array(0 => array('1', 'product_name', '10', '22', '220')), true);
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
