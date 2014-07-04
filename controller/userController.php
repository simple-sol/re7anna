<?php

Class userController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | الموظفين';
        $this->registry->template->show('user_control');
    }

    function emp_edit() {
        print_r($_POST);
    }

}

?>
