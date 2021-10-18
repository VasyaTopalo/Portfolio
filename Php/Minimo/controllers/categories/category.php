<?php

    $id = (int)URL_PARAMS['id'];

    if (categoryCheckId($id)) {
        $messages = getOneCategoryMessages($id);
        $pageTitle = ucfirst(getOneCategory($id)['name']);
        $pageContent = template('categories/v_category', [
            'messages' => $messages,
            'title' => $pageTitle,
            'categoryName' => getOneCategory($messages[0]['id_category'])['name']
        ]);
    }
    else {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
    }