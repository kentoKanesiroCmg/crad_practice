<?php

// phpinfo();
define('DNS', 'mysql:dbname=test2;host=localhost;charset=utf8mb4');
define('DB_USER','root');
define('DB_PASS', 'kento0903');

define('OPTION', [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);

//  へんこう
