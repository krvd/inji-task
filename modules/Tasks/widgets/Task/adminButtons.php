<?php
$user_id = \Users\User::$cur->id;

if ($item->task_status_id == 1) {
    ?>
    <a onclick="inji.Server.request({
                url: '/tasks/startTask/<?= $item->id; ?>',
                success: function () {
                  inji.Ui.dataManagers.reloadAll();
                }});
              return false;
       " href ='#' class="btn btn-xs btn-primary">Начать</a>
       <?php
   } elseif ($item->task_status_id == 2 && $item->resp_user_id = $user_id) {
       ?>
    <a onclick="inji.Ui.requestInfo({
                header: 'Tell about your results',
                'inputs': {
                  'results': {type: 'text', label: 'Results'}
                },
                btn: 'Complete'
              }, function (data) {
                inji.Server.request({
                  url: '/tasks/finishTask/<?= $item->id; ?>',
                  data: data,
                  success: function () {
                    inji.Ui.dataManagers.reloadAll();
                  }
                });
              });
              return false;
       " href ='#' class="btn btn-xs btn-primary">Завершить</a>
    <?php
}

\App::$cur->view->widget('Ui\DataManager/rowButtons', [
    'dataManager' => $dataManager,
    'item' => $item,
    'params' => $params
]);
