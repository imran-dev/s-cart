<?php

if (!function_exists('getSelectOptions')) {
    function getSelectOptions($selected = '', $array = ['Yes' => 'Yes', 'No' => 'No']) {
        $html = "";
        foreach ($array as $key => $value) {
            $selected = (($selected == $key) ? "selected" : "");
            $html .= "<option value=".$key." ".$selected.">";
            $html .= $value;
            $html .= "</option>";
        }
        return $html;
    }
}
