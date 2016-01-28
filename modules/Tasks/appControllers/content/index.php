<div class="row">
  <div class="col-lg-4">
    <?php
    $categoryManager = new Ui\DataManager('Tasks\Project', 'manager', []);
    $categoryManager->draw();
    ?>
  </div>
  <div class="col-lg-8">
    <?php
    $categoryManager = new Ui\DataManager('Tasks\Task', 'manager', []);
    $categoryManager->draw();
    ?>
  </div>
</div>