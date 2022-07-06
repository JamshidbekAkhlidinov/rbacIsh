<?php

use backend\assets\AdminLteAsset;
use backend\models\MenuAdmin;
use common\widgets\Alert;
use yii\bootstrap4\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;
use yii\widgets\Menu;



// use yii\widgets\Menu;
AdminLteAsset::register($this);
$admin  =  yii::$app->user->identity;
$session = Yii::$app->session;
$addClass = $session->get('sidebar') ;//?? 'sidebar-collapse';
?>

<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$this->title?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
    <?=$this->head()?>
</head>

<body class="hold-transition skin-blue sidebar-mini <?=$addClass?>">
    <?php $this->beginBody() ?>



    <div class="wrapper">
        <header class="main-header">

            <a href="<?=Url::home()?>" class="logo">
                <span class="logo-mini"><b>iT</b></span>
                <span class="logo-lg"><b>iTeach</b>.uz</span>
            </a>
            <nav class="navbar navbar-static-top">
                <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">


                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="<?=url::to('@web/images/users/no-img.png')?>" class="user-image"
                                    alt="User Image">
                                <span class="hidden-xs"><?=$admin->name??$admin->username??'salom'?></span>
                            </a>
                            <ul class="dropdown-menu">

                                <li class="user-header">
                                    <img src="<?=url::to('@web/images/users/no-img.png')?>" class="img-circle"
                                        alt="User Image">
                                    <p>
                                        <?=$admin->name??$admin->username??"salom"?>
                                        <small><?=date('d-M Y',$admin->created_at??time())?></small>
                                    </p>
                                </li>

                                <li class="user-footer">
                                    <div class="pull-left">
                                        <?=Html::a("Profile",url::to(['/dashboard/profil']),['class'=>'btn btn-default btn-flat'])?>
                                    </div>
                                    <div class="pull-right">
                                        <a href="<?=url::to(['/dashboard/logout'])?>"
                                            class="btn btn-default btn-flat">Sign out</a>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="main-sidebar">
            <section class="sidebar">

                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?=url::to('@web/images/users/no-img.png')?>" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?=Html::a($admin->name??$admin->username??"User",url::to(['/dashboard/profil']))?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>

                <form action="#" method="get" class="sidebar-form">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Qidirish...">
                        <span class="input-group-btn">
                            <button type="submit" name="btn" id="search-btn" class="btn btn-flat">
                                <i class="fa fa-search"></i>
                            </button>
                        </span>
                    </div>
                </form>


                <?php
                    echo MenuAdmin::getData();
                ?>
               
            </section>

        </aside>

        <div class="content-wrapper">

            <section class="content-header">
                <h1>
                    <?php //echo Yii::$app->controller->getRoute()?>
                    <?=$this->title?>
                </h1>
                <?= Alert::widget(['options' => ['class'=>'callout', 'style'=>'margin-top: 10px; margin-bottom: 0px;']]) ?>

                <?= Breadcrumbs::widget([
                'links' => $this->params['breadcrumbs'] ?? [],
                'homeLink' => [
                    'label'=>"<i class='fa fa-home'></i> Bosh sahifa", 
                    'url'=>Url::home(), 
                    'encode' => false,
                    ],
                ]) ?>
            </section>

            <section class="content container-fluid">

                <?php if(mb_stripos(Yii::$app->controller->getRoute(),'dashboard')=='true' or mb_stripos(Yii::$app->controller->getRoute(),'translate-manager')=='true'){ }else{?>
                <div class="box box-success box-header">
                    <?php } ?>
                    <?=$content?>
                    <?php if(mb_stripos(Yii::$app->controller->getRoute(),'dashboard')=='true' or mb_stripos(Yii::$app->controller->getRoute(),'translate-manager')=='true'){ }else{?>
                </div>
                <?php } ?>
            </section>

        </div>

        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 2.4.13
            </div>
            <strong>Copyright &copy; 2014-2019 <a href="https://iTeach.uz/">iTeach.uz</a>.</strong>
        </footer>

        <aside class="control-sidebar control-sidebar-dark">


            <div class="tab-content">

                <div class="tab-pane" id="control-sidebar-home-tab">

                </div>



            </div>
        </aside>


        <div class="control-sidebar-bg"></div>
    </div>



    <?php $this->endBody() ?>
</body>

</html>
<?php $this->endPage();?>