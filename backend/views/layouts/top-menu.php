<?php 
use yii\helpers\Url;
use app\widgets\TopMenu;
use app\models\Users;
 ?>

<div id="top-menu" class="top-menu">
            <!-- begin top-menu nav -->
           <?php if(Yii::$app->user->isGuest == false): ?>
        <?= TopMenu::widget(
            [
                'options' => ['class' => 'nav'],
                'items' => [
                    ['label' => 'Рабочий стол', 'icon' => 'fa fa-desktop', 'url' => ['site/index'], ],
                    ['label' => 'Пользователи', 'icon' => 'fa fa-users', 'url' => ['/users'],],
                    ['label' => 'Покупки', 'icon' => 'fa fa-shopping-basket', 'url' => ['/purchases'],],
                    ['label' => 'История бонусов', 'icon' => 'fa fa-eercast', 'url' => ['/history-bonuses/index'],],
                    ['label' => 'Шаблоны', 'icon' => 'fa fa-wpforms', 'url' => ['/template'],],
                    [
                        'label' => 'Настройки',
                        'icon' => '',
                        'url' => '#',
                        'options' => ['class' => 'has-sub'],
                        'items' => [
                            ['label' => 'Пользователи','icon' => 'fa fa-users', 'url' => ['user/index'],  ],
                            ['label' => 'Тип скидки','icon' => 'fa fa-file-text-o', 'url' => ['sales-type/index'],  ],
                            ['label' => 'Интеграция', 'icon' => 'fa  fa-connectdevelop', 'url' => ['integration/update?id=1'],],
                            ['label' => 'Инструкция', 'icon' => 'fa  fa-pencil', 'url' => ['/instruction/edit'],],
                            //['label' => 'Реанимация', 'icon' => 'fa fa-user','url' => ['relevance-client/index'],  ],
                            ['label' => 'Настройки','icon' => 'fa fa-gear', 'url' => ['settings/index'],  ],
                            //['label' => 'Интеграция','icon' => 'fa fa-bank', 'url' => ['city/index'],  ],
                        ],
                    ],
                    ['label' => 'Инструкция', 'url' => ['/instruction/index'], ],
                ],
            ]
        );
        ?>
    <?php endif; ?>
            <!-- end top-menu nav -->
		</div>