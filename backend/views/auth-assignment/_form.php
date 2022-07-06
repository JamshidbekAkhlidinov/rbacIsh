<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\User;
/* @var $this yii\web\View */
/* @var $model backend\models\AuthAssignment */
/* @var $form yii\widgets\ActiveForm */

$users  = \yii\helpers\ArrayHelper::map(User::find()->all(),'id','username');
$item  = \yii\helpers\ArrayHelper::map(\backend\models\AuthItem::find()->all(),'name','name');

?>

<div class="auth-assignment-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'item_name')->dropDownList($item) ?>

    <?= $form->field($model, 'user_id')->dropDownList($users) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
