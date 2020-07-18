<?php
use yii\helpers\Url;
use yii\helpers\Html;


return [
    [
        'class' => 'kartik\grid\CheckboxColumn',
        'width' => '20px',
    ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
        // [
        // 'class'=>'\kartik\grid\DataColumn',
        // 'attribute'=>'id',
    // ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'user_id',
        'content' => function ($data) {
           return $data->user->fio;
       },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'storage_id',
        'content' => function ($data) {
           return $data->storage->name;
       },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'ordered_at',
        'content' => function ($data) {
           return date('d.m.Y H:i',strtotime($data->ordered_at));
       },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'price',
    ],
    [
        'contentOptions'=>['class'=>'text-center'],
        'headerOptions'=>['class'=>'text-center'],
        'attribute'=>'status',
        'visible' => Yii::$app->user->identity->getRole() > 3 ? false : true,
        'width'=>'150px',
        'format'=>'raw',
        'value'=>function($data){
            return '<label class="switch switch-small">
                    <input type="checkbox"'. (($data->status == 2)?' checked=""':'""').'value="'.$data->id.'" onchange="$.post(\'/admin/orders/change-status\',{id:'.$data->id.'},function(data){ });">
                    <span></span>
                    </a>
                </label>';
            },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'label' => 'Статус оплаты',
        'content' => function ($data) {
            if($data->status == 1) return '<button type="submit" class="btn btn-danger btn-xs">Ожидает</button>';
            else return '<button type="submit" class="btn btn-primary btn-xs">оплаченный</button>';
       },
    ],
    [
        'class' => 'kartik\grid\ActionColumn',
        'dropdown' => false,
        'vAlign'=>'middle',
        'width'=>'120px',
        'template' => '{leadOrder} {leadDelete}',
        'urlCreator' => function($action, $model, $key, $index) { 
                return Url::to([$action,'id'=>$key]);
        },
        'buttons'=>[
            'leadOrder' => function ($url, $model) {
                $url = Url::to(['/orders/view', 'id' => $model->id ]);
                    return Html::a('<span class="fa fa-shopping-cart"></span>', $url, [ 'data-pjax'=>0, 'data-toggle'=>'tooltip', 'title'=>'Заказать больше','class'=>'btn btn-primary btn-xs']);
            },
            'leadUpdate' => function ($url, $model) {
                $url = Url::to(['/orders/update', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [ 'role'=>'modal-remote', 'data-toggle'=>'tooltip', 'title'=>'Редактировать','class'=>'btn btn-success btn-xs']);
            },
            'leadDelete' => function ($url, $model) {
                if($model->user->getRole() < 3){
                    $url = Url::to(['/orders/delete', 'id' => $model->id]);
                    return Html::a('<span style="font-size: 12px;" class="glyphicon glyphicon-trash"></span>', $url, [
                        'role'=>'modal-remote','title'=>'Удалить','class'=>'btn btn-danger btn-xs' ,
                        'data-confirm'=>false, 'data-method'=>false,// for overide yii data api
                        'data-request-method'=>'post',
                        'data-toggle'=>'tooltip',
                        'data-confirm-title'=>'Подтвердите действие',
                        'data-confirm-message'=>'Вы уверены что хотите удалить этого элемент?',
                    ]);
                } 
            },
        ],
    ],

];   