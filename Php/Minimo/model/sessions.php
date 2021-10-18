<?php

    function sessionsAdd(int $idUser, string $token): bool {
        $sql = "INSERT sessions (id_user, token) VALUES (:id, :token)";
        dbQuery($sql, ['id' => $idUser, 'token' => $token]);
        return true;
    }

    function sessionsOne(string $token): ?array {
        $sql = "SELECT * FROM sessions WHERE token=:token";
        $query = dbQuery($sql, ['token' => $token]);
        $session = $query->fetch();
        return $session === false ? null : $session;
    }