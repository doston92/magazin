<?php
use yii\helpers\Url;
use yii\helpers\Html;
use yii\bootstrap\Modal;
use kartik\grid\GridView;
use johnitvn\ajaxcrud\CrudAsset;
use johnitvn\ajaxcrud\BulkButtonWidget;
use yii\widgets\Pjax;
use yii\widgets\LinkPager;

$this->title = "Профиль";
$this->params['breadcrumbs'][] = $this->title;
CrudAsset::register($this);
$session = Yii::$app->session;
?>
 <style type="text/css">
     p {
    margin: 12px 0px -5px;
}
 </style>                       

<?php Pjax::begin(['enablePushState' => false, 'id' => 'crud-datatable-pjax']) ?>
       
    <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <!-- CONTACT ITEM -->
                <div class="panel panel-default">
                    <div class="panel-body profile">
                        <div class="profile-image">
                             <img src="<?= $model->getAvatar()?>" style=" width:120px; height:120px; object-fit: cover;" alt="Пользователи">
                        </div>
                        <div class="profile-data">
                            <div class="profile-data-name"><?=$model->fio?></div>
                            <div class="profile-data-title"></div>
                        </div>
                        <div class="profile-controls">
                            <a href="#"  data-toggle="" class="profile-control-left" title="Уведомления"><span class="fa fa-bell-o" data-pjax="0"></span></a>
                            <a href="/admin/users/update?id=<?=$model->id?>" data-toggle="" class="profile-control-right" role="modal-remote" title="Изменить"><span class="fa fa-pencil"></span></a>
                        </div>
                    </div>                                
                    <div class="panel-body">                                    
                        <div class="contact-info">
                            <p><b>Логин</b><br><?= $model->login?></p>         
                            <p><b>Телефон</b><br><?= $model->phone?></p>
                            <p><b>Email</b><br><?= $model->email?></p>
                            <p><b>Статус</b><br><?=$model->getStatusDescription()?></p>
                        </div>
                    </div>                                
                </div>
                <!-- END CONTACT ITEM -->
            </div>
    </div>

<?php Pjax::end() ?>
<?php Modal::begin([
    "id"=>"ajaxCrudModal",
    "options" => [
        "tabindex" => false,
    ],
    "footer"=>"",
])?>
<?php Modal::end(); ?>
