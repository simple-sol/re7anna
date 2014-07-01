<?php

class Temp {

//here goes the patterns to use all over the script
//fully static class

    static function sys_comment_block($page_name = '') {
        $output = <<<HERE
<input type = "hidden" name = "page_name" value = "$page_name" />
<div class = "control-group">
    <label class = "control-label">تعليق</label>
    <div class = "controls">
        <textarea class = "span6 m-wrap" rows = "3"></textarea>
    </div>
</div>
<div class = "form-actions">
    <button type = "submit" class = "btn blue">تعليق</button>
</div>
HERE;
        return $output;
    }

}