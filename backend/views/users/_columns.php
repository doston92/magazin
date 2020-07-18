<?php
use yii\helpers\Url;
use yii\helpers\Html;
use backend\models\Users;
use backend\models\Roles;


return [
    // [
    //     'class' => 'kartik\grid\CheckboxColumn',
    //     'width' => '20px',
    // ],
    [
        'class' => 'kartik\grid\SerialColumn',
        'width' => '30px',
    ],
     [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'avatar',
        'contentOptions' => ['style'=>'width: 48px; height:48px;'],
        'content' => function ($data) {
         return '<center>' . Html::img($data->getAvatar(), [ 'style' => 'height:48px;width:48px; object-fit: cover;']) . '</center>';
           
        },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'fio',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'login',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'phone',
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'role_id',
        'filter' => Roles::getRolesList(),
        'content' => function ($data) {
            $role = $data->getRoleName();
           return '<div class="btn bt-xs" style="background:'.$role['color'].';">'.$role['name'].'</div>';
       },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'status',
        'filter' => Users::getStatus(),
        'content' => function ($data) {
           return $data->getStatusDescription();
       },
    ],
    [
        'class'=>'\kartik\grid\DataColumn',
        'attribute'=>'company_id',
        'content' => function ($data) {
           return $data->company->name;
       },
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
                $url = Url::to(['/users/update', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [ 'role'=>'modal-remote', 'data-toggle'=>'tooltip', 'title'=>'Редактировать','class'=>'btn btn-success btn-xs']);
            },
            'leadDelete' => function ($url, $model) {
                if($model->id != 1){
                    $url = Url::to(['/users/delete', 'id' => $model->id]);
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