<?php

require_once('./config.php');
require_once('./connection.php');
require_once('./session.php');

if(isset($_GET['id'])) {
    $result = selectTodoByIdData($_GET['id']);
}

// var_dump($_SESSION['error_msg']);

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>入力画面</title>
</head>
<body>
    <section>
        <div class="error_msg">
            <?php 
                if(isset($_SESSION['error_msg'])) {
                    foreach($_SESSION['error_msg'] as $value){
                        echo $value;
                    }
                }
            ?>
        </div>
        <div class="table">
            <form action="./confirm.php" method="post">
                <table>
                    <tr>
                        <th>商品名：</th>
                        <td>
                        <?php if(isset($result['id'])) {?>
                            <input type="text" name="name" value= "<?= htmlspecialchars($result['name'],  ENT_QUOTES, "UTF-8")?>">
                            <input type="hidden" name="id" value= "<?= htmlspecialchars($result['id'],  ENT_QUOTES, "UTF-8")?>">
                        <?php }else { ?>
                            <input type="text" name="name" value="">
                            <?php } ?>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" >確認</button>
                    <a href="http://localhost/index.php">戻る</a>
                </div>
            </form>
        </div>
    </section>

</body>
</html>