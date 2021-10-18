<?php

    $id = (int)URL_PARAMS['id'];
    if(categoryCheckId($id)) {
        if($_SERVER['REQUEST_METHOD'] === 'POST') {
            $fields = ['name' => trim($_POST['name']) ?? ''];
            $validateErrors = categoriesValidate($fields);
            if (empty($validateErrors)) {
                updateCategory($id, $fields);
                header("Location: " . BASE_URL);
                exit();
            }
        }
        else {
            $validateErrors = [];
        }
        $category = getOneCategory($id);
        $pageTitle = "Edit category";
        $pageContent = template('categories/v_edit', [
            'validateErrors' => $validateErrors,
            'category' => $category
        ]);

    }
    else {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
    }

