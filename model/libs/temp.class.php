<?php

class Temp {

//here goes the patterns to use all over the script
//fully static class


    static function breadcrumb($page_name = '') {
        $output = <<<HERE
<ul class = "breadcrumb">
    <li>
        <i class = "icon-home"></i>
        <a href = "index.html">Home</a>
        <i class = "icon-angle-left"></i>
    </li>
    <li>
        <a href = "#">Data Tables</a>
        <i class = "icon-angle-left"></i>
    </li>
    <li><a href = "#">Editable Tables</a></li>
</ul>
HERE;
        return $output;
    }

    function editable_table() {
        
    }

    /* static function sys_comment_block($page_name = '') {
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
      } */
}