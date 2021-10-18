<?php

    function addComment(array $fields): bool {
        $sql = "INSERT comments (id_article, id_user, username, text) VALUES (:id_article, :id_user, :username, :text)";
        dbQuery($sql, $fields);
        return true;
    }
    function commentsValidate(array &$fields) : array{
        $errors = [];
        if(mb_strlen($fields['text'], 'UTF-8') > 1000) {
            $errors[] = "Text must be shorter than 1000 symbols";
        }
        $fields['text'] = htmlspecialchars($fields['text']);

        return $errors;
}

    function commentsAll(int $id_article) : array {
        $sql = "SELECT * FROM comments WHERE id_article=:id_article ORDER BY dt_add DESC";
        $query = dbQuery($sql, ['id_article'=>$id_article]);
        return $query->fetchAll();
    }
    function commentsDeleteByArticleId(int $id) :bool {
        $sql = "DELETE FROM `comments` WHERE id_article=:id";
        dbQuery($sql, ['id' => $id]);
        return true;
    }
    function commentsDeleteByCommentId(int $id) :bool {
        $sql = "DELETE FROM `comments` WHERE id_comment=:id";
        dbQuery($sql, ['id' => $id]);
        return true;
    }
    function commentById(int $id) :array {
        $sql = "SELECT * FROM `comments` WHERE id_comment=:id";
        $query = dbQuery($sql, ['id' => $id]);
        return $query->fetch();
    }