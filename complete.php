<?php
require_once('./connection.php');
// error_log(var_export($_POST,true));

if(isset($_POST['name'])){
    $str_flg = validStr($_POST['name']);
    if(!$str_flg){
        empty($_POST['id']) ? $param = '' : $param = '?id='.$_POST['id'] ;
        // リダイレクト処理
        header('Location: http://localhost/form.php'.$param);
        exit;
    }
}else{
    // リダイレクト処理
    header('Location: http://localhost/');
    exit;
}

$result = false;
if(empty($_POST['id'])){
    //新規登録
    $result = createTodoData($_POST);
}elseif($_POST['id']>0){
    // 更新
    $result = updateTodoData($_POST);
}

if($result){
    $comple_str = '完了しました。';
}else{
    $comple_str = '失敗しました';
}

?>
<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>完了画面</title>
</head>
<body>
    <section>
    <p>
    <?= $comple_str; ?>
    </p>
    <a href="./index.php">一覧画面に戻る</a>
    </section>
</body>
</html>
