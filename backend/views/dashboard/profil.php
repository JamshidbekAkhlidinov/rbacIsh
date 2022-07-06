<?php

use yii\bootstrap4\ActiveForm;
use yii\bootstrap4\Html;
use yii\helpers\Url;
$admin = Yii::$app->user->identity;
$this->title = "Assalom alaylim ".$admin->username;
$this->params['title'] = $this->title;
?>
<section class="content">
    <div class="row">
        <div class="col-md-3">

            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="<?=url::to('@web/images/users/no-img.png')?>"
                        alt="User profile picture">
                    <h3 class="profile-username text-center"><?=$admin->username?></h3>
                    <p class="text-muted text-center">Adminstrator</p>
                    <!-- <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul> -->
                    <a href="<?=Url::to(['/site/logout'])?>" class="btn btn-primary btn-block"><b>Chiqish</b></a>
                </div>

            </div>

        </div>

        <div class="col-md-9">
            <div class="nav-tabs-custom">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#activity" data-toggle="tab">About Me</a></li>
                    <li><a href="#timeline" data-toggle="tab">Edit name</a></li>
                    <li><a href="#settings" data-toggle="tab">Settings pasword</a></li>
                </ul>
                <div class="tab-content">
                    <div class="active tab-pane" id="activity">

                        <div class="">
                            <!-- <div class="box-header with-border">
                                <h3 class="box-title"></h3>
                            </div> -->

                            <div class="box-body">
                                <strong><i class="fa fa-user margin-r-5"></i> username</strong>
                                <p class="text-muted">
                                    <?=$admin->username?>
                                </p>
                                <hr>
                                <strong><i class="fa fas fa-envelope margin-r-5"></i> Email</strong>
                                <p class="text-muted"><?=$admin->email?></p>
                                <hr>
                              
                            </div>

                        </div>


                    </div>

                    <div class="tab-pane" id="timeline">

                    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);  ?>

                    <?=$form->field($user,'username',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput()?>
                    <?=$form->field($user,'email',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div><div class="col-sm-10 text-danger">{error}</div>'])->textInput()?>
                    <?=Html::submitButton('Saqlash',['class'=>'btn btn-success'])?>
                   <?php    ActiveForm::end();  ?>

                    </div>

                    <div class="tab-pane" id="settings">
                        <!-- <form class="form-horizontal">
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputName" class="col-sm-2 control-label">Name</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputName" placeholder="Name">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="inputExperience"
                                        placeholder="Experience"></textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputSkills" class="col-sm-2 control-label">Skills</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="inputSkills" placeholder="Skills">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-sm-offset-2 col-sm-10">
                                    <button type="submit" class="btn btn-danger">Submit</button>
                                </div>
                            </div>
                        </form> -->

                    <?php $form = ActiveForm::begin(['options'=>['class'=>'form-horizontal']]);  ?>
                    <?=$form->field($pasword,'password',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput()?>
                    <?=$form->field($pasword,'password1',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput()?>
                    <?=$form->field($pasword,'password2',['template'=>'<label for="inputSkills" class="col-sm-2 control-label">{label}</label><div class="col-sm-10">{input}</div>'])->passwordInput()?>
                    <?=Html::submitButton('Saqlash',['class'=>'btn btn-success col-sm-offset-2'])?>
                   <?php    ActiveForm::end();  ?>


                    </div>

                </div>

            </div>

        </div>

    </div>

</section>