<?php

use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\Payment */
?>
<div class="payment-view">
 
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'order_id',
            'summa',
            'payed_at',
            'company_id',
        ],
    ]) ?>

</div>
