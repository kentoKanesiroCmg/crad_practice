<?php

/**
* 文字列　バリデーション機能
*
* @param string $str
* @return bool 
*/
function validStr($str){
    
    if(empty($str)){
        return false;        
    }else{
        $strlength = mb_strlen($str);
        if($strlength > 10){
            return false;
        }else{
            return true;
        }

    }
}
