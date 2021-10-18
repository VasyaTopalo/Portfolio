<?php


$messages = messagesAll();

$pageTitle = "Main";
$pageContent = template('v_main', [
    'messages' => $messages
    ]);


