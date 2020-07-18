<?php 
use yii\helpers\Url;
use yii\helpers\Html;
use app\widgets\Menu;
//echo "ff=".$this->context->id;die;
?>
     
<div id="sidebar" class="sidebar">
    <div data-scrollbar="true" data-height="100%">
        <ul class="nav">
            <li>
                <ul class="nav nav-profile">
                    <li><?= Html::a('<i class="fa fa-cogs"></i> Изменит Профиль', ['/users/profile'], []); ?></li>
                    <li>
                        <?= Html::a(
                            '<i class="fa fa-sign-out"></i>Выйти',
                            ['/site/logout'], 
                            ['data-method' => 'post',]   
                        ) ?>
                    </li>
                </ul>
            </li>
        </ul>
        <?= Menu::widget([
            'options' => ['class' => 'nav'],
            'encodeLabels' => false,
            'items' => [
                ['label' => 'Отчеты', 'icon' => 'dashboard', 'url' => ['/site'], 'active' => $this->context->id == 'site'],
                ['label' => 'Заказы', 'icon' => 'tasks', 'url' => ['/orders'], 'active' => $this->context->id == 'orders'],
                ['label' => 'Настройки склад', 'icon' => 'cogs', 'url' => ['/nothealth'], 'active' => ($this->context->id == 'companies' || $this->context->id == 'categories'|| $this->context->id == 'currency'),
                    'items' => [
                        ['label' => 'Товры', 'icon' => '', 'url' => ['/product'], 'active' => $this->context->id == 'product'],
                        ['label' => 'Категории', 'icon' => '', 'url' => ['/categories'], 'active' => ($this->context->id == 'categories')],
                        ['label' => 'Валюты', 'icon' => '', 'url' => ['/currency'], 'active' => ($this->context->id == 'currency')],
                    ],
                ],
                ['label' => 'Пользователи', 'icon' => 'users', 'url' => ['/nothealth'], 'active' => ($this->context->id == 'users' || $this->context->id == 'roles'),
                    'items' => [
                        ['label' => 'Список пользователи', 'icon' => '', 'url' => ['/users'], 'active' => ($this->context->id == 'users')],
                        ['label' => 'Группы', 'icon' => '', 'url' => ['/roles'], 'active' => ($this->context->id == 'roles')],
                    ],
                ],
                ['label' => 'Склады', 'icon' => 'dropbox', 'url' => ['/storage'], 'active' => $this->context->id == 'storage'],
                ['label' => 'Компании', 'icon' => 'university', 'url' => ['/companies'], 'active' => ($this->context->id == 'companies')],
                ['label' => 'Касса', 'icon' => 'dollar', 'url' => ['/payment'], 'active' => ($this->context->id == 'payment')],
            ],
        ]) ?>
        <li style="list-style: none;">
            <a href="javascript:;" class="sidebar-minify-btn" data-click="sidebar-minify"><i class="fa fa-angle-double-left"></i></a>
        </li>
    </div>
</div>
<div class="sidebar-bg"></div>