<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Roles;
?>

<div class="users-form">
    <?php $form = ActiveForm::begin(); ?>
        <div class="row">
            <div class="col-md-4">
                <div id="image" class="col-md-12">
                <?=Html::img($model->getAvatar(), [
                    'style' => 'width:150px; height:150px;object-fit: cover;',
                    'class'=>'img-circle',
                ])?>
            </div>
            <br>
            <div class="col-md-12">
               <?= $form->field($model, 'image')->fileInput(['class'=>"image_input",'id'=>'inputFile']); ?>
            </div>
            </div>
            <div class="col-md-8">
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'fio')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'login')->textInput(['maxlength' => true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $model->isNewRecord ? $form->field($model, 'password')->textInput(['maxlength' => true]) : $form->field($model, 'new_password')->textInput(['maxlength' => true]) ?>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <?= $form->field($model, 'phone')->widget(\yii\widgets\MaskedInput::className(), [
                                      'mask' => '+\9\9899-999-99-99',
                                     'options' => [
                                          'placeholder' => '+998-99-999-99-99',
                                         'class'=>'form-control',
                                     ]
                        ]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'status')->dropDownList($model->getStatus(), ['prompt' => 'Выберите статус','disabled' => $model->id != 1 ? false : true]) ?>
                    </div>
                    <div class="col-md-6">
                        <?= $form->field($model, 'role_id')->dropDownList(Roles::getRolesList(), ['prompt' => 'Выберите должность','disabled' => $model->id != 1 ? false : true]) ?>
                    </div>
               </div>
            </div>
        </div>
    <?php ActiveForm::end(); ?>
</div>
<?php 
$this->registerJs(<<<JS

$("#inputFile").on('change',function(e){
  var files = e.target.files;
    $.each(files, function(i,file){
        var reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = function(e){
            var template = '<img style="object-fit: cover; width:150px; height:150px;" src="'+e.target.result+'" class="img-circle"> ';
            $('#image').html('');
            $('#image').append(template);
        };
    });
});
JS
);
?>

