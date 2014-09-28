<?php

//lists options
class Lists {

    static function jobs() {
        return array(array('value' => 1, 'text' => 'بائع'));
    }

    static function trader_type() {
        return array(
            array('value' => 'customer', 'text' => 'عميل'),
            array('value' => 'supplier', 'text' => 'موزع'),
            array('value' => 'both', 'text' => 'عميل & موزع'),
        );
    }

    static function trader_category() {
        return array(
            array('value' => 'wholesaler', 'text' => 'تاجر جملة'),
        );
    }

    static function store_type() {
        return array(
            array('value' => '1', 'text' => ''),
        );
    }

    static function market_type() {
        return array(
            array('value' => '1', 'text' => ''),
        );
    }

    static function traders() {
        $table = db::$tables['traders'];
        $query = "SELECT * FROM $table";
        $stmt = db::getInstance()->query($query);
        $result = db::getInstance()->fetchAll($stmt);
        $traders = array();
        foreach ($result as $index => $array) {
            $traders[] = array('value' => $array['trader_id'], 'text' => $array['trader_company']);
        }
        return $traders;
    }

}