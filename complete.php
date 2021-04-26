<?php
require_once('./config.php');
require_once('./session.php');
require_once('./connection.php');
require_once('./validation.php');

// var_dump($_POST);
// exit;

foreach($_POST as $key => $value){
    if($key != 'id'){
    $post[] = $value;
    }
}

if(isset($_POST['name']) && isset($_POST['newname'])) {
    $str_flg = validation_strlen($post);
    if(!$str_flg) {
        header("Location: http://localhost/reform.php");
        exit;
    }
}elseif(isset($_POST['name'])) {
        $str_flg = validation_strlen($post);
        if(!$str_flg) {
        empty($_POST['id']) ? $param = '' : $param = '?id='.$_POST['id'];
        header("Location: http://localhost/form.php".$param);
        exit;
    }
}else {
    header('Location: http://localhost/index.php');
    exit;
    }
// echo $_POST->newname;


// $_POST['name'] = 'なまえ';
selectTodoData();
// var_dump($_POST);

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