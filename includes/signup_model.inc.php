<?php

declare(strict_types=1);

function get_username(object $pdo, string $username){
    $query = "select username from users where username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->excute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function get_email(object $pdo, string $email){
    $query = "select username from users where email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->excute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}

function  set_user(object $pdo, string $pwd, string $username, string $email){
    $query = "insert into users(username, pwd, email) values 
    (:username, :pwd, :email);";
    $stmt = $pdo->prepare($query);
    $options = ['cost' => 12];
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT, $options);

    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":pwd", $pwd);
    $stmt->bindParam(":email", $email);
    $stmt->excute();
}