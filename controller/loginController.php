<?php

Class loginController Extends baseController {

    public function index() {
        $status = login::get_instance()->check_login();
        if ($status == 'blocked') {
            $this->registry->template->title = "ريحانة | تم إيقاف الحساب !";
            $this->registry->template->show('blocked');
        } else if ($status == 'valid') {
            $this->registry->template->title = "ريحانة | تم الدخول";
            $this->registry->template->show('login');
        } else {
            if ($_POST) {
                $user_data['username'] = mysql_real_escape_string($_POST['username']);
                $user_data['password'] = md5($_POST['password']);
                $status = login::get_instance()->log_in($user_data);
            } else {
                
            }
            $this->registry->template->title = "ريحانة | الدخول الى البرنامج";
            $this->registry->template->show('login');
        }
    }

    public function hello() {
        $this->registry->template->title = "ريحانة | الدخول الى البرنامج";
        $this->registry->template->show('login');
    }

}

?>
