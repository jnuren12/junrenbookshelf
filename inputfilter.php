<?php

function _safe($str){
    $html_string = array("&amp;", "&nbsp;", "'", '"', "<", ">", "\t", "\r");
    $html_clear = array("&", " ", "&#39;", "&quot;", "&lt;", "&gt;", "&nbsp; &nbsp; ", "");
    $js_string = array("/<script(.*)<\/script>/isU");
    $js_clear = array("");
    $frame_string = array("/<frame(.*)>/isU", "/<\/fram(.*)>/isU", "/<iframe(.*)>/isU", "/<\/ifram(.*)>/isU",);
    $frame_clear = array("", "", "", "");
    $style_string = array("/<style(.*)<\/style>/isU", "/<link(.*)>/isU", "/<\/link>/isU");
    $style_clear = array("", "", "");
    $str = trim($str);
    //过滤字符串
    $str = str_replace($html_string, $html_clear, $str);
    //过滤JS
    $str = preg_replace($js_string, $js_clear, $str);
    //过滤ifram
    $str = preg_replace($frame_string, $frame_clear, $str);
    //过滤style
    $str = preg_replace($style_string, $style_clear, $str);
    return $str;
}
function commentsafe($str){
    $html_string = array(" ","\n", "\t", "\r", "'");
    $html_clear = array("&nbsp;","<br/>", "&nbsp; &nbsp; ", "","&quot;");
    $js_string = array("/<script(.*)<\/script>/isU");
    $js_clear = array("");
    $frame_string = array("/<frame(.*)>/isU", "/<\/fram(.*)>/isU", "/<iframe(.*)>/isU", "/<\/ifram(.*)>/isU",);
    $frame_clear = array("", "", "", "");
    $str = trim($str);
    //过滤字符串
    $str = str_replace($html_string, $html_clear, $str);
    //过滤JS
    $str = preg_replace($js_string, $js_clear, $str);
    //过滤ifram
    $str = preg_replace($frame_string, $frame_clear, $str);
    return $str;
}
?>