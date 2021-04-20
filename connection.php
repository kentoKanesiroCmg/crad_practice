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
