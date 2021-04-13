<?php
require_once('./config.php');
require_once('./connection.php');


// $_POST['name'] = 'なまえ';
selectTodoData();

if(isset($_POST)){
    createTodoData($_POST);

    // 登録処理

    // var_dump($_POST);
    // exit;

}


