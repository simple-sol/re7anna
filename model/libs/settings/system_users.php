<?php

//settings for the table 'sys_users'
//validations contains validation method names and their parameters if they exist

return array(
    'key' => 'sys_users_id',
    'fields' => array(
        'sys_users_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'equalTo' => array('null')
            ),
        ),
        'sys_users_name' => array(
            'validations' => array(
                'notEmpty' => 1,
                'alphaNumeric' => 1,
            ),
        ),
        'sys_users_password' => array(
            'validations' => array(
                'notEmpty' => 1,
                'alphaNumeric' => 1,
            ),
        ),
        'sys_users_type' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'is_blocked' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'user_info' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
    ),
);