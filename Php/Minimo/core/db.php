<?php

function dbInstance() : PDO{
    static $db;
    if($db === NULL) {
        $db = new PDO('mysql:host=localhost;dbname=minimoDb;charset=utf8', 'root', '', [
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]);
    }
    return $db;
}

function dbQuery(string $sql, array $params = []) : PDOStatement {
    $db = dbInstance();
    $query = $db->prepare($sql);
    $query->execute($params);
    dbCheckError($query);

    return $query;
}
function dbCheckError($query) : bool{
    $errInfo = $query->errorInfo();
    if($errInfo[0] !== PDO::ERR_NONE) {
        echo $errInfo[2];
        exit();
    }
    return true;
}
