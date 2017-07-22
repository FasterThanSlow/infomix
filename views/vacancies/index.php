<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VacanciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancies';
$this->params['breadcrumbs'][] = $this->title;

$datesArray = [
    0 => 'за все время',
    86400 => 'за сутки',
    259200 => 'за 3 дня',
    604800 => 'за неделю',
    2629743 => 'за месяц',
    7889229 => 'за 3 месяца',
    15778458 => 'за полгода'
];
    if( $searchModel->period != '' ){
        $period = $searchModel->period;
    }
    else{
        $period = 0;
    }
?>
<div class="vak_catalog">
    <div class="inner_wrapp">
        <div class="search_greed">
            <div class="search_greed_col1">
                <div style="display: block">
                    <div class="select_widjet">
                        <div style="padding: 10px;padding-left: 19px;">Показывать вакансии</div>
                        <div class="filter">
                            <div class="dropdown sortable-dropdown" style="margin-left: 19px;margin-bottom: 30px;">
                                <button class="btn btn-default dropdown-toggle js-upped-period-dropdown-btn" type="button" id="filter-bar-upped-period-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 80%; text-align: left;">
                                    <?= $datesArray[$period] ?> <span class="caret" style="float: right; margin-top: 8px;"></span>
                                </button>
                                
                                <?= Html::ul($datesArray,[
                                    'class' => 'dropdown-menu',
                                    'aria-labelledby' => 'filter-bar-upped-period-dropdown',
                                    'item' => function($item,$index){
                                        return Html::tag('li', 
                                            Html::a($item, yii\helpers\Url::current(['VacanciesSearch[period]' => $index])),
                                            [
                                                'class'=>'js-upped-period-filter-link'
                                            ]);
                                    }
                                ])?>
                            </div>


                        </div>
                    </div>
                    <div class="select_widjet">
                        
                        <!-- Filter -->
                        <div class="related">
                            <?php echo $this->render('_search', [
                                'model' => $searchModel,
                                'schedule' => $schedule,
                                'education' => $education,
                                'employment' => $employment,
                                'natureOfWork' => $natureOfWork,
                                'expiriencies' => $expiriencies,
                                'student' => $student,
                                'salaries' => $salaries
                            ]); ?>
                        </div>
                        <!-- end Filter -->
                        
                    </div>
                </div>
            </div>
            <div class="search_greed_col2">
                <div style="display: block">
                    <div class="head_catalog">    
                        <h2 style="margin-top: 0; margin-bottom: 20px;">Программист PHP</h2>
                        <a href="#" >Каталог вакансий</a>
                        <p style="margin: 15px 0 15px 0">
                            <span>→ IT / Интернет / Телеком</span> → 
                            <a href="#">IT, Интернет, телеком</a>
                        </p>
                        <div >
                            <div class="search-list__count">
                                Найдено: 
                                <span class="" style="font-size: 12px;font-style: italic;color: #7c7c7c;"><?= $dataProvider->totalCount; ?></span>
                            </div>
                            <span class="sortable table-ajax-control no-scroll">
                                <div class="search-list__sortable sortable-dropdown dropdown">
                                    Сортировать
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span>
                                            <?php
                                            if (isset($_GET['sort'])) {
                                                switch ($_GET['sort']) {
                                                    case '-updated_at':
                                                        echo 'по дате обновления';
                                                        break;
                                                    case 'salary':
                                                        echo 'по возрастанию зарплаты';
                                                        break;
                                                    case '-salary':
                                                        echo 'по убыванию зарплаты';
                                                        break;
                                                }
                                            } else {
                                                echo 'по дате обновления';
                                            }
                                            ?>
                                        </span>
                                        <i class="caret"></i>
                                    </span>
                                    <ul class="sortable-dropdown-menu dropdown-menu" role="menu">
                                        <?php if (!isset($_GET['sort']) || $_GET['sort'] == '-updated_at'): ?>
                                            <li class="checked">
                                                <span>по дате обновления</span>
                                            </li>
                                            <li>
                                                <a href="<?= yii\helpers\Url::current(['sort' => 'salary']) ?>">по возрастанию зарплаты</a>
                                            </li>
                                            <li>
                                                <a href="<?= yii\helpers\Url::current(['sort' => '-salary']) ?>">по убыванию зарплаты</a>
                                            </li>
                                        <?php elseif (isset($_GET['sort']) && $_GET['sort'] == 'salary'): ?>
                                            <li class="checked">
                                                <span>по возрастанию зарплаты</span>
                                            </li>
                                            <li>
                                                <a href="<?= yii\helpers\Url::current(['sort' => '-updated_at']) ?>">по дате обновления</a>
                                            </li>
                                            <li>
                                                <a href="<?= yii\helpers\Url::current(['sort' => '-salary']) ?>">по убыванию зарплаты</a>
                                            </li>
                                        <?php elseif (isset($_GET['sort']) && $_GET['sort'] == '-salary'): ?>
                                            <li class="checked">
                                                <span>по убыванию зарплаты</span>
                                            </li>
                                            <li>
                                                <a href="<?= yii\helpers\Url::current(['sort' => '-updated_at']) ?>">по дате обновления</a>
                                            </li>
                                            <li>
                                                <a href="<?= yii\helpers\Url::current(['sort' => 'salary']) ?>">по возрастанию зарплаты</a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                </div>
                            </span>
                        </div>
                        <div class="search-list__top-separator"></div>
                    </div>
                </div>

                <div class="l_search-greed">
                    <div class="l_search-greed__column-3">
                        <span id="table-current-uri" data-current-uri="?"></span>

                        <!-- Vacancies -->
                        <?=
                        \yii\widgets\ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_list',
                            'options' => [
                                'class' => 'search-list',
                            ],
                            'layout' => '{items}<div class="table-ajax-control"><div class="pagination">{pager}{summary}</div></div>',
                            'summary' => '<div class="pagination__count">Показано <span>1</span> – <span>{count}<span> из <span>{totalCount}<span></span></span></span></span></div>',
                            'pager' => [
                                'pageCssClass' => 'pagination__item',
                                'activePageCssClass' => ['class' => 'pagination__item_active'],
                                'disabledPageCssClass' => ['class' => 'pagination__item_current disabled'],
                                'prevPageLabel' => '←',
                                'firstPageLabel' => '<i class="icon-fast-bw"></i>',
                                'nextPageLabel' => '→',
                                'lastPageLabel' => '<i class="icon-fast-fw"></i>',
                                'firstPageCssClass' => '',
                                'lastPageCssClass' => '',
                                'prevPageCssClass' => '',
                                'nextPageCssClass' => '',
                                'options' => [
                                    'class' => 'pagination__list',
                                ],
                            ]
                        ]);
                        ?>
                        <!-- end Vacancies -->

                    </div>
                    <div style="display: table-cell; width:29.5%;"><img src="../img/22284.jpg" alt="" style="width: 87%;"></div>
                </div>

            </div>
        </div>      
    </div>    
</div>

<script>
    $('input[type=radio]').on('click', function () {
        $(this).closest("form").submit();
    });
</script>
