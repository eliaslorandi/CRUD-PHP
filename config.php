<?php

$db_name = 'test'; //nome do próprio banco de dados
$db_host = 'localhost';
$db_user = 'root';
$db_pass = '';

$pdo = new PDO("mysql:dbname=".$db_name."; host=".$db_host, $db_user, $db_pass);
//$pdo = new PDO("mysql:dbname=test;host:localhost", "root", "");
//tanto faz, um ou outro
