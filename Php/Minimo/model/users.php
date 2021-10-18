<?php

    function addUser(array $fields): bool {
        $sql = "INSERT users (login, password) VALUES (:reg_login, :reg_password)";
        dbQuery($sql, $fields);
        return true;
    }

    function usersAll() : array {
        $sql = "SELECT * FROM users";
        $query = dbQuery($sql);
        return $query->fetchAll();
    }

    function usersById(string $id) : ?array {
        $sql = "SELECT id_user, login, admin_status FROM `users` WHERE id_user=:id";
        $query = dbQuery($sql, ['id' => $id]);
        $user = $query->fetch();
        return $user === false ? null : $user;
    }
    function usersOne(string $login) : ?array {
        $sql = "SELECT id_user, password FROM `users` WHERE login=:login";
        $query = dbQuery($sql, ['login' => $login]);
        $user = $query->fetch();
        return $user === false ? null : $user;
    }
    function usersValidate(array &$fields) : array{
        $errors = [];

        if(mb_strlen($fields['reg_login'], 'UTF-8') <= 3 || mb_strlen($fields['reg_login'], 'UTF-8') >= 12) {
            $errors[] = "Login must be longer than 3 symbols and shorter than 12 symbols";
        }
        if(usersOne($fields['reg_login']) !== null) {
            $errors[] = "Login is already used";
        }
        if(mb_strlen($fields['reg_password'], 'UTF-8') < 6) {
            $errors[] = "Password must be longer than 5 symbols";
        }
        if(isset($fields['confirm_password'])) {
            if ($fields['reg_password'] !== $fields['confirm_password']) {
                $errors[] = "Passwords don't match";
            }
        }

        $fields['reg_login'] = htmlspecialchars($fields['reg_login']);
        $fields['reg_password'] = htmlspecialchars($fields['reg_password']);

        return $errors;
    }
