<?php

$dsn="mysql:host=localhost;dbname=coopervision;charset=utf8";

$pdo=new PDO(
    $dsn,
    "root",
    "",
    [
        PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION
    ]
);
?>