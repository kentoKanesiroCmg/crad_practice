<?php
require_once('./validation.php');

if(isset($_POST['name'])) {
    $str_flg = validation_strlen($_POST['name']);
    if(!$str_flg) {
        empty($_POST['id']) ? $param = '' : $param = '?id='.$_POST['id'];
        header("Location: http://localhost/form.php".$param);
        exit;
    }
}else {
    header('Location: http://localhost/index.php');
    exit;
}

// var_dump($_POST);
// // echo'<pre>';
// // var_dump($_SERVER);
// // echo'</pre>';

// $vali_flg=false;
// if($_POST){
//     //バリデーション行う
    
//     // var_dump($_POST);
//     // exit;
    
//     $vali_flg=true;

// }else{
//     // リダイレクト処理
//     // header('Location: http://localhost/form.php');
//     // exit;
// }

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
                        <?= htmlspecialchars($_POST['name'],  ENT_QUOTES, "UTF-8") ?>
                    </td>
                </tr>
            </table>
            <form action="./complete.php" method="post">
                <input type="hidden" name="name" value="<?= $_POST['name'] ?>">
                <?php if(isset($_POST['id'])) { ?>
                <input type="hidden" name="id" value="<?= htmlspecialchars($_POST['id'],  ENT_QUOTES, "UTF-8") ?>">
                <?php } ?>
                    <div>
                    <button type="submit" >登録</button>
                    <a href="http://localhost/form.php">戻る</a>
                    </div>
            </form>
        </div>
    </section>

</body>
</html>