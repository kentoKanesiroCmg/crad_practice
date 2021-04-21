<?php

require_once('./config.php');
require_once('./connection.php');

if(isset($_GET['id'])) {
    $result = selectTodoByIdData($_GET['id']);
}

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
        <div class="table">
            <form action="./confirm.php" method="post">
                <table>
                    <tr>
                        <th>商品名：</th>
                        <td>
                        <?php if(isset($result['id'])) {?>
                            <input type="text" name="name" value= "<?= $result['name']?>">
                            <input type="hidden" name="id" value= "<?= $result['id']?>">
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