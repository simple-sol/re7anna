<?php

//settings for the table 'stores'
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
        'market_type' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'market_category' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric',
            ),
        ),
        'market_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'market_mac' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'storekeeper' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'market_info' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
    ),
);