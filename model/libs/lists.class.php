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

    static function traders($key = 0) {
        $table = db::$tables['traders'];
        $query = "SELECT * FROM $table";
        $stmt = db::getInstance()->query($query);
        $result = db::getInstance()->fetchAll($stmt);
        $traders = array();
        if ($key) {
            foreach ($result as $index => $array) {
                $traders[$array['trader_id']] = $array['trader_company'];
            }
        } else {
            foreach ($result as $index => $array) {
                $traders[] = array('value' => $array['trader_id'], 'text' => $array['trader_company']);
            }
        }
        return $traders;
    }

    static function products($key = 0) {
        $table = db::$tables['products'];
        $query = "SELECT * FROM $table";
        $stmt = db::getInstance()->query($query);
        $result = db::getInstance()->fetchAll($stmt);
        $products = array();
        if ($key) {
            foreach ($result as $index => $array) {
                $products[$array['product_id']] = $array['product_name'];
            }
        } else {
            foreach ($result as $index => $array) {
                $products[] = array('value' => $array['product_id'], 'text' => $array['product_name']);
            }
        }
        return $products;
    }

    static function users($key = 0) {
        $table = db::$tables['system_users'];
        $query = "SELECT * FROM $table";
        $stmt = db::getInstance()->query($query);
        $result = db::getInstance()->fetchAll($stmt);
        $users = array();
        if ($key) {
            foreach ($result as $index => $array) {
                $users[$array['sys_users_id']] = $array['sys_users_name'];
            }
        } else {
            foreach ($result as $index => $array) {
                $users[] = array('value' => $array['sys_users_id'], 'text' => $array['sys_users_name']);
            }
        }
        return $users;
    }

}