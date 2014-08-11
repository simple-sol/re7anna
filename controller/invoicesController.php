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
        $invoice['info']['invoice_id'] = $_POST['invoice_id'];
        $invoice['info']['invoice_num'] = $_POST['invoice_num'];
        $invoice['info']['company_id'] = $_POST['company_id'];
        $invoice['info']['contracted_date'] = $_POST['contracted_date'];
        $invoice['info']['delivery_date'] = $_POST['delivery_date'];
        foreach ($_POST['product_name'] as $index => $val) {
            $invoice['products'][$index] = array('product_name' => $val, // edit product_name into product_id
                'quantity' => $_POST['quantity'][$index], 'price' => $_POST['total_price'][$index]);
        }
        $check1 = Operations::get_instance()->pre_validate($invoice['info'], 'purchasing_invoices');
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
