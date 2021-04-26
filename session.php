<?php

/* セッションのデータ削除が実行されるまで1日（86400s）後に設定 */
ini_set('session.gc_maxlifetime' ,86400);

/* セッションのデータ削除が実行される確率の分母の設定 */
ini_set('session.gc_divisor' ,1);

// セッション開始
session_start();

// ini_setの設定内容が更新されていることを確認するため
// phpinfo();

$current_path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'],'/');
// var_dump($current_path);

$refe_path = ltrim(parse_url($_SERVER['HTTP_REFERER'])['path'],'/');
// var_dump($refe_path);

if(($current_path == 'form.php' && $refe_path == 'form.php') || ($current_path == 'reform.php' && $refe_path == 'reform.php') ) {

}else{
    if(isset($_SESSION['error_msg'])){
        unset($_SESSION['error_msg']);
    }
}




// function validation_strlen($str){
//     if(empty($str)) {
//         return false;
//     }else {
//         $stlength = mb_strlen($str);
//         if($stlength > 50) {
//             return false;
//         }else {
//             return true;
//             }
//     }
// }