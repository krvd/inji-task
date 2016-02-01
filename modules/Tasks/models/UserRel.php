<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tasks;

class UserRel extends \Model
{
    static $cols = [
        'comment' => ['type' => 'text'],
        'user_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'user'],
        'project_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'project'],
    ];
    static $dataManagers = [
        'manager' => [
            'name' => 'Project Users',
            'cols' => ['comment', 'user_id', 'project_id', 'date_create'],
        ]
    ];
    static $forms = [
        'manager' => [
            'name' => 'ProjectUsers',
            'map' => [
                ['comment'],
                ['user_id', 'project_id'],
            ]
        ]
    ];

    static function relations()
    {
        return [
            'user' => [
                'model' => 'Users\User',
                'col' => 'user_id'
            ],
            'project' => [
                'model' => 'Tasks\Project',
                'col' => 'project_id'
            ],
        ];
    }
}
