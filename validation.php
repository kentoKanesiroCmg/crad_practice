<?php
/**
* 文字数10文字未満と未記入のバリデーション機能
*
*/
// function validation_strlen($str,$str2 = ''){
function validation_strlen($str){
    if(empty($str)) {
        return false;
    }else {
        $stlength = mb_strlen($str);
        if($stlength > 50) {
            return false;
        }else {
            return true;
            }
    }
}