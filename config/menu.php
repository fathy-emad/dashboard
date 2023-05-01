<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Application Menu
    |--------------------------------------------------------------------------
    |
    | This collection creates the menu. Each item can be a route or URL.
    | To add a submenu, include a children array with the same structure.
    |
    */

    'dashboard' => [
        'route' => 'home',
        'icon' => 'ti ti-home',
    ],

    'utilities' => [
        'icon' => 'ti ti-clipboard',
        'children' => [
            'memo' => [
                'route' => 'memos.index',
            ],
            'qr-code' => [
                'route' => 'qr-code.index',
            ],
        ],
    ],

    'configuration' => [
        'icon' => 'ti ti-settings',
        'children' => [
            'profile' => [
                'route' => 'profile.edit',
            ],
            'language' => [
                'route' => 'language.index',
            ],
        ],
    ],
];
