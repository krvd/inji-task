<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tasks;

/**
 * Description of Project
 *
 * @author inji
 */
class Project extends \Model
{
    static $cols = [
        'name' => ['type' => 'text'],
        'task' => ['type' => 'dataManager', 'relation' => 'tasks'],
        'user_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'user'],
    ];
    static $dataManagers = [
        'manager' => [
            'name' => 'Projects',
            'cols' => ['name', 'task', 'user_id', 'date_create'],
        ]
    ];
    static $forms = [
        'manager' => [
            'name' => 'Project',
            'map' => [
                ['name'],
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
            'tasks' => [
                'type' => 'many',
                'model' => 'Tasks\Task',
                'col' => 'project_id'
            ],
        ];
    }

    function beforeSave()
    {
        $this->user_id = \Users\User::$cur->id;
    }

}
