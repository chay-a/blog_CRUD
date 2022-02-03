<?php
$dbh = new PDO(    'mysql:host=127.0.0.1;dbname=MyBlog;charset=utf8mb4',
    'auriane',
    'x3K6zF6EDDTc8a#S*yV$N',
    array(
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_PERSISTENT => false
    )
);