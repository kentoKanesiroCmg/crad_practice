<?php
/**
* 文字数10文字未満と未記入のバリデーション機能
*
*/
// function validation_strlen($str,$str2 = ''){
// function validation_strlen($str){
//     if(empty($str)) {
//         $_SESSION['error_msg'] = '商品名が未入力です。';
//         return false;
//     }else {
//         $stlength = mb_strlen($str);
//         if($stlength > 50) {
//             $_SESSION['error_msg'] = '商品名の文字数が50文字を超えています。';
//             return false;
//         }else {
//             return true;
//             }
//     }
// }

function validation_strlen($ary){
    if(count($ary) == 0) {
        return false;
    }else {
        $result = true;
        foreach($ary as $key => $value){
            if(empty($value)){
                $_SESSION['error_msg'][] = '未入力は登録できません';
                $result = false;        
            }else{
                $strlength = mb_strlen($value);
                if($strlength > 50){
                    $_SESSION['error_msg'][] = '入力は50文字以内です。';
                    $result = false;
                }else{
                }
            }
        }
        return $result;
    }
}

