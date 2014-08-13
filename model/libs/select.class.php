<?php

class select {

    static function select_by_field($field = array(), $table_name, $limit = '') {
        $table = db::$tables[$table_name];
        $col_name = key($field);
        $col_val = $field[$col_name];
        $limit = (empty($limit)) ? '' : "LIMIT $limit";
        $query = "SELECT * FROM $table WHERE `$col_name` = '$col_val' $limit";
        $result = db::getInstance()->fetchRows($query);
        return $result;
    }

}
