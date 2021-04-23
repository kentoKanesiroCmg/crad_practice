<?php
require_once('./connection.php');


if($_POST){

    var_dump($_POST);
    echo '<br>';

    try {
        
        if(isset($_POST['name']) && !validStr($_POST['name'])){
            throw new Exception("文字列バリデーション", 1);
        }    
        if(!validPass($_POST['password'])){
            throw new Exception("passバリデーション", 1);
        }

        if(isset($_POST['id'])){
            // ログイン処理
            $result = selectUserByidPassData($_POST);
            loginHeader($result,'ログイン');
        }else{
            // 新規登録処理
            $result = createUserData($_POST);
            loginHeader($result,'登録');

        }

        
    } catch (Exception $e) {
        echo $e->getMessage();
        // exit;
        if(isset($_POST['id'])){
            header('Location: http://localhost/login.php');
            exit;
        }
    }


}

?>


<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./css/reset.css">
    <link rel="stylesheet" href="./css/style.css">
    <title>ユーザー登録画面</title>
</head>
<body>
    <header>header</header>
    <section>
        <h2>ユーザー登録画面</h2>
        <div class="error-message">
            <?php if(isset($_SESSION['error_msg'])) {?>
                <?= $_SESSION['error_msg'] ?>
            <?php } ?>
        </div>
        <div class="tabellogin">
            <form action="" method="post">
                <table>
                    <tr>
                        <th>名前：</th>
                        <td>
                            <input type="text" name="name" value="">
                        </td>
                    </tr>
                    <tr>
                        <th>パスワード：</th>
                        <td>
                            <input type="text" name="password" value="">
                            <p style="font-size: 8px; text-align: right;">3文字以上10文字以内</p>
                        </td>
                    </tr>
                    <tr>
                        <th>性別</th>
                        <td>
                            <select name='sex'>
                                <option value="0"></option>
                                <option value="1">男性</option>
                                <option value="2">女性</option>
                                <option value="3">どちらでもない</option>
                            </select>
                        </td>
                    </tr>
                </table>
                <div>
                    <button type="submit" >登録</button>
                </div>
            </form>
        </div>
        <p>
            <a href="./login.php">ログイン画面</a>
        </p>
    </section>
    <!-- footer -->
    <?php  require_once('./part/footer.php'); ?>
</body>
</html>