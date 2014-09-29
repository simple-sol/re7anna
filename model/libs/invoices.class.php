<?php

class invoices {

    static function get_total_price($invoice_id) {
        $total_price =
                select::select_by_field(array('invoice_id' => intval($invoice_id)), 'purchasing_products_invoices', '1');
        return $total_price[0]['invoice_value'];
    }

}