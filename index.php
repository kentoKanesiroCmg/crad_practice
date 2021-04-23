<?php
    require_once('./connection.php');

    //削除
    if(isset($_GET['delflg'])){
        if($_GET['delflg']==1 && $_GET['id'] > 0){
            $result = deleteTodoData($_GET['id']);
            if($result){
            }
        }
    }

    $dbdata = selectTodoData();

    if(isset($dbdata)){
        // echo '<pre>';
        // var_dump($dbdata);
        // echo '</pre>';
        $ary = $dbdata;
    }

?>

<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/reset.css">
        <link rel="stylesheet" href="./css/style.css">
        <title>home・一覧画面</title>
    </head>
    <body>
        <!-- header -->
        <?php  require_once('./part/header.php'); ?>
        <section>
            body
            <h2>一覧</h2>
            <div class="tableclass">
                <table>
                    <thead>
                        </thead>
                        <th>商品名</th>
                        <th></th>
                    <tbody>
                        <?php foreach($ary as $key => $value){ ?>
                            <tr>
                                <td>
                                    <?php if(isset($value['name'])) {?>
                                        <?= htmlspecialchars($value['name']) ?>
                                    <?php }?>
                                </td>
                                <td>
                                    <div class='f-right'>
                                    <a href="./form.php?id=<?= $value['id'] ?>"><button>更新</button></a>
                                    <a href="index.php?delflg=1&id=<?= $value['id'] ?>"><button>削除</button></a>
                                    </div>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <a class="form-button" href="./form.php"><button>入力画面へ</button></a>
                </div>
            </div>            
        </section>
        <!-- footer -->
        <?php  require_once('./part/footer.php'); ?>
    </body>
</html>
