<div class="container">
  <div class="row">
    <div class="col-md-12">
      <nav class="navbar navbar-default" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Навигация</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="/"><?php echo App::$cur->config['site']['name']; ?></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
          <ul class="nav navbar-nav">
            <?php
            $projectCount = Tasks\Project::getCount();
            ?>
            <li><a onclick='inji.Ui.dataManagers.popUp("Tasks\\Project", {})' href ="#" role="button"><?= $projectCount; ?> <?= Tools::getNumEnding($projectCount, ['Проект', 'Проекта', 'Проектов']); ?></a></li>
            <?php
            $this->widget('Menu\menu');
            ?>
          </ul>
          <?php
          if (!\Users\User::$cur->id) {
              ?>
              <ul class="nav navbar-nav navbar-right">
                <li><a href="/users/registration">Регистрация</a></li>
                <li><a href="/users/login">Войти</a></li>
              </ul>
              <?php
          } else {
              ?>
              <ul class="nav navbar-nav navbar-right">
                <li class="usertab dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?= \Users\User::$cur->name(); ?> <span class="glyphicon glyphicon-user pull-right"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/users/cabinet"><span class="glyphicon glyphicon-cog pull-right"></span>Личный кабинет</a></li>
                    <li class="divider"></li>
                    <li><a href="?logout"><span class="glyphicon glyphicon-log-out pull-right"></span>Выйти</a></li>
                  </ul>
                </li>
              </ul>
              <?php
          }
          ?>
        </div>
        <!--/.navbar-collapse -->
      </nav>
    </div>
  </div>
</div>