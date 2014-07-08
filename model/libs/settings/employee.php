<?php

//settings for the table 'employee'
//validations contains validation method names and their parameters if they exist

return array(
    'fields' => array(
        'emp_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
            'key' => 1,
        ),
        'emp_name' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'emp_email' => array(
            'validations' => array(
                'notEmpty' => 1,
                'email' => 1,
            ),
        ),
        'emp_job_id' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'emp_salary' => array(
            'validations' => array(
                'notEmpty' => 1,
                'decimal' => 1,
            ),
        ),
        'emp_address' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
        'emp_married' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'has_kids' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'emp_gender' => array(
            'validations' => array(
                'notEmpty' => 1,
                'numeric' => 1,
            ),
        ),
        'emp_birthdate' => array(
            'validations' => array(
                'notEmpty' => 1,
                'date' => 1,
            ),
        ),
        'emp_certificate' => array(
            'validations' => array(
                'notEmpty' => 1,
            ),
        ),
    ),
);