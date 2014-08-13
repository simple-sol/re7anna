<?php

//settings for the table 'invoices'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'invoice_id',
    'fields' => array(
        'invoice_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'invoice_num' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'total_price' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
        'contracted_date' => array(
            'validations' => array(
                'notEmpty' => 1,
                'date' => 1,
            ),
        ),
        'delivery_date' => array(
            'validations' => array(
                'notEmpty' => 1,
                'date' => 1,
            ),
        ),
        'company_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
    ),
);