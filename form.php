<?php
require_once('./connection.php');

$update_flg=false;
if(isset($_GET['id']) && $_GET['id']>0){
    $result = selectTodoByIdData($_GET['id']);
    $update_flg=true;
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
                <div class="error-message">
                    <?php if(isset($_SESSION['error_msg'])) {?>
                        <?= $_SESSION['error_msg'] ?>
                    <?php } ?>
                </div>
                    <tr>
                        <th>商品名：</th>
                        <td>
                        <?php if($update_flg == true){ ?>
                            <input type="hidden" name="id" value="<?= $result['id'] ?>">
                            <input type="text" name="name" value="<?= $result['name'] ?>">
                        <?php }else{ ?>
                            <input type="text" name="name" value="">
                        <?php } ?>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" >確認</button>
                    <button><a href="/">戻る</a></button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>