<?php

$messages = messagesAll();
$categories = categoriesAll();

$pageTitle = 'All categories';
$pageContent = template('categories/v_all_categories', [
    'messages' => $messages,
    'title' => $pageTitle,
    'categories'=> $categories
]);