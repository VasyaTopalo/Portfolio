<?php

    if($user === null) {
        header('Location: ' . BASE_URL . 'auth/login');
    }


    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['title', 'first_text', 'second_text', 'id_category']);
        $fields['main_image'] = prepareImage($_FILES['main_image']);
        $fields['second_image'] = prepareImage($_FILES['second_image']);

        $validateErrors = messagesValidate($fields);
        if (empty($validateErrors)) {
            addMessages($fields);
//            $emails = emailsAll();
//            foreach ($emails as $email) {
//                sendEmail($email['email']);
//            }
            header("Location: ". BASE_URL);
            exit();
        }
    }
    else {
        $fields = ['title' => '', 'first_text' => '', 'second_text' => '', 'main_image' => '', 'second_image' => ''];
        $validateErrors = [];
    }

    $pageTitle = "Add article";
    $pageContent = template('articles/v_form', [
        'categories' => categoriesAll(),
        'fields' => $fields,
        'title' => $pageTitle,
        'validateErrors' => $validateErrors
    ]);
