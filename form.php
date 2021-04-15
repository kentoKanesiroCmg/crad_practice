<?php
// phpinfo();exit;


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
                            <input type="text" name="name" value="">
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" >確認</button>
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">戻る</a>
                </div>
            </form>
        </div>
    </section>

</body>
</html>