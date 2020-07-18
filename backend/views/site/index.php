<?php
use dosamigos\chartjs\ChartJs;

/* @var $this yii\web\View */

$this->title = 'Отчеты';
?>

<!-- begin row -->
            <div class="row">
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-green">
                        <div class="stats-icon"><i class="fa fa-desktop"></i></div>
                        <div class="stats-info">
                            <h4>TOTAL VISITORS</h4>
                            <p>3,291,922</p>    
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-blue">
                        <div class="stats-icon"><i class="fa fa-chain-broken"></i></div>
                        <div class="stats-info">
                            <h4>BOUNCE RATE</h4>
                            <p>20.44%</p>   
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-purple">
                        <div class="stats-icon"><i class="fa fa-users"></i></div>
                        <div class="stats-info">
                            <h4>UNIQUE VISITORS</h4>
                            <p>1,291,922</p>    
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
                <!-- begin col-3 -->
                <div class="col-md-3 col-sm-6">
                    <div class="widget widget-stats bg-red">
                        <div class="stats-icon"><i class="fa fa-clock-o"></i></div>
                        <div class="stats-info">
                            <h4>AVG TIME ON SITE</h4>
                            <p>00:12:23</p> 
                        </div>
                        <div class="stats-link">
                            <a href="javascript:;">View Detail <i class="fa fa-arrow-circle-o-right"></i></a>
                        </div>
                    </div>
                </div>
                <!-- end col-3 -->
            </div>
            <!-- end row -->
                <div class="col-md-12 ui-sortable">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-8">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title"> Данные по продажам</h4>
                        </div>
                        <div class="panel-body">
                            <p class="text-info" style="font-weight: 600; font-size: 15px;"> Всего заказов <?= $all_orders_count['count']?> шт.</p>

                            <p class="text-info" style="font-weight: 600; font-size: 15px;"> Завершено успешно <?= $all_end_order['count']?> шт.</p>

                            <p class="text-info" style="font-weight: 600; font-size: 15px;"> Сумма всего <?=number_format($all_end_order['summ'], 2, ',', ' '); ?> Сум.</p>
                        </div>
                    </div>
                    <!-- end panel -->
                  
                </div>
                <div class="col-md-12 ui-sortable">
                    <!-- begin panel -->
                    <div class="panel panel-inverse" data-sortable-id="ui-typography-8">
                        <div class="panel-heading">
                            <div class="panel-heading-btn">
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-default" data-click="panel-expand"><i class="fa fa-expand"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-success" data-click="panel-reload"><i class="fa fa-repeat"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-warning" data-click="panel-collapse"><i class="fa fa-minus"></i></a>
                                <a href="javascript:;" class="btn btn-xs btn-icon btn-circle btn-danger" data-click="panel-remove"><i class="fa fa-times"></i></a>
                            </div>
                            <h4 class="panel-title"> Касса</h4>
                        </div>
                        <?= ChartJs::widget([
                            'type' => 'line',
                            'options' => [
                                'height' => 80,
                                'width' => 400
                                                    ],
                            'data' => [
                                'labels' => $month,
                                'datasets' => [
                                [
                                    'label' => "Касса",
                                    'backgroundColor' => "rgba(179,181,198,0.2)",
                                    'borderColor' => "rgba(179,181,198,1)",
                                    'pointBackgroundColor' => "rgba(179,181,198,1)",
                                    'pointBorderColor' => "#fff",
                                    'pointHoverBackgroundColor' => "#fff",
                                    'pointHoverBorderColor' => "rgba(179,181,198,1)",
                                    'data' =>$values_pay
                                        ],
                                                           
                                    ]
                                ]
                            ]);
                        ?>
                    </div>
                   
                </div>
                    
