<?php

Class indexController Extends baseController {

    public function index() {
        $this->registry->template->welcome="try";
        $this->registry->template->title = " البرنامج | الصفحة الرئيسية";
        $this->registry->template->show('index');
    }

}
