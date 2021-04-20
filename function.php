<?php

/**
* 文字列　バリデーション機能
*
* @param string $str
* @return bool 
*/
function validStr($str){
    
    if(empty($str)){
        $_SESSION['error_msg'] = '未入力は登録できません';
        return false;        
    }else{
        $strlength = mb_strlen($str);
        if($strlength > 10){
            $_SESSION['error_msg'] = '入力は10文字以内です。';
            return false;
        }else{
            return true;
        }

    }
}
