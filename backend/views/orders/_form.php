<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Orders;

/* @var $this yii\web\View */
/* @var $model backend\models\Orders */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="orders-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'product_id')->label()->widget(\kartik\select2\Select2::classname(), [
                'data' => $model->getProductList(),
                'options' => [
                    'placeholder' => 'Выберите',
                    ],
                    'size' => kartik\select2\Select2::SMALL,
                    'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'count')->textInput(['type' => 'number']) ?>
        </div>
    </div>
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
