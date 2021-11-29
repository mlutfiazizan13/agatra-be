<?php

/* @var $this \yii\web\View */
/* @var $content string */

use backend\assets\AppAsset;
use common\widgets\Alert;
use yii\bootstrap4\Breadcrumbs;
use yii\bootstrap4\Html;
use yii\helpers\Url;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">

<head>
  <meta charset="<?= Yii::$app->charset ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <?php $this->registerCsrfMetaTags() ?>
  <title><?= Html::encode($this->title) ?></title>
  <?php $this->head() ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <?php $this->beginBody() ?>

  <!-- Site wrapper -->
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-orange navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="bi bi-list"></i></a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
          <a href="<?= Url::base(true); ?>" class="nav-link">Home</a>
        </li>

        <li class="nav-item dropdown btn-group">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDarkDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            <?php echo Yii::$app->user->identity->username; ?>
          </a>
          <ul class="dropdown-menu dropdown-menu-lg-end" aria-labelledby="navbarDarkDropdownMenuLink">
            <li><a class="dropdown-item" href="#">
                <?php echo Html::beginForm(['/site/logout'], 'post')
                  . Html::submitButton(
                    'Logout',
                    ['class' => 'btn']
                  )
                  . Html::endForm(); ?>
              </a></li>
          </ul>
        </li>
      </ul>
    </nav>


    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-light-primary elevation-1">
      <!-- Brand Logo -->

      <a href="<?= Url::base(true); ?>" class="brand-link">
        <img src="https://res.cloudinary.com/daobmhs10/image/upload/icon/Icon-agatra_ztqzqm.png" alt="Agatra Logo" class="brand-image">
        <span class="brand-text">Agatra </span>
      </a>

      <!-- <a href="../../index3.html" class="brand-link">
      <img src="img/icon.png" alt="AdminLTE Logo">
      <span class="brand-text font-weight-light">Agatra</span>
    </a> -->

      <!-- Sidebar -->
      <div class="sidebar">

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item">
              <a href="<?= Url::base(true) ?>" class="nav-link">
                <i class="nav-icon bi bi-house"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= Url::base(true) . '/blog'; ?>" class="nav-link">
                <i class="nav-icon bi bi-journal"></i>
                <p>
                  Create Blog
                </p>
              </a>
            </li>
          </ul>

        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1><?= Html::encode($this->title) ?></h1>
            </div>
            <div class="col-sm-6">
              <div class="breadcrumb float-sm-right">
                <?= Breadcrumbs::widget([
                  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
              </div>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <!-- Default box -->
              <div class="card">
                <div class="card-body">
                  <main role="main" class="flex-shrink-0">
                    <?= Alert::widget() ?>
                    <?= $content ?>
                  </main>
                </div>
                <!-- /.card-body -->
                <!-- /.card-footer-->
              </div>
              <!-- /.card -->
            </div>
          </div>
        </div>
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- <footer class="main-footer">

  </footer> -->

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();
