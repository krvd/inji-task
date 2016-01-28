<?php
return [
    'storage' => [
        'appTypeSplit' => '1',
        'appAdmin' => [
            'scheme' => [
                'Menu' => [
                    'ai' => '2'
                ],
                'Item' => [
                    'ai' => '8'
                ]
            ],
            'Menu' => [
                '0' => [
                    'id' => '1',
                    'name' => 'Меню боковой панели',
                    'code' => 'sidebarMenu'
                ]
            ],
            'Item' => [
                '0' => [
                    'id' => '4',
                    'type' => 'href',
                    'name' => 'Основные настройки',
                    'href' => '/admin/siteConfig',
                    'Menu_id' => '1'
                ],
                '1' => [
                    'id' => '1',
                    'type' => 'href',
                    'name' => 'Меню',
                    'href' => '/admin/menu',
                    'Menu_id' => '1'
                ],
                '2' => [
                    'id' => '2',
                    'type' => 'href',
                    'name' => 'Модули',
                    'href' => '/admin/modules',
                    'Menu_id' => '1'
                ],
                '3' => [
                    'id' => '3',
                    'type' => 'href',
                    'name' => 'Темы оформления',
                    'href' => '/admin/view',
                    'Menu_id' => '1'
                ],
                '4' => [
                    'id' => '5',
                    'type' => 'href',
                    'name' => 'Выход',
                    'href' => '?logout',
                    'Menu_id' => '1'
                ],
                '5' => [
                    'name' => 'Пользователи',
                    'href' => '/admin/users/user',
                    'Menu_id' => '1',
                    'parent_id' => '0',
                    'id' => '6'
                ],
                '6' => [
                    'name' => 'Соц. сети',
                    'href' => '/admin/users/social',
                    'Menu_id' => '1',
                    'parent_id' => '6',
                    'id' => '7'
                ]
            ]
        ]
    ]
];