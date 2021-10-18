<?php
    $messages = messagesAll();
    $currantPage = (int)URL_PARAMS['id'];

    $pagesDivider = 8;
    $pagesAmount = floor(count($messages) / $pagesDivider);
    $pagesAmountForUrl = ceil(count($messages) / $pagesDivider);

    if ($currantPage > $pagesAmountForUrl) {
        header('HTTP/1.1 404 Not Found');
        $pageTitle = 'Error 404';
        $pageContent = template('errors/v_error404');
    }
    else {
        $pageTitle = 'All posts';
        $pageContent = template('articles/v_articles', [
            'messages' => $messages,
            'title' => $pageTitle,
            'pagesAmount' => $pagesAmount,
            'pagesAmountForButtons' => $pagesAmountForUrl,
            'currantPage' => $currantPage,
            'pagesDivider' => $pagesDivider
        ]);
    }

