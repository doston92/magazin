<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Product */
?>
<div class="product-view">
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            'name',
            [
                'attribute' => 'storage.name',
                'format'=>'raw',
                'label' => 'Склад', 
                
            ],
            [
                'attribute' => 'category.name',
                'format'=>'raw',
                'label' => 'Категория', 
                
            ],
             [
                'attribute' => 'subCategory.name',
                'format'=>'raw',
                'label' => 'Суб категория', 
                
            ],
            [
                'attribute' => 'productPrices.price',
                'format'=>'raw', 
                'value' => function($model){
                    return $model->productPrices[0]->price;
                }
            ],
            [
                'attribute' => 'productPrices.currency_id',
                'format'=>'raw', 
                'value' => function($model){
                    return $model->productPrices[0]->currency->name;
                }
            ],
        ],
    ]) ?>

</div>
