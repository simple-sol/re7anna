<?php

//settings for the table 'products_info'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'product_id',
    'fields' => array(
        'product_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'product_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
    ),
);