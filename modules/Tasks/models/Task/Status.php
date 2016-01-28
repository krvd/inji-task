<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Tasks\Task;

class Status extends \Model
{
    static $cols = [
        'name' => ['type' => 'text']
    ];
    static $dataManagers = [
        'manager' => [
            'cols' => ['name']
        ]
    ];
    static $forms = [
        'manager' => [
            'map' => [
                ['name']
            ]
        ]
    ];

}
