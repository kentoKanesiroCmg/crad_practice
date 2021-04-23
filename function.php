<?php

/**
* 登録・ログイン結果によって遷移処理
*
* @param array $result
* @param string $msg
*/
function loginHeader($result,$msg){
    if($result['result']){
        //セッションハイジャック対策
        session_regenerate_id(true);

        $_SESSION['login_id'] = $result['id'];
        // リダイレクト処理
        header('Location: http://localhost/');
        exit;
    }else{
        throw new Exception($msg."エラー", 1);
    }

}

/**
* ログアウトする
*
*/
function logout() {
    if(isset($_SESSION['login_id'])){
    
        //セッションクッキーの削除
        if (isset($_COOKIE["PHPSESSID"])) {
            setcookie("PHPSESSID", '', time() - 1800, '/');
        }
        
        //セッション変数を全て解除
        $_SESSION = array();
        // unset($_SESSION['login_id']);
        session_destroy();
    
        // リダイレクト処理
        header('Location: http://localhost/login.php');
        exit;
    }
    
}

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
        if($strlength > 30){
            $_SESSION['error_msg'] = '入力は10文字以内です。';
            return false;
        }else{
            return true;
        }

    }
}

/**
* パスワード　バリデーション機能
*
* @param string $pass
* @return bool 
*/
function validPass($pass){
    // 半角英数3文字衣装
    if(preg_match('/\A[a-z\d]{3,100}+\z/i',$pass)){
        return true;        
    }else{
        $_SESSION['error_msg'] = 'エラーメッセージ';
        return false;
    }
}

