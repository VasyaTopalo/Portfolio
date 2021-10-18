<?php


function addEmail(string $email): bool {
    $sql = "INSERT emails (email) VALUES (:email)";
    dbQuery($sql, ['email' => $email]);
    return true;
}

function emailsAll() : array {
    $sql = "SELECT * FROM emails";
    $query = dbQuery($sql);
    return $query->fetchAll();
}


function emailCheck(string $email) : bool{
    $sql = "SELECT COUNT(1) FROM emails WHERE email=:email";
    $query = dbQuery($sql, ['email' => $email]);
    return (bool)$query->fetch()["COUNT(1)"];
}

function sendEmail(string $email) : bool {
    $from = "example@gmail.com";
    $subject = "Hi!\n We have new post!";

    $subject = "=?utf-8?B?".base64_encode($subject)."?=";
    $headers = "From: $from\r\nReply-no: $from\r\nContent-type:text/plain; charset=utf-8\r\n";
    mail($email, $subject, "Hi!", $headers);
}