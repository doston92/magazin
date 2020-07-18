<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-form">
    
    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'storage_id')->label()->widget(\kartik\select2\Select2::classname(), [
                'data' => $model->getStorageList(),
                'disabled' => true,
                'value' => $model->getStorage(),
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
    </div>
    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'category_id')->label()->widget(\kartik\select2\Select2::classname(), [
                'data' => $model->getCategoryList(),
                'options' => [
                    'placeholder' => 'Выберите',
                    'onchange'=>'
                        $.post( "/admin/product/subcategory?id='.'"+$(this).val(), function( data ){
                            $( "select#sub_categorys_id" ).html( data);
                        });' 
                    ],
                'size' => kartik\select2\Select2::SMALL,
                'pluginOptions' => [ 
                    'tags' => true,
                    'allowClear' => true
                ],
            ]); ?>
        </div>
        <div class="col-md-6">
            <?= $form->field($model, 'sub_category_id')->label()->widget(\kartik\select2\Select2::classname(), [
                'data' => $model->getSubategoryid($model->category_id),
                'options' => [
                    'placeholder' => 'Выберите',
                    'id' => 'sub_categorys_id',],
                    'size' => kartik\select2\Select2::SMALL,
                    'pluginOptions' => [
                    'tags' => true,
                    'allowClear' => true
                ],
            ]); ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-4">
            <?= $form->field($model, 'price')->textInput(['type' => 'number']) ?>
        </div>
        <div class="col-md-4">
            <?= $form->field($model, 'currency_id')->label()->widget(\kartik\select2\Select2::classname(), [
                'data' => $model->getCurrencyList(),
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
        <div class="col-md-4">
            <?= $form->field($model, 'code')->textInput(['maxlength' => true]) ?>
        </div>
    </div>

   

  
	<?php if (!Yii::$app->request->isAjax){ ?>
	  	<div class="form-group">
	        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
	    </div>
	<?php } ?>

    <?php ActiveForm::end(); ?>
    
</div>
