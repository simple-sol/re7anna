<?php

Class userController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | الموظفين';
        $this->registry->template->show('user_control');
    }

    function emp_edit() {
        if ($_POST['emp_id'] == 'null') {
            $op_type = 'insert';
        } else {
            $op_type = 'update';
        }

        Operations::get_instance()->init($_POST, 'employee', $op_type);
    }

}

?>
