<?php 
use yii\helpers\Html;
use yii\helpers\Url;
use app\models\Users;
$model = Users::findOne(Yii::$app->user->identity->id);
 ?>

<div id="header" class="header navbar navbar-default navbar-fixed-top">
			<!-- begin container-fluid -->
			<div class="container-fluid">
				<!-- begin mobile sidebar expand / collapse button -->
				<div class="navbar-header">
					<a href="<?= Yii::$app->homeUrl ?>" class="navbar-brand"><span class="navbar-logo"></span><?= Yii::$app->name ?></a>
					<button type="button" class="navbar-toggle" data-click="sidebar-toggled">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<button type="button" class="navbar-toggle p-0 m-r-5" data-toggle="collapse" data-target="#top-navbar">
					    <span class="fa-stack fa-lg text-inverse">
                            <i class="fa fa-square-o fa-stack-2x m-t-2"></i>
                            <i class="fa fa-cog fa-stack-1x"></i>
                        </span>
					</button>
				</div>
				<!-- end mobile sidebar expand / collapse button -->
				
				<!-- begin navbar-collapse -->
                <div class="collapse navbar-collapse pull-left" id="top-navbar">
                    <ul class="nav navbar-nav">
                        <li class="dropdown dropdown-lg">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-th-large fa-fw"></i> Mega <b class="caret"></b></a>
                            <div class="dropdown-menu dropdown-menu-lg">
                                <div class="row">
                                    <div class="col-md-4 col-sm-4">
                                        <h4 class="dropdown-header">UI Kits</h4>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>

                                                   
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4 class="dropdown-header">Page Options <span class="label label-inverse">11</span></h4>
                                        <div class="row">
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                   <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6 col-xs-6">
                                                <ul class="nav">
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                    <li>
                                                    <?= Html::a('<i class="fa fa-angle-right fa-fw fa-lg text-inverse"></i>Рабочий стол', ['/site/index'], ['class' => 'text-ellipsis']); ?></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4 col-sm-4">
                                        <h4 class="dropdown-header">Paragraph</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis libero purus, fermentum at libero convallis, auctor dignissim mauris. Nunc laoreet pellentesque turpis sodales ornare. Nunc vestibulum nunc lorem, at sodales velit malesuada congue. Nam est tortor, tincidunt sit amet eros vitae, aliquam finibus mauris.
                                        </p>
                                        <p>
                                            Fusce ac ligula laoreet ante dapibus mattis. Nam auctor vulputate aliquam. Suspendisse efficitur, felis sed elementum eleifend, ipsum tellus sodales nisi, ut condimentum nisi sem in nibh. Phasellus suscipit vulputate purus at venenatis. Quisque luctus tincidunt tempor.
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-diamond fa-fw"></i> Client
                            </a>
                        </li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-database fa-fw"></i> New <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" role="menu">
                                <li><?= Html::a('Рабочий стол', ['/site/index'], []); ?></li>
                                <li><?= Html::a('Рабочий стол', ['/site/index'], []); ?></li>
                                <li><?= Html::a('Рабочий стол', ['/site/index'], []); ?></li>
                                <li><?= Html::a('Рабочий стол', ['/site/index'], []); ?></li>
                            </ul>
                        </li>
                    </ul>
                </div>
				<!-- end navbar-collapse -->
				
				<!-- begin header navigation right -->
				<ul class="nav navbar-nav navbar-right">
                    <!-- <li>
                        <form class="navbar-form full-width">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Enter keyword" />
                                <button type="submit" class="btn btn-search"><i class="fa fa-search"></i></button>
                            </div>
                        </form>
                    </li> -->
                    <li class="dropdown">
                        <a href="javascript:;" data-toggle="dropdown" class="dropdown-toggle f-s-14">
                            <i class="fa fa-bell-o"></i>
                            <span class="label">5</span>
                        </a>
                        <ul class="dropdown-menu media-list pull-right animated fadeInDown">
                            <li class="dropdown-header">Notifications (5)</li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-bug media-object bg-red"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Server Error Reports</h6>
                                        <div class="text-muted f-s-11">3 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="/img/user-1.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">John Smith</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">25 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><img src="/img/user-2.jpg" class="media-object" alt="" /></div>
                                    <div class="media-body">
                                        <h6 class="media-heading">Olivia</h6>
                                        <p>Quisque pulvinar tellus sit amet sem scelerisque tincidunt.</p>
                                        <div class="text-muted f-s-11">35 minutes ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-plus media-object bg-green"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New User Registered</h6>
                                        <div class="text-muted f-s-11">1 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="media">
                                <a href="javascript:;">
                                    <div class="media-left"><i class="fa fa-envelope media-object bg-blue"></i></div>
                                    <div class="media-body">
                                        <h6 class="media-heading"> New Email From John</h6>
                                        <div class="text-muted f-s-11">2 hour ago</div>
                                    </div>
                                </a>
                            </li>
                            <li class="dropdown-footer text-center">
                                <a href="javascript:;">View more</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown navbar-user">
                        <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown">
                            <img src="/img/user-13.jpg" alt="" /> 
                            <span class="hidden-xs"><?=$model->fio?></span> <b class="caret"></b>
                        </a>
                        <ul class="dropdown-menu animated fadeInLeft">
                            <li class="arrow"></li>
                            <li><?= Html::a('Изменит Профиль', ['/users/profile'], []); ?></li>
                            <li><a href="javascript:;"><span class="badge badge-danger pull-right">2</span> Inbox</a></li>
                            <li><a href="javascript:;">Calendar</a></li>
                            <li><a href="javascript:;">Setting</a></li>
                            <li class="divider"></li>
                            <li><?= Html::a(
                                    'Выйти',
                                    ['/site/logout'], 
                                    ['data-method' => 'post',]   
                                ) ?></li>

                        </ul>
                    </li>
                </ul>
				<!-- end header navigation right -->
			</div>
			<!-- end container-fluid -->
		</div>