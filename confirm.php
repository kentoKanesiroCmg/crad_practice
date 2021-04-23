<?php
    require_once('./connection.php');

    $submit_str = '新規登録';
    $pram_id= '';
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['id'])){
            $submit_str = '更新';
            $pram_id = '?id='.$_POST['id'];
        }
    }else{
        // リダイレクト処理
        header('Location: http://localhost/index.php');
        exit;
    }

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>確認画面</title>
</head>
<body>
    <section>
        <div class="table confirm">
            <h4>入力値は以下でよろしいでしょうか？</h4>
            <table>
                <tr>
                    <th>商品名：</th>
                    <td>
                        <?= htmlspecialchars($_POST['name']) ?>
                    </td>
                </tr>

            </table>
            <form action="./complete.php" method="post">
            <?php if(!empty($_POST['id'])){?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($_POST['id']) ?>">
            <?php }?>
            <input type="hidden" name="name" value="<?= htmlspecialchars($_POST['name']) ?>">            
            <div>
                <button type="submit" ><?= $submit_str ?></button>
                <a href="./form.php<?= $pram_id ?>"><button type="button">戻る</button></a>
            </div>
            </form>
        </div>
    </section>

</body>
</html>