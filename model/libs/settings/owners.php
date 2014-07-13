<?php

//settings for the table 'owners'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'owner_id',
    'fields' => array(
        'owner_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'owner_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'owner_proportion' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
    ),
);