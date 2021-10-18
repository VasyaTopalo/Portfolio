<?php

$pageTitle = "Admin panel";
$pageContent = template('admin/v_admin', [
    'user' => $user,
    'users' => usersAll(),
    'messages' => messagesAll(),
    'categories' => categoriesAll()
]);
