<?php

Class employeeController Extends baseController {

    public function index() {
        $this->registry->template->title = 'ريحانة | الموظفين';
        $this->registry->template->show('emp_control');
    }

    function emp_edit() {
        if ($_POST['emp_id'] == 'null') {
            $op_type = 'insert';
        } else {
            $op_type = 'update';
        }

        $check = Operations::get_instance()->init($_POST, 'employee', $op_type);
        if (is_array($check)) {
            echo 'failure!';
        } else {
            echo "success!";
        }
    }

    function emp_del() {
        $check = Operations::get_instance()->init($_POST, 'employee', 'delete');
        if (is_array($check)) {
            echo 'failure!';
        } else {
            echo "success!";
        }
    }

}

?>
