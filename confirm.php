<?php

var_dump($_POST);
// echo'<pre>';
// var_dump($_SERVER);
// echo'</pre>';

$vali_flg=false;
if($_POST){
    //バリデーション行う
    
    // var_dump($_POST);
    // exit;
    
    $vali_flg=true;

}else{
    // リダイレクト処理
    // header('Location: http://localhost/form.php');
    // exit;
}

?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
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
                        <?= $_POST['name'] ?>
                    </td>
                </tr>
            </table>
            <form action="./complete.php" method="post">
                <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
                <?php if(isset($_POST['id'])) { ?>
                <input type="hidden" name="id" value="<?= $_POST['id'] ?>">
                <?php } ?>
                    <div>
                    <button type="submit" >登録</button>
                    <a href="<?= $_SERVER['HTTP_REFERER'] ?>">戻る</a>
                    </div>
            </form>
        </div>
    </section>

</body>
</html>