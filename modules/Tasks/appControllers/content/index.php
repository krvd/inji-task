<div class="row">
  <div class="col-lg-12">
    <?php
    $categoryManager = new Ui\DataManager('Tasks\Task', 'manager', []);
    $categoryManager->draw();
    ?>
  </div>
</div>