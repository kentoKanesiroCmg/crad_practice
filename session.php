<?php
    ini_set( 'session.gc_maxlifetime', 86400);
    ini_set( 'session.gc_divisor', 1);
    // セッションスタート
    session_start();
    // phpinfo();

    $current_path = ltrim(parse_url($_SERVER['REQUEST_URI'])['path'],'/');
    $refe_path = ltrim(parse_url($_SERVER['HTTP_REFERER'])['path'],'/');

    if($current_path == 'form.php' && $refe_path == 'confirm.php' ){
        
    }else{
        if(isset($_SESSION['error_msg'])) unset($_SESSION['error_msg']);
    }
