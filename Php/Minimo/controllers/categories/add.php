<?php

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        $fields = extractFields($_POST, ['name']);
        $validateErrors = categoriesValidate($fields);
        if (empty($validateErrors)) {
            addCategory($fields);
            header("Location: " . BASE_URL);
            exit();
        }
    }
    else {
        $fields = ['name' => ''];
        $validateErrors = [];
    }

    $pageTitle = "Add category";
    $pageContent = template('categories/v_category_form', [
        'title' => $pageTitle,
        'validateErrors' => $validateErrors
    ]);