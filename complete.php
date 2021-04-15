<?php
require_once('./config.php');
require_once('./connection.php');

// echo $_POST->newname;


// $_POST['name'] = 'なまえ';
selectTodoData();
var_dump($_POST);

if(isset($_POST->name)){
    createTodoData($_POST);
    
    // echo('aaaaaaaaaaaaaaa');
    // exit;
    // 登録処理

    // var_dump($_POST);
    // exit;

}

if(isset($_POST->newname)){
    updateTodoData($_POST);
    
    // echo('aaaaaaaaaaaaaaa');
    // exit;
    // 登録処理

    // var_dump($_POST);
    // exit;

}
?>
    <div>
        <a class="form-button" href="./index.php">TOP画面へ</a>
    </div>