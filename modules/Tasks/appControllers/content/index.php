<div class="row">
  <div class="col-lg-12">
    <?php
    $categoryManager = new Ui\DataManager('Tasks\Task', 'manager');
    $categoryManager->draw([
        'filters' => [
            'task_status_id' => [
                'value' => [1,2]
            ]
        ]
    ]);
    ?>
  </div>
</div>