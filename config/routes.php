<?php
return [
    'default' => '/cow/list',
    'errors' => '/error',
    'css' => '/css',
    'fonts' => '/fonts',
    'js' => '/js',
    'routes' => [
        '/cow(/:action(/:id))' => [
            'controller' => '\Bovinetracker\Controller\Cows',
            'action' => 'list',
        ],
        '/error(/:message)' => [
            'controller' => '\Bovinetracker\Controller\Errors',
            'action' => 'index',
        ],
        '/:controller(/:action)' => [
            'controller' => '\Bovinetracker\Controller\:controller',
            'action' => 'index',
        ]
    ]
];