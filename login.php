<?php

?>


<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザーログイン画面</title>
</head>
<body>
    <header>header</header>
    <section>
        <h2>ユーザーログイン画面</h2>
        <div class="error-message">
            <?php if(isset($_SESSION['error_msg'])) {?>
                <?= $_SESSION['error_msg'] ?>
            <?php } ?>
        </div>
        <div class="tabellogin">
            <form action="./register.php" method="post">
                <table>
                    <tr>
                        <th>ユーザーID：</th>
                        <td>
                            <input type="text" name="id" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>パスワード：</th>
                        <td>
                            <input type="password" name="password" value="">
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" >ログイン</button>
                </div>
            </form>
        </div>
        <p>
            <a href="./register.php">登録画面</a>
        </p>
    </section>
        <!-- footer -->
        <?php  require_once('./part/footer.php'); ?>
</body>
</html>