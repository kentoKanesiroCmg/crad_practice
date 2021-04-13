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
                    <tr>
                        <th>値段：</th>
                        <td>
                            <input type="text" name="price" value="">
                        </td>
                    </tr>
                    <tr>
                    <th>個数：</th>
                        <td>
                            <input type="number" name="count" value="">
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" >確認</button>
                </div>
            </form>
        </div>
    </section>

</body>
</html>