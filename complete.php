<?php
require_once('./config.php');
require_once('./connection.php');

// echo $_POST->newname;


// $_POST['name'] = 'なまえ';
selectTodoData();
var_dump($_POST);

if(empty($_POST['update'])){
    createTodoData($_POST);
    
    // echo('aaaaaaaaaaaaaaa');
    // exit;
    // 登録処理

    // var_dump($_POST);
    // exit;

}else {
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