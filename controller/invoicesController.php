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

    public function edit_invoice_info() {
        session_start();
        $_SESSION['invoice']['invoice_info'] = $_POST;
    }

    public function edit_invoice_product() {
        session_start();
        $_SESSION['invoice']['invoice_products'] = $_POST;
    }

    public function update_invoice_info() {
        session_start();
        $_SESSION['invoice_info']['invoice_num'] = 'I am ok man';
        echo $_SESSION['invoice_info']['invoice_num'];
    }

    public function update_table() {
        $table_data = "";
        $table_data_array = Temp::table_data(array(0 => array('1','product_name','10','22','220')), true);
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
