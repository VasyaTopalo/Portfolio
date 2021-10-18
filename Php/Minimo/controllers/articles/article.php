<?php
    $id = (int)URL_PARAMS['id'];

    if (messageCheckId($id)) {
        $message = getOneMessage($id);
        $category = getOneCategory($message['id_category']);

        //Коментарі
        if($_SERVER['REQUEST_METHOD'] === 'POST' && $user !== null) {

            $fields = [
                'id_article' => $id,
                'id_user' => $user['id_user'],
                'username' => $user['login'],
                'text' => trim($_POST['text'])
            ];
            $validateErrors = commentsValidate($fields);

            if (empty($validateErrors)) {
                addComment($fields);
                header("Location: ". BASE_URL . "article/$id");
                exit();
            }
            else {
                $commentErr = true;
            }

        }
        else {
            $fields = ['id_user' => '', 'id_article' => '', 'comment' => ''];
            $validateErrors = [];
            $commentErr = false;
        }

        $comments = commentsAll($id);
        $recommendedMessages = recommendedMessages($id);

        $pageTitle = $message['title'];
        $pageContent = template('articles/v_article', [
            'message' => $message,
            'category' => $category,
            'recommendedMessages' => $recommendedMessages,
            'id' => $id,
            'user' => $user,
            'commentErr' => $commentErr,
            'validateErrors' => $validateErrors,
            'comments' => $comments,
            'commentsAmount' => count($comments)
        ]);
    }
    else {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
    }




