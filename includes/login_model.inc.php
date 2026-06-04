<?php

declare(strict_type=1);

function get_user(object $pdo, string $username){
    $query = "select * from users where username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindPara(":username", $username);
    $stmt->excute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}