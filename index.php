<?php

//git変更確認
//git変更確認を変更用に再変更します。



require_once('./config.php');
require_once('./connection.php');
require_once('./session.php');

if($_GET['delflg']==1) {
    deleteTodoData($_GET['id']);
}

$dbdata = selectTodoData();

if(isset($dbdata)){
    $ary = $dbdata;
}

?>

<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/style.css">
        <title>home・一覧画面</title>
    </head>
    <body>
        <section>
            <h2>一覧</h2>
            <div class="tableclass">
                <table>
                    <thead>
                        <th>商品名</th>
                    </thead>
                    <tbody>
                        <?php foreach($ary as $key => $value){ ?>
                            <tr>
                                <td>
                                    <?php if(isset($value['name'])) {?>
                                        <?= htmlspecialchars($value['name'],  ENT_QUOTES, "UTF-8") ?>
                                        <a class="form-button" href="./form.php?id=<?= $value['id'] ?>">更新</a>
                                        <a class="form-button" href="./index.php?delflg=1&id=<?= $value['id'] ?>">削除</a>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <a class="form-button" href="./form.php">入力画面へ</a>
                </div>
                <div>
                    <a class="form-button" href="./reform.php">変更画面へ</a>
                </div>
            </div>            
        </section>
    </body>
</html>