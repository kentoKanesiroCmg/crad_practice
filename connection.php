<?php
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
* 新規作成
*
*/
function createTodoData($post){
    if(empty($post['name'])){
        return false;
    }
    
    $dbh = connectPdo();
    $sql = 'insert into test2 values(0,:name,0)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $stmt->execute();
}

/**
* テストテーブルから全取得
*
*/
function selectTodoData(){
    $dbh = connectPdo();
    $sql = 'select * from test2 where del_flg = 0';
    $result = $dbh->query($sql)->fetchAll();
    return $result;
}

/**
* テストテーブルの該当する商品名一括更新
*
*/
function updateTodoData($post){
    $dbh = connectPdo();
    $sql = 'update test2 set name=:newname where name=:name and del_flg = 0';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':newname',$post['newname'], PDO::PARAM_STR);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $stmt->execute();
}

/**
* テストテーブルからidを指定して取得
*
*/
function selectTodoByIdData($id){
    $dbh = connectPdo();
    $sql = 'select * from test2 where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':id',(int)$id, PDO::PARAM_INT);
    $stmt->execute();
    $result = $stmt->fetch();
    return $result;
}

/**
* idで指定されたものを更新
*
*/
function updateTodoData2($post){
    $dbh = connectPdo();
    $sql = 'update test2 set name = :name where id = :id';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $stmt->bindValue(':id',(int)$post['id'], PDO::PARAM_INT);
    $result = $stmt->execute();
    return $result;
}

/**
* idで指定されたものを削除
*
*/
function deleteTodoData($id){
    $dbh = connectPdo();
    // // 物理削除
    // $sql = 'delete from test2 where id = :id';

    //論理削除
    $sql = 'update test2 set del_flg = 1 where id = :id';

    $stmt = $dbh->prepare($sql);
    $stmt->bindvalue(':id',(int)$id,PDO::PARAM_INT);
    $stmt->execute();
}

