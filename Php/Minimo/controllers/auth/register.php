<?php

    $regWasCalled = isset($_POST['register']);

    if($regWasCalled) {
        $fields = extractFields($_POST, ['reg_login', 'reg_password', 'confirm_password']);
        $validateErrors = usersValidate($fields);

        if (empty($validateErrors)) {
            unset($fields['confirm_password']);
            $fields['reg_password'] = password_hash($fields['reg_password'], PASSWORD_BCRYPT);
            addUser($fields);
            header("Location: ". BASE_URL);
            exit();
        }
        else {
            $registerErr = true;
        }

    }
    else {
        $fields = ['reg_login' => '', 'reg_password' => '', 'confirm_password' => ''];
        $validateErrors = [];
        $registerErr = false;
    }