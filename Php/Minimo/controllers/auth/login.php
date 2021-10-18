<?php

    $authWasCalled = isset($_POST['auth']);

    if($authWasCalled) {
        $login = trim($_POST['auth_login']);
        $password = trim($_POST['auth_password']);
        $remember = isset($_POST['remember']);
        $user = usersOne($login);


        if($user !== null && password_verify($password, $user['password'])) {
            $token = substr(bin2hex(random_bytes(128)), 0, 128);

            sessionsAdd($user['id_user'], $token);
            $_SESSION['token'] = $token;

            if ($remember) {
                setcookie('token', $token, time() + 3600 * 24 * 30, BASE_URL);
            }
            $authErr = false;
            header("Location: " . BASE_URL);
        }
        else {
            $user = null;
            $authErr = true;
        }


    }
    else {
        $authErr = false;
    }