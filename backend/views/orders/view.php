<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;


$this->title = "Заказы";
$this->params['breadcrumbs'][] = ['label' => "Заказы", 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Ваши заказы';

CrudAsset::register($this);

?>
<div class="panel panel-inverse user-index">
    <div class="panel-heading">
        <div class="panel-heading-btn">
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
            <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
        </div>
        <h4 class="panel-title">Список ваша заказы</h4>
    </div>
    <div class="panel-body">
        <div id="ajaxCrudDatatable">
            <?=GridView::widget([
            'id'=>'crud-datatable',
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            // 'showFooter' => true,
            // 'showPageSummary' => true,
            'tableOptions' => ['class' => 'table table-bordered'],
            'pjax'=>true,
            'columns' => require(__DIR__.'/_order_columns.php'),
            'panelBeforeTemplate' =>    Html::a('Добавить <i class="fa fa-plus"></i>', ['add-orders' , 'id' => $id],
                    ['role'=>'modal-remote','title'=> 'Добавить','class'=>'btn btn-success']).'&nbsp;',
            'striped' => true,
            'condensed' => true,
            'responsive' => true,
            'panel' => [
            'headingOptions' => ['style' => 'display: none;'],
            '<div class="clearfix"></div>',
            ]
            ])?>
        </div>
        <a href="/admin/orders/index" title="Назад" class="btn btn-info">Назад</a>
    </div>
</div>

<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",
])?>
<?php Modal::end(); ?>


