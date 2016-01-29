<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TasksController
 *
 * @author inji
 */
class TasksController extends Controller
{
    function indexAction()
    {
        $this->view->page();
    }
    function startTaskAction($taskId = 0)
    {
        $task = Tasks\Task::get((int) $taskId);
        $result = new Server\Result();
        if ($task) {
            if ($task->task_status_id == 1) {
                $task->task_status_id = 2;
                $task->resp_user_id = \Users\User::$cur->id;
                $task->save();
                $result->successMsg = 'Задача начата';
                $result->send();
            } elseif ($task->task_status_id == 3) {
                $result->content = 'Задача уже завершена';
            } elseif ($task->task_status_id == 2) {
                $result->content = 'Задача уже выполняется';
            }
        } else {
            $result->content = 'Задача не найдена';
        }
        $result->success = false;
        $result->send();
    }

    function finishTaskAction($taskId = 0)
    {
        $task = Tasks\Task::get((int) $taskId);
        $result = new Server\Result();
        if ($task) {
            if ($task->resp_user_id != \Users\User::$cur->id)
                $result->content = 'Вы не работаете над этой задачей';
            else {
                if ($task->task_status_id == 2) {
                    $task->task_status_id = 3;
                    $task->date_end = date('Y-m-d H:i:s');
                    $task->save();
                    $result->successMsg = 'Задача выполнена!';
                    $result->send();
                } elseif ($task->task_status_id == 3) {
                    $result->content = 'Задача уже завершена';
                } elseif ($task->task_status_id == 1) {
                    $result->content = 'Задача еще ни кем не выполняется';
                }
            }
        }
        else
            $result->content = 'Задача не найдена';

        $result->success = false;
        $result->send();
    }

}
