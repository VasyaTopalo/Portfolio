<?php

function addMessages(array $fields): bool {
    $sql = "INSERT messages (title, first_text, second_text, main_image, second_image, id_category) VALUES (:title, :first_text, :second_text, :main_image, :second_image, :id_category)";
    dbQuery($sql, $fields);
    return true;
}

function messagesAll() : array {
    $sql = "SELECT * FROM messages ORDER BY dt_add DESC";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function recommendedMessages(int $id) : array {
    $messages = messagesAll();
    $recommendedMessages = [];

    foreach ($messages as $message) {
        if (count($recommendedMessages) === 3) break;
        else if($message['id_message'] != $id) $recommendedMessages[] = $message;
    }

    return $recommendedMessages;
}

function getOneCategoryMessages(int $id_category) : array {
    $sql = "SELECT * FROM messages WHERE id_category=:id_category";
    $query = dbQuery($sql, ['id_category' => $id_category]);
    return $query->fetchAll();
}

function getOneMessage(int $id) : array {
    $sql = "SELECT * FROM `messages` WHERE id_message=:id";
    $query = dbQuery($sql, ['id' => $id]);
    return $query->fetch();
}

function deleteMessage(int $id) : bool {
    $sql = "DELETE FROM `messages` WHERE id_message=:id";
    dbQuery($sql, ['id' => $id]);
    return true;
}

function deleteMessageByCategoryId(int $id_category) : bool {
    $sql = "DELETE FROM `messages` WHERE id_category=:id_category";
    dbQuery($sql, ['id_category' => $id_category]);
    return true;
}

function updateMessage(int $id, array $fields) : bool {
    $sql = "UPDATE messages SET title=:title, first_text=:first_text, second_text=:second_text, main_image= :main_image, second_image= :second_image, id_category=:id_category WHERE id_message=$id";
    dbQuery($sql, $fields);
    return true;
}

function messagesValidate(array &$fields) : array{
    $errors = [];
    if(mb_strlen($fields['title'], 'UTF-8') < 2 || mb_strlen($fields['title'], 'UTF-8') > 256) {
        $errors[] = "Title must be longer than 2 symbols and mustn't exceed 256 symbols!";
    }
    if(mb_strlen($fields['first_text'], 'UTF-8') > 10000 && mb_strlen($fields['second_text'], 'UTF-8') > 10000) {
        $errors[] = "Text mustn't exceed 10000 symbols";
    }
    $fields['title'] = htmlspecialchars($fields['title']);
    $fields['first_text'] = htmlspecialchars($fields['first_text']);
    $fields['second_text'] = htmlspecialchars($fields['second_text']);

    return $errors;
}

function messageCheckId(int $id) : bool{
    $sql = "SELECT COUNT(1) FROM messages WHERE id_message=:id";
    $query = dbQuery($sql, ['id' => $id]);
    return (bool)$query->fetch()["COUNT(1)"];
}