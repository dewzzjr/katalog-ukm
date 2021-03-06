<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Laralum settings
    |--------------------------------------------------------------------------
    |
    | This are the base settings for laralum, make sure it's all correct.
    */
    'settings' => [
        'base_url'  => '/admin',
        'api_url'   => '/api',
    ],

    /*
    |--------------------------------------------------------------------------
    | Users settings
    |--------------------------------------------------------------------------
    |
    | This are the base settings for users, make sure it's all correct.
    */
    'superadmins' => [
        'admin@gmail.com',
    ],

    /*
    |--------------------------------------------------------------------------
    | Languages settings
    |--------------------------------------------------------------------------
    |
    | This are the current languages supported on laralum.
    */
    'languages' => ['en', 'es', 'ca', 'fr', 'de', 'it', 'ru'],

    /*
    |--------------------------------------------------------------------------
    | Laralum menu injector
    |--------------------------------------------------------------------------
    |
    | This array will be injected into the laralum menu, you can add everything
    | you want on it and it will be available at any page on laralum's menu.
    */
    'menu' => [
        [
            'title' => 'Admin Page',
            'items' => [
                [
                    'text' => 'Homepage',
                    'link' => '/',
                ],
                [
                    'text' => 'Users',
                    'link' => '/admin/user',
                ],
                [
                    'text' => 'Ukm',
                    'link' => '/admin/ukm',
                ],
                [
                    'text' => 'Products',
                    'link' => '/admin/product',
                ],
                [
                    'text' => 'Settings',
                    'link' => '/admin/setting',
                ],
            ],
        ],
    ],

];
