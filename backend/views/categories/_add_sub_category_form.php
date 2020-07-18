<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<div class="categories-form">

	    <?php $form = ActiveForm::begin(); ?>
		    <div class="row">
		        <div class="col-md-12">
		    		<?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>
				</div>
			</div>

			<?php if (!Yii::$app->request->isAjax){ ?>
			  	<div class="form-group">
			        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
			    </div>
			<?php } ?>

	    <?php ActiveForm::end(); ?>
    
</div>
