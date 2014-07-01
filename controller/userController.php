<?php

Class userController Extends baseController {

    public function index() {
        $this->registry->template->show('user_control');
    }

}

?>
