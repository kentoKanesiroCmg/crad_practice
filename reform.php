<?php

//git変更確認　パート２

require_once('./config.php');
require_once('./connection.php');
require_once('./session.php');

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/style.css">
    <title>変更画面</title>
</head>
<body>
    <section>
        <div class="error_msg">
            <?php 
                if(isset($_SESSION['error_msg'])) {
                    foreach($_SESSION['error_msg'] as $value){
                        echo $value;
                        echo '<br>';
                    }
                }
            ?>
        </div>
        <div class="table">
            <form action="./reconfirm.php" method="post">
                <table>
                    <tr>
                        <th>変更前商品名：</th>
                        <td>
                            <input type="text" name="name" value="">
                        </td>
                        <th>変更後商品名：</th>
                        <td>
                            <input type="text" name="newname" value="">
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