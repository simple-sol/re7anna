<?php

Class userController Extends baseController {

    public function index() {
        $this->registry->template->show('user_control');
    }

    public function stats() {
        $this->registry->template->welcome = 'viewing stats';
        $this->registry->template->show('index');
    }

}

?>
