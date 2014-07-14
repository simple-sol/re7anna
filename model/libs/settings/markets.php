<?php

//settings for the table 'stores'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'market_id',
    'fields' => array(
        'market_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'market_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'market_address' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'market_type' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
    ),
);