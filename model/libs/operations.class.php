<?php

class Operations {

    private $data;
    private $table_name;
    private $op_type;
    private $clause;
    private $settings;
    private $validations = array();
    private $checks = array();
    private static $instance = null;

    static function get_instance() {
        if (self::$instance == null)
            self::$instance = new operations ();
        return self::$instance;
    }

    function init($data, $table_name, $op_type = 'insert', $clause = '') {
        $this->data = $data;
        $this->op_type = $op_type;
        $this->table_name = $table_name;
        $this->clause = $clause;
        $this->grab_settings();
        $this->validate();
        if (!in_array(null, $this->validations))
            $this->{$this->op_type}();
    }

    function grab_settings() {
        //file exists check should be implemented here
        $this->settings = include './settings/' . $this->table_name . '.php';
    }

    function validate() {
        foreach ($this->data as $field => $value) {
            $validations = $this->settings['fields'][$field]['validations'];
            $valid = array();
            foreach ($validations as $validation => $specs) {
                $params[0] = $value;
                if (is_array($specs)) {
                    foreach ($specs as $spec)
                        $params[] = $spec;
                }
                $obj = new Validation();
                $valid[$validation] = forward_static_call_array(array('validation', $validation), $params);
            }
            $this->checks[$field] = $valid;
            $this->validations[$field] = !in_array(null, $valid);
        }
        print_r($this->validations);
        print_r($this->checks);
    }

    function insert() {
        $columns = '';
        $values = '';
        foreach ($this->data as $field => $value) {
            $columns[] = "`$field`";
            $values[] = "'$value'";
        }
        $query = "INSERT INTO " . db::$tables[$this->table_name]
                . " (\n" . join(",\n", $columns) . "\n) VALUES (\n" . join(",\n", $values) . "\n)";
        echo $query;
    }

    function update() {
        $updates = '';
        foreach ($this->data as $field => $value) {
            $updates[] = "`$field` = '$value'";
        }
        $query = "UPDATE " . db::$tables[$this->table_name]
                . " \nSET " . join(",\n", $updates) . "\n" . $this->clause;
        echo $query;
    }

}

//operations::get_instance()->init(array('sys_users_id' => 'hellboyon@gmail.com', 'sys_users_name' => 'abdou'), 'sys_users');