<?php


?>

<footer>
    <div class="f-left">footer</div>
    <?php if(isset($_SESSION['login_id'])){?>
        <div class="f-right">
            <a href="./logout.php">
                <button>ログアウト</button>
            </a>
        </div>
    <?php }?>
</footer>
