<?php

//settings for the table 'stores'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'store_id',
    'fields' => array(
        'store_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'store_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'store_address' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'store_type' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
    ),
);