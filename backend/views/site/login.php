<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

$this->title = 'Авторизация';

$fieldOptions1 = [
    'options' => ['class' => 'form-group m-b-20'],
    'inputTemplate' => "{input}"
];

$fieldOptions2 = [
    'options' => ['class' => 'form-group m-b-20'],
    'inputTemplate' => "{input}"
];

?>
<div class="login login-v2">
    <!-- begin brand -->
    <div class="login-header">
        <div class="brand">
            <span class="logo"></span> <?=Yii::$app->name?>
            <small>Введите данные для авторизации</small>
        </div>
        <div class="icon">
            <i class="fa fa-sign-in"></i>
        </div>
    </div>
    <!-- end brand -->
    <div class="login-content">
        <?php $form = ActiveForm::begin(['id' => 'login-form', 'enableClientValidation' => false], $options = ['class' => 'margin-bottom-0']); ?>
        <?= $form
            ->field($model, 'username', $fieldOptions1)
            ->label(false)
            ->textInput(['value'=>'admin','placeholder' => $model->getAttributeLabel('email'), 'class' => 'form-control input-lg inverse-mode no-border']) ?>
        <?= $form
            ->field($model, 'password', $fieldOptions2)
            ->label(false)
            ->passwordInput(['value'=>'admin','placeholder' => $model->getAttributeLabel('password'), 'class' => 'form-control input-lg inverse-mode no-border']) ?>
        <div class="login-buttons">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-success btn-block btn-lg', 'name' => 'login-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>

