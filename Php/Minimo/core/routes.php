<?php

$routes = [
    //main
    [
        'url' => '/^$/',
        'controller' => 'main',
        'params' => []
    ],

    //posts
    [
        'url' => '/^article\/([1-9]+\d*)\/?$/',
        'controller' => 'articles/article',
        'params' => ['id' => 1]
    ],
    [
        'url' => '/^all\/page\/([1-9]+\d*)\/?$/',
        'controller' => 'articles/all',
        'params' => ['id' => 1]
    ],

    //category
    [
        'url' => '/^category\/all$/',
        'controller' => 'categories/all',
        'params' => []
    ],
    [
        'url' => '/^category\/([1-9]+\d*)\/?$/',
        'controller' => 'categories/category',
        'params' => ['id' => 1]
    ],

//    auth
    [
        'url' => '/^auth\/login\/?$/',
        'controller' => 'auth/login',
        'params' => []
    ],
    [
        'url' => '/^auth\/logout\/?$/',
        'controller' => 'auth/logout',
        'params' => []
    ],
    [
        'url' => '/^auth\/register\/?$/',
        'controller' => 'auth/register',
        'params' => []
    ]

];

if ($user !== null && $user['admin_status']) {
    $routes = array_merge($routes, [

        //admin panel
        [
            'url' => '/^adminpanel\/?$/',
            'controller' => 'admin/adminpanel',
            'params' => []
        ],
        //post
        [
            'url' => '/^article\/add\/?$/',
            'controller' => 'articles/add',
            'params' => []
        ],
        [
            'url' => '/^article\/edit\/([1-9]+\d*)\/?$/',
            'controller' => 'articles/edit',
            'params' => ['id' => 1]
        ],
        [
            'url' => '/^article\/delete\/([1-9]+\d*)\/?$/',
            'controller' => 'articles/delete',
            'params' => ['id' => 1]
        ],
        //category
        [
            'url' => '/^category\/add\/?$/',
            'controller' => 'categories/add',
            'params' => []
        ],
        [
            'url' => '/^category\/delete\/([1-9]+\d*)\/?$/',
            'controller' => 'categories/delete',
            'params' => ['id' => 1]
        ],
        [
            'url' => '/^category\/edit\/([1-9]+\d*)\/?$/',
            'controller' => 'categories/edit',
            'params' => ['id' => 1]
        ],
        //comments
        [
            'url' => '/^comment\/delete\/([1-9]+\d*)\/?$/',
            'controller' => 'comments/delete_comment',
            'params' => ['id' => 1]
        ],
    ]);
}

return $routes;

