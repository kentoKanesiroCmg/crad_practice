<?php


// $AAA = ['a','b','c'];
// var_dump($AAA);
// echo $AAA[1];

// echo "<br>";
// $BBB = ['key1'=>'a','key2'=>'b','key3'=>'c'];
// var_dump($BBB);
// echo $BBB['key2'];



require_once('./config.php');
require_once('./connection.php');

$dbdata = selectTodoData();

if(isset($dbdata)){
    // echo '<pre>';
    // var_dump($dbdata);
    // echo '</pre>';
    $ary = $dbdata;
}



// $ary =[
//     0 =>[
//         'product'=>'歯磨き',
//         'price'=>'100',
//         'count'=>'5'
//     ],
//     1 =>[
//         'product'=>'歯磨き',
//         'price'=>null,
//         'count'=>'5'
//     ]
// ];

?>

<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="./css/style.css">
        <title>home・一覧画面</title>
    </head>
    <body>
        <section>
            <h2>一覧</h2>
            <div class="tableclass">
                <table>
                    <thead>
                        <th>商品名</th>
                    </thead>
                    <tbody>
                        <?php foreach($ary as $key => $value){ ?>
                            <tr>
                                <td>
                                    <?php if(isset($value['name'])) {?>
                                        <?= $value['name'] ?>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <a class="form-button" href="./form.php">入力画面へ</a>
                </div>
                <div>
                    <a class="form-button" href="./reform.php">変更画面へ</a>
                </div>
            </div>            
        </section>
    </body>
</html>