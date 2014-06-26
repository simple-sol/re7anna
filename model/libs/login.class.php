<?php

session_start();

class login {

    private $user_data;
    private static $instance = NULL;

    static function get_instance() {
        if (self::$instance == NULL)
            self::$instance = new login();
        return self::$instance;
    }

    function log_in($user_data) {
        $status = $this->check_login($user_data);
        if ($status == 'valid') {
            echo 'here';
            if (isset($user_data['remember_me']))
                $expire = time() + (30 * 24 * 60 * 60);
            else
                $expire = time() + (2 * 60 * 60);
            $_SESSION['user_info'] = array('username' => $user_data['username'], 'password' => $user_data['password']);
            setcookie('site_id', session_id(), $expire, '/');
        }
        return $status;
    }

    function get_data($user_data) {
        if (!empty($this->user_data))
            return;
        if (empty($user_data))
            $user_data = isset($_SESSION['user_info']) ? $_SESSION['user_info'] : array();
        $username = isset($user_data['username']) ? $user_data['username'] : '';
        $password = isset($user_data['password']) ? $user_data['password'] : '';
        $table = db::$tables['sys_users'];
        $query = "SELECT * FROM $table WHERE `sys_users_name` = '$username' AND `sys_users_password` = '$password' LIMIT 1";
        $stmt = db::getInstance()->query($query);
        $result = db::getInstance()->fetchAll($stmt);
        $this->user_data = isset($result[0]) ? $result[0] : array();
    }

    function check_login($user_data = array()) {
        $this->get_data($user_data);
        print_r($this->user_data);
        if (empty($this->user_data))
            return 'invalid';
        else if ($this->user_data['is_blocked'] == 1)
            return 'blocked';
        else
            return 'valid';
    }

    function logout() {
        unset($_SESSION['user_info']);
        setcookie('site_id', session_id(), time() - 3600, '/');
    }

}