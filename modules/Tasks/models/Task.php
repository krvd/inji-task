<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tasks;

class Task extends \Model
{
    static $labels = [
        'name' => 'Task',
        'date_start' => 'Date start',
        'date_end' => 'Date end',
        'user_id' => 'Creator',
        'date_create' => 'Create date',
        'task_status_id' => 'Status',
        'project_id' => 'Project',
        'resp_user_id' => 'Responsible user',
        'description' => 'Description',
    ];
    static $cols = [
        'name' => ['type' => 'text'],
        'description' => ['type' => 'textarea'],
        'date_start' => ['type' => 'dateTime'],
        'date_end' => ['type' => 'dateTime'],
        'project_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'project'],
        'task_status_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'status'],
        'user_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'user'],
        'resp_user_id' => ['type' => 'select', 'source' => 'relation', 'relation' => 'responsible'],
    ];
    static $dataManagers = [
        'manager' => [
            'name' => 'Tasks',
            'cols' => ['name', 'project_id', 'task_status_id', 'date_start', 'date_end', 'user_id', 'resp_user_id', 'date_create'],
            'filters' => ['project_id', 'task_status_id', 'resp_user_id',],
            'rowButtonsWidget' => 'Tasks\Task/adminButtons'
        ]
    ];
    static $forms = [
        'manager' => [
            'name' => 'Task',
            'map' => [
                ['name'],
                ['date_start', 'date_end'],
                ['project_id', 'task_status_id'],
                ['resp_user_id'],
                ['description']
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
            'status' => [
                'model' => 'Tasks\Task\Status',
                'col' => 'task_status_id'
            ],
            'project' => [
                'model' => 'Tasks\Project',
                'col' => 'project_id'
            ],
            'responsible' => [
                'model' => 'Users\User',
                'col' => 'resp_user_id'
            ],
        ];
    }

    function beforeSave()
    {
        if (!$this->user_id)
            $this->user_id = \Users\User::$cur->id;
    }

}
