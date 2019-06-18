<?php

return [
    'role_structure' => [
        'super_admin' => [
            'books' => 'c,r,u,d',
            'languages' => 'c,r,u,d',
            'translators' => 'c,r,u,d',
        ],
        'translator' => [

        ],
    ],
    'permission_structure' => [

    ],

    'permissions_map' => [
        'c' => 'create',
        'r' => 'read',
        'u' => 'update',
        'd' => 'delete'
    ]
];
