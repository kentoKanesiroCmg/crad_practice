<?php
function connectPdo(){
    try {
        return new PDO(DNS,DB_USER,DB_PASS);
    } catch (PDOException $e) {
        echo 'えらーーーーーーー';
        echo $e->getMessage();
        exit;
    }
}


function createTodoData($post){
    $dbh = connectPdo();
    $sql = 'insert into test (name) values(:name)';
    $stmt = $dbh->prepare($sql);
    $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    // $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    // $stmt->bindValue(':name',$post['name'], PDO::PARAM_STR);
    $stmt->execute();
    var_dump($stmt);
    exit;
    
    // exit;
    // var_dump($dbh);
}

function selectTodoData(){
    $dbh = connectPdo();
    $sql = 'select * from test';
    $result = $dbh->query($sql)->fetchAll();
    var_dump($result);
    exit;
    
    // exit;
    // var_dump($dbh);
}

