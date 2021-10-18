<?php

function addCategory(array $fields): bool {
    $sql = "INSERT categories (name) VALUES (:name)";
    dbQuery($sql, $fields);
    return true;
}

function categoriesAll() : array {
    $sql = "SELECT * FROM categories ORDER BY id_category DESC";
    $query = dbQuery($sql);
    return $query->fetchAll();
}

function getOneCategory(int $id) : array {
    $sql = "SELECT * FROM `categories` WHERE id_category=:id";
    $query = dbQuery($sql, ['id' => $id]);
    return $query->fetch();
}

function updateCategory(int $id, array $fields) : bool {
    $sql = "UPDATE categories SET name=:name WHERE id_category=$id";
    dbQuery($sql, $fields);
    return true;
}

function categoriesValidate(array &$fields) : array{
    $errors = [];
    if(mb_strlen($fields['name'], 'UTF-8') < 2 || mb_strlen($fields['name'], 'UTF-8') > 12) {
        $errors[] = "Title must be longer than 2 symbols and shorter than 12 symbols";
    }
    $fields['name'] = htmlspecialchars($fields['name']);
    return $errors;
}

function categoryCheckId(int $id) : bool{
    $sql = "SELECT COUNT(1) FROM categories WHERE id_category=:id";
    $query = dbQuery($sql, ['id' => $id]);
    return (bool)$query->fetch()["COUNT(1)"];
}

function deleteCategory(int $id_category) : bool {
    $sql = "DELETE FROM `categories` WHERE id_category=:id_category";
    dbQuery($sql, ['id_category' => $id_category]);
    return true;
}