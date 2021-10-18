<?php
    session_start();

    include_once "init.php";

    $user = authGetUser();
    $pageCanonical = HOST . BASE_URL;

    $pageTitle = 'Error 404';
    $pageContent = '';

    if (strpos($_SERVER['REQUEST_URI'], BASE_URL . 'index') === 0) {
        header('HTTP/1.1 404 Not Found');
        $pageContent = template('errors/v_error404');
    }
    else {
        $routes = include ('core/routes.php');
        $url = $_GET['querysystemurl'] ?? '';
        $routerRes = parseUrl($url, $routes);
        $controllerName = $routerRes['controller'];
        define('URL_PARAMS', $routerRes['params']);

        $urlLen = strlen($url);
        if ($urlLen > 0 && $url[$urlLen - 1] == '/')
            $url = substr($url, 0, $urlLen - 1);

        $pageCanonical .= $url;

        $path = "controllers/$controllerName.php";

        //Перевірка існування файла та коректності імені
        if (file_exists($path)) {
            include_once($path);
        }
        else {
            //fatal error
            exit();
        }
    }

    $authErr = '';
    $registerErr = '';

    if($_SERVER['REQUEST_METHOD'] === 'POST') {
        if(isset($_POST['email'])) {
            $email = trim($_POST['email']);
            if(!emailCheck($email)) {
                addEmail($email);
            }
        }
        else {
            include_once "controllers/auth/login.php";
            include_once "controllers/auth/register.php";
        }
    }


    echo template('base/v_main', [
        'title' => $pageTitle,
        'content' => $pageContent,
        'canonical' => $pageCanonical,
        'categories' => categoriesAll(),
        'user' => $user,
        'authErr' => $authErr,
        'registerErr' => $registerErr,
        'validateErrors' => $validateErrors ?? ''
    ]);


if($authErr) {
    echo "
    <script>
        jQuery(function($){
           $('#sign-in-modal').css('display', 'flex');
           });
    </script>";
}

if($registerErr) {
    echo "
    <script>
        jQuery(function($){
           $('#sign-up-modal').css('display', 'flex');
           });
    </script>";
}

