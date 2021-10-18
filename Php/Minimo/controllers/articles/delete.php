<?php

    $id = (int)URL_PARAMS['id'];

    if ($id == NULL) {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
        exit();
    }

    if (messageCheckId($id)) {
        deleteMessage($id);
        commentsDeleteByArticleId($id);
        header("Location: " . BASE_URL);
        exit();
    }
    else {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
    }
