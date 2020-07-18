<?php
use kartik\grid\GridView;
use yii\helpers\Url;
use yii\helpers\Html;

?>

<?=GridView::widget([ 
    'id'=>'crud-datatable',
    'dataProvider' => $model->SubCategoryList,
    'columns' => [
        [
            'class' => 'kartik\grid\SerialColumn',
            'width' => '30px',
        ],
        [
            'attribute' => 'name',
            'value' => function($data){
                return $data->name;
            }
        ],
        [
            'class' => 'kartik\grid\ActionColumn',
            'dropdown' => false,
            'vAlign'=>'middle',
            'width'=>'120px',
            'template' => '{leadUpdate} {leadDelete}',
            'urlCreator' => function($action, $model, $key, $index) { 
                    return Url::to([$action,'id'=>$key]);
            },
            'buttons'=>[
                'leadUpdate' => function ($url, $model) {
                    $url = Url::to(['/categories/update-sub', 'id' => $model->id]);
                        return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [ 'role'=>'modal-remote', 'data-toggle'=>'tooltip', 'title'=>'Редактировать','class'=>'btn btn-success btn-xs']);
                },
                'leadDelete' => function ($url, $model) {
                        $url = Url::to(['/categories/delete-sub', 'id' => $model->id]);
                        return Html::a('<span style="font-size: 12px;" class="glyphicon glyphicon-trash"></span>', $url, [
                            'role'=>'modal-remote','title'=>'Удалить','class'=>'btn btn-danger btn-xs' ,
                            'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                            'data-request-method'=>'post',
                            'data-toggle'=>'tooltip',
                            'data-confirm-title'=>'Подтвердите действие',
                            'data-confirm-message'=>'Вы уверены что хотите удалить этого элемент?',
                        ]);
                },
            ],
        ],
    ],
    'striped' => true,
    'condensed' => true,
    'responsive' => true,
])?>
