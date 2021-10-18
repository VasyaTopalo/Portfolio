<?php
    header('HTTP/1.1 404 Not Found');
    $pageTitle = "Error 404";
    $pageContent = template('errors/v_error404');
