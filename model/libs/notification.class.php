<?php

class notification {

    private static $notification_details = array();

    static function add_notification($type = 'invoice', array $info) {
        self::$notification_details['notification_type'] = ($type == 'invoice') ? 1 : 2;
        self::$notification_details['is_deliverd'] = 0;
        self::$notification_details['state'] = 0;
        self::$notification_details['notification_time'] = time();

        //use info array to set up remaining fields below
        self::$notification_details['corresponding_id'] = 0;
        self::$notification_details['notification_sender'] = 0;
        self::$notification_details['notification_reciever'] = 0;


        Operations::get_instance()->init(self::$notification_details, 'notification_center');
    }

    static function update_notification(array $updates) { //contains notification_id to update
        Operations::get_instance()->init($updates, 'notification_center', 'update');
    }

}
