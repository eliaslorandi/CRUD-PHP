<?php
require 'config.php';

//$id = filter_input(INPUT_POST, 'id');
$name = filter_input(INPUT_POST, 'name');
$email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

if($name && $email){

    $sql = $pdo->prepare("SELECT *FROM novosusuarios WHERE email = :email");
    $sql->bindvalue(':email', $email);
    $sql->execute();

    if($sql->rowCount() === 0){

        $sql = $pdo->prepare("INSERT INTO novosusuarios (nome, email) VALUES (:name, :email)");
        $sql->bindvalue(':name', $name);
        $sql->bindvalue(':email', $email);
        $sql->execute();

        header("Location: index.php");
        exit;
    }else{
        header("Location: add.php");
        exit;
    }
}else{
    header("Location: add.php");
    exit;
}