<?php
require_once('./config.php');
require_once('./connection.php');

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
