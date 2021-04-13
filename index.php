<?php





$ary =[
    0 =>[
        'product'=>'歯磨き',
        'price'=>'100',
        'count'=>'5'
    ],
    1 =>[
        'product'=>'歯磨き',
        'price'=>null,
        'count'=>'5'
    ]
];

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
                        <th>値段</th>
                        <th>個数</th>
                    </thead>
                    <tbody>
                        <?php foreach($ary as $key => $value){ ?>
                            <tr>
                                <td>
                                    <?php if(isset($value['product'])) {?>
                                        <?= $value['product'] ?>
                                    <?php }?>
                                </td>
                                <td>
                                    <?php if(!empty($value['price'])) {?>
                                        <?= $value['price'] ?>円
                                    <?php }else{?>
                                        0円
                                    <?php }?>
                                </td>
                                <td>
                                    <?php if(isset($value['count'])) {?>
                                        <?= $value['count'] ?>
                                    <?php }?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <a class="form-button" href="./form.php">入力画面へ</a>
                </div>
            </div>            
        </section>
    </body>
</html>