<?php
require_once('./config.php');
require_once('./connection.php');

// echo $_POST->newname;


// $_POST['name'] = 'なまえ';
selectTodoData();
var_dump($_POST);

if(isset($_POST['update'])){
    //全更新
    updateTodoData($_POST);
    
}elseif(isset($_POST['id'])) {
    //一部更新
    updateTodoData2($_POST);

}else {
    //新規追加
    createTodoData($_POST);
}

?>
    <div>
        <a class="form-button" href="./index.php">TOP画面へ</a>
    </div>