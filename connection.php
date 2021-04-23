<?php
require_once('./session.php');
require_once('./config.php');
require_once('./function.php');

function connectPdo(){
    try {
        return new PDO(DNS,DB_USER,DB_PASS,OPTION);
    } catch (PDOException $e) {
        echo 'えらーーーーーーー';
        echo $e->getMessage();
        exit;
    }
}

/**
* テストテーブルに新規作成する
*
* @param array $post   
*/
function createTodoData($post){
    $dbh = connectPdo();
    $sql = 'insert into test (id,name,del_flg)values(0,:name,0)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $result = $stmt->execute();
    return $result;
}


/**
* テストテーブルから全取得する
*
*/
function selectTodoData(){
    $dbh = connectPdo();
    $sql = 'select * from test';
    $stmt = $dbh->query($sql);
    $result = $stmt->fetchAll();
    return $result;
}

/**
* テストテーブルからidを指定して取得
*
* @param int|string $id
*/
function selectTodoByIdData($id){
    $dbh = connectPdo();
    $sql = 'select * from test where id = :id';

    // $stmt = $dbh->query($sql);
    // $result = $stmt->fetchAll();
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    
    
    return $result;
}


/**
* 指定したidに一致するテストテーブルのレコードを更新する
*
* @param array $post 
*/
function updateTodoData($post){
    $dbh = connectPdo();
    $sql = 'update test set name = :name where id = :id and del_flg = 0';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $stmt->bindValue(':id',(int)$post['id'], PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
}


/**
* 指定したidに一致するテストテーブルのレコードを物理削除するする
*
* @param array $post 
*/
function deleteTodoData($id){
    $dbh = connectPdo();
    $sql = 'delete from test where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
}


/**
* ユーザーテーブルに新規作成する
*
* @param array $post
* @return array $result
*/
function createUserData($post){
    //パスワードのハッシュ化
    $hash_pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $dbh = connectPdo();
    $sql = 'insert into user (id,name,password,sex,del_flg)values(0,:name,:password,:sex,false)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $stmt->bindValue(':password',$hash_pass, PDO::PARAM_STR);
    $stmt->bindValue(':sex',$post['sex'], PDO::PARAM_INT);
    $result['result'] = $stmt->execute();
    $result['id'] = $dbh->lastInsertId(); 
    return $result;

}
/**
* ログイン処理
*
* @param array $post
* @return array $result
*/
function selectUserByidPassData($post){
    //パスワードのハッシュ化
    $dbh = connectPdo();
    $sql = 'select * from user where id=:id and del_flg = false';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',$post['id'], PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    
    $ary =['result'=>false];
    if(isset($result)){
        $result_hash = password_verify($post['password'],$result['password']);
        if($result_hash){
            $ary =['result'=>true,'id'=>$result['id']];
        }
    }

    return $ary;
}

/**
* セッション情報からログインユーザー名を取得する
*
* @return string
*/
function getLoginUser(){
    $login_user="";
    if(isset($_SESSION['login_id'])){
        $dbh = connectPdo();
        $sql = 'select name from user where id=:id and del_flg = false';
        $stmt = $dbh->prepare($sql);
        $stmt->bindValue(':id',$_SESSION['login_id'], PDO::PARAM_INT);
        $stmt->execute();
        $login_user = $stmt->fetch();
    }
    return $login_user['name'];
}