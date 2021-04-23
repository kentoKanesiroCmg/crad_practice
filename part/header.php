<?php 

$login_user = getLoginUser();
// var_dump($login_user);
// exit;

?>

<header>
    <div class="f-left">header</div>
    <div class="f-right">ユーザー名：<?= htmlspecialchars($login_user) ?></div>
</header>
