<?php
    ini_set( 'session.gc_maxlifetime', 86400);
    ini_set( 'session.gc_divisor', 1);
    ini_set( 'session.save_path', './session/');
    // セッションスタート
    session_start();
    // phpinfo();
    $current_path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'],'/');
    if(!empty($_SESSION['login_id'])){
        
        if($current_path == 'login.php' || $current_path == 'register.php'){
            // リダイレクト処理
            header('Location: http://localhost/');
            exit;             
        }
    }else{

        if(!($current_path == 'login.php' || $current_path == 'register.php')){
            // リダイレクト処理
            header('Location: http://localhost/login.php');
            exit;        
        }
    }

    $refe_path = ltrim(parse_url($_SERVER['HTTP_REFERER'])['path'],'/');     
    if($current_path == 'form.php' && $refe_path == 'confirm.php' ){
        
    }else{
        if(isset($_SESSION['error_msg'])) unset($_SESSION['error_msg']);
    }
