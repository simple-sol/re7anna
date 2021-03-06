<?php

//settings for the table 'traders'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'trader_id',
    'fields' => array(
        'trader_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'trader_company' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'trader_company_address' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'trader_type' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'trader_category' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'Creditor' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
        'Debtor' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
    ),
);