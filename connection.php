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


function createTodoData($post){

    if(empty($post['name'])){
        return false;
    }
    
    $dbh = connectPdo();
    // ------
    $sql = 'insert into test2 values(0,:name)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    // $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    // $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    // echo 'こここまで動いている';
    // exit;
    $stmt->execute();
    // var_dump($stmt);
    // exit;
    
    // exit;
    // var_dump($dbh);
}

function selectTodoData(){
    $dbh = connectPdo();
// ------
    $sql = 'select * from test2';
    $result = $dbh->query($sql)->fetchAll();
    return $result;
    // var_dump($result);
    // exit;
    
    // exit;
    // var_dump($dbh);
}

//UPDATE追加用に書いたもの
function updateTodoData($post){
    $dbh = connectPdo();
    $sql = 'update test2 set name=:newname where name=:name';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':newname',$post['newname'], PDO::PARAM_STR);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);

    $stmt->execute();

}