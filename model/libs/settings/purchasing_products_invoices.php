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
        'invoice_value' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
        'invoice_contract_date' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'invoice_deliver_date' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'supplier' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'invoice_date' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'invoice_parent' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'state' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'invoice_reason' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'invoice_creater' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
    ),
);