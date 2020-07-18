<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Storage */
?>
<div class="storage-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'adress:ntext',
            'company_id',
        ],
    ]) ?>

</div>
