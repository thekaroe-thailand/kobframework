<?php

//
// web path from /var/www/htdocs
//
define('PATH', '/kobframework-website');
define("CONNECT_DB", false);

//
// database
//
$db_provider = 'mysql';
$db_username = 'root';
$db_password = 'root';
$db_host = 'localhost';
$db_port = 3306;
$db_name = 'db_kobframework';

if (CONNECT_DB) {
    try {
        $db = new PDO("mysql:host=$db_host;dbname=$db_name;charset=utf8", $db_username, $db_password);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}