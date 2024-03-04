<?php

//
// web path from /var/www/htdocs
//
$webPath = '/kobframework-website';

//
// database
//
$db_provider = 'mysql';
$db_username = 'root';
$db_password = 'root';
$db_host = 'localhost';
$db_port = 3306;
$db_name = 'db_kobframework';

try {
    $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo $e->getMessage();
}