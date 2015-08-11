<?php
return [
    'default' => '/cow/list',
    'errors' => '/error/:code',
    'routes' => [
        '/cow(/:action(/:id))' => [
            'controller' => '\Bovinetracker\Controller\Cows',
            'action' => 'list',
        ],
        '/:controller(/:action)' => [
            'controller' => '\Bovinetracker\Controller\:controller',
            'action' => 'index',
        ]
    ]
];