<?php

//git変更確認

require_once('./validation.php');
require_once('./session.php');

// var_dump($_POST);

foreach($_POST as $key => $value){
    if($key != 'id'){
    $post[] = $value;
    }
}
if(isset($_POST['name']) && isset($_POST['newname'])) {
    $str_flg = validation_strlen($post);
    if(!$str_flg) {
        header("Location: http://localhost/reform.php");
        exit;
    }
}
// echo'<pre>';
// var_dump($_SERVER);
// echo'</pre>';

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
                        <?= htmlspecialchars($_POST['name'],  ENT_QUOTES, "UTF-8") ?>
                    </td>
                    <th>変更後商品名：</th>
                    <td>
                        <?= htmlspecialchars($_POST['newname'],  ENT_QUOTES, "UTF-8") ?>
                    </td>
                </tr>
            </table>
            <form action="./complete.php" method="post">
            <input type="hidden" name="update" value="1">
            <input type="hidden" name="name" value="<?= htmlspecialchars($_POST['name'],  ENT_QUOTES, "UTF-8") ?>">
            <input type="hidden" name="newname" value="<?= htmlspecialchars($_POST['newname'],  ENT_QUOTES, "UTF-8") ?>">
            <div>
                <button type="submit" >登録</button>
                <a href="http://localhost/reform.php">戻る</a>
            </div>
            </form>
        </div>
    </section>

</body>
</html>