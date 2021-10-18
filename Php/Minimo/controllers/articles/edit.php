<?php
    $categories = categoriesAll();

    $id = (int)URL_PARAMS['id'];

    if ($id == NULL) {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
        exit();
    }

    if (messageCheckId($id)) {
        $fields = getOneMessage($id);

        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fields = extractFields($_POST, ['title', 'first_text', 'second_text', 'id_category']);
            $fields['main_image'] = prepareImage($_FILES['main_image']);
            $fields['second_image'] = prepareImage($_FILES['second_image']);

            $validateErrors = messagesValidate($fields);
            if (empty($validateErrors)) {
                updateMessage($id, $fields);
                header("Location: " . BASE_URL);
                exit();
            }
        }
        else {
            $validateErrors = [];
        }
        $pageTitle = "Edit article";
        $pageContent = template('articles/v_form', [
            'categories' => $categories,
            'fields' => $fields,
            'title' => $pageTitle,
            'validateErrors' => $validateErrors
        ]);
    }
    else {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
    }
