<?php

//settings for the table 'customers'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'customer_id',
    'fields' => array(
        'customer_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'customer_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'customer_phone' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'customer_job' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'customer_age' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'customer_gender' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'customer_married' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'customer_job_period' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'customer_favorites_category' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'customer_favorites_type' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'customer_favorites_concentration' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
    ),
);