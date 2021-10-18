<?php
    $id = (int)URL_PARAMS['id'];
    $id_article = commentById($id)['id_article'];
    commentsDeleteByCommentId($id);
    header("Location: " . BASE_URL . 'article/' . $id_article);