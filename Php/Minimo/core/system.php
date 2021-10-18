<?php

function template(string $path, array $vars = []): string {
    $fullPath = "views/$path.php";
    extract($vars);
    ob_start();
    include ($fullPath);
    return ob_get_clean();
}

function parseUrl(string $url, array $routes):array {
    $matches = [];

    $res = [
      'controller' => 'errors/e404',
        'params' => []
    ];
    foreach ($routes as $route) {
        if (preg_match($route['url'], $url, $matches)) {
            foreach ($route['params'] as $name => $num) {
                $res['params'][$name] = $matches[$num];
            }
            $res['controller'] = $route['controller'];
            break;
        }
    }
    return $res;
}
