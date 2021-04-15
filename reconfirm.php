<?php
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
    <title>変更画面</title>
</head>
<body>
    <section>
        <div class="table confirm">
            <h4>変更内容は以下でよろしいでしょうか？</h4>
            <table>
                <tr>
                    <th>変更前商品名：</th>
                    <td>
                        <?= $_POST['name'] ?>
                    </td>
                    <th>変更後商品名：</th>
                    <td>
                        <?= $_POST['newname'] ?>
                    </td>
                </tr>
            </table>
            <form action="./complete.php" method="post">
            <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
            <input type="hidden" name="newname" value="<?= $_POST['newname'] ?>">
            <div>
                <button type="submit" >登録</button>
                <a href="<?= $_SERVER['HTTP_REFERER'] ?>">戻る</a>
            </div>
            </form>
        </div>
    </section>

</body>
</html>