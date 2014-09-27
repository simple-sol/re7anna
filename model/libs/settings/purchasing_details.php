<?php

//settings for the table 'invoices_products'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'id',
    'fields' => array(
        'id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'invoice' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'product' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'quantity' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'unit_price' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
    ),
);