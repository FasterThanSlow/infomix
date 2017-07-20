<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\VacanciesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Vacancies';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="vak_catalog">
    <div class="inner_wrapp">
        <div class="search_greed">
            <div class="search_greed_col1">
                <div style="display: block">
                    <div class="select_widjet">
                        <div style="padding: 10px;">Показывать вакансии</div>
                        <div class="filter">
                            <div class="dropdown sortable-dropdown" style="margin-left: 10px;margin-bottom: 30px;">
                                <button class="btn btn-default dropdown-toggle js-upped-period-dropdown-btn" type="button" id="filter-bar-upped-period-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="width: 80%; text-align: left;">
                                    За все время				<span class="caret" style="float: right; margin-top: 8px;"></span>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="filter-bar-upped-period-dropdown">

                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=">за все время</a>
                                    </li>
                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=1">за сутки</a>
                                    </li>
                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=3">за 3 дня</a>
                                    </li>
                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=7">за неделю</a>
                                    </li>
                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=30">за месяц</a>
                                    </li>
                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=90">за 3 месяца</a>
                                    </li>
                                    <li><a class="js-upped-period-filter-link" href="?&amp;upped_period=180">за полгода</a>
                                    </li>
                                </ul>
                            </div>

                            <script>
                                $('.dropdown-toggle').dropdown();
                            </script>
                        </div>
                    </div>
                    <div class="select_widjet">



                        <div class="related">

                            <div class="relate-filter">Зарплата</div>

                            <div class="filter">
                                <a href="?search%5Bsalary_fr_byr%5D%5B100%5D=1" data-salary="100">От 40 руб.</a>
                                <span>14</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bsalary_fr_byr%5D%5B160%5D=1" data-salary="160">От 600 руб.</a>
                                <span>13</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bsalary_fr_byr%5D%5B600%5D=1" data-salary="600">От 1200 руб.</a>
                                <span>9</span>
                            </div>
                            <!--div class="filter">
                                <a href="?search%5Bsalary_fr_byr%5D%5B900%5D=1" data-salary="900">От 900 руб.</a>
                                <span>13</span>
                            </div-->
                            <div class="filter">
                                <a href="?search%5Bsalary_fr_byr%5D%5B1500%5D=1" data-salary="1500">От 1 500 руб.</a>
                                <span>6</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bsalary_fr_byr%5D%5B0%5D=1" data-salary="0">Не указана</a>
                                <span>6</span>
                            </div>
                            <div class="relate-filter">График работы</div>

                            <div class="filter">
                                <a href="?search%5Bschedule%5D%5Bfull%5D=1">Фиксированный</a>
                                <span>13</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bschedule%5D%5Bflexible%5D=1">Гибкий</a>
                                <span>10</span>
                            </div>
                            <!--div class="filter">
                                <a href="?search%5Bschedule%5D%5Bexchange%5D=1">Сменный</a>
                                <span>1</span>
                            </div-->
                            <div class="relate-filter">Занятость</div>

                            <div class="filter">
                                <a href="?search%5Boccupation%5D%5Bfull%5D=1">Полная</a>
                                <span>18</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Boccupation%5D%5Bpart%5D=1">Частичная</a>
                                <span>4</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Boccupation%5D%5Bonce%5D=1">Разовая</a>
                                <span>3</span>
                            </div>
                            <div class="relate-filter">Характер работы</div>

                            <div class="filter">
                                <a href="?search%5Bnature%5D%5Boffice%5D=1">На территории работодателя</a>
                                <span>19</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bnature%5D%5Bremote%5D=1">Работа на дому</a>
                                <span>6</span>
                            </div>
                            <!--div class="filter">
                                <a href="?search%5Bnature%5D%5Btravel%5D=1">Разъездной</a>
                                <span>1</span>
                            </div-->
                            <div class="relate-filter">Уровень образования</div>

                            <div class="filter">
                                <a href="?search%5Beducation_vac%5D%5Bno-matter%5D=1">Не имеет значения</a>
                                <span>9</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Beducation_vac%5D%5Bprof-tech%5D=1">Профессионально-техническое образование и ниже</a>
                                <span>10</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Beducation_vac%5D%5Bpart-high%5D=1">Средне специальное образование и ниже</a>
                                <span>20</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Beducation_vac%5D%5Bhigh%5D=1">Высшее образование и ниже</a>
                                <span>20</span>
                            </div>
                            <div class="relate-filter">Опыт работы</div>

                            <div class="filter">
                                <a href="?search%5Bexperience_vac%5D%5Bno-matter%5D=1">Не имеет значения</a>
                                <span>3</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bexperience_vac%5D%5Bfrom-1%5D=1">До 2 лет</a>
                                <span>6</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bexperience_vac%5D%5Bfrom-2%5D=1">До 3 лет</a>
                                <span>15</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bexperience_vac%5D%5Bfrom-3%5D=1">До 5 лет</a>
                                <span>20</span>
                            </div>
                            <!--div class="filter">
                                <a href="?search%5Bexperience_vac%5D%5Bfrom-5%5D=1">Более 5 лет</a>
                                <span>38</span>
                            </div-->
                            <div class="relate-filter">Студент</div>

                            <div class="filter">
                                <a href="?search%5Bstudent%5D%5Bno%5D=1">Нет</a>
                                <span>7</span>
                            </div>
                            <div class="filter">
                                <a href="?search%5Bstudent%5D%5Byes%5D=1">Можно</a>
                                <span>13</span>
                            </div>
                            <div class="relate-filter">Город</div>

                            <div class="filter">
                                <a href="?search%5Bcity%5D%5B%D0%9C%D0%B8%D0%BD%D1%81%D0%BA%5D=1">Минск</a>
                                <span>17</span>
                            </div>


                            <!--div class="filter">
                            <a href="?search%5Bcity%5D%5B%D0%91%D1%80%D0%B5%D1%81%D1%82%5D=1">Брест</a>
                            <span>1</span>
                        </div-->


                            <div class="filter">
                                <a href="?search%5Bcity%5D%5B%D0%9C%D0%BE%D0%B3%D0%B8%D0%BB%D0%B5%D0%B2%5D=1">Могилев</a>
                                <span>1</span>
                            </div>


                            <!--div class="filter">
                            <a href="?search%5Bcity%5D%5B%D0%93%D1%80%D0%BE%D0%B4%D0%BD%D0%BE%5D=1">Гродно</a>
                            <span>1</span>
                        </div-->


                            <div class="filter">
                                <a href="?search%5Bcity%5D%5B%D0%93%D0%BE%D0%BC%D0%B5%D0%BB%D1%8C%5D=1">Витебск</a>
                                <span>2</span>
                            </div>



                        </div>


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
                                <span class="" style="font-size: 12px;font-style: italic;color: #7c7c7c;">20</span>
                            </div>
                            <span class="sortable table-ajax-control no-scroll">
                                <div class="search-list__sortable sortable-dropdown dropdown">
                                    Сортировать
                                    <span class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <span>по дате обновления</span>
                                        <i class="caret"></i>
                                    </span>
                                    <ul class="sortable-dropdown-menu dropdown-menu" role="menu">
                                        <li class="checked">
                                            <span>по дате обновления</span>
                                        </li>
                                        <li>
                                            <a href="#">по возрастанию зарплаты</a>
                                        </li>
                                        <li>
                                            <a href="#">по убыванию зарплаты</a>
                                        </li>
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
                        <ul class="search-list">
                            <?php foreach ($dataProvider->models as $vacancy):?>
                            <li class="free vac-small">
                                <div class="vac-small__column vac-small__column_1"></div>
                                <div class="vac-small__column vac-small__column_2">
                                    <div>
                                        <a class="vac-small__title" href="#">Менеджер по продаже косметики</a>
                                    </div>

                                    <div class="vac-small__salary">
                                        <span class="salary-dotted">
                                            700	руб.</span>
                                    </div>

                                    <div class="vac-small__experience">
                                        <div class="vac-small__experience-item"><i class="icon-signal"></i>Опыт работы не имеет значения</div>
                                        <div class="vac-small__experience-item"><i class="icon-graduation-cap"></i>Высшее образование</div>
                                    </div>

                                    <div class="vac-small__upd">
                                        <a href="#">ООО «Глобал бизнес»</a>
                                        <span  style="padding-left: 8px">|</span>
                                        <div class="vac-small__city">
                                            <i></i><span style="color:#4b4f54;">Минск</span>
                                        </div>
                                        <span style="padding-right: 8px">|</span>
                                        <span class="nowrap">27 декабря 2016, 09:22</span>
                                    </div>
                                </div>
                            </li>
                            <?php endforeach;?>
                        </ul>
                        <!-- endVacancies -->
                        <!-- Navigation -->
                        <div class="table-ajax-control">
                            <div class="pagination">
                                <ul class="pagination__list">
                                    <li class="pagination__item disabled">
                                        <span>
                                            <i class="icon-fast-bw"></i>
                                        </span>
                                    </li>
                                    <li class="pagination__item pagination__item_current disabled">
                                        <span>←</span>
                                    </li>
                                    <li class="pagination__item pagination__item_active">
                                        <span>1</span>
                                    </li>
                                    <li class="pagination__item">
                                        <a href="?page=2">2</a>
                                    </li>
                                    <li class="pagination__item">
                                        <a href="?page=2">→</a>
                                    </li>
                                    <li class="pagination__item">
                                        <a href="?page=2">
                                            <i class="icon-fast-fw"></i>
                                        </a>
                                    </li>
                                </ul>
                                
                                <div class="pagination__count">Показано <span>1</span> – <span>30<span> из <span>31<span></span></span></span></span></div>
                            </div>
                        </div>
                         <!-- endNavigation -->
                    </div>
                    
                    <div style="display: table-cell; width:29.5%;"><img src="../img/22284.jpg" alt="" style="width: 87%;"></div>
                    
                </div>
            </div>
        </div>      
    </div>    
</div>


<?php // echo $this->render('_search', ['model' => $searchModel]); ?>

<?= Html::a('Create Vacancies', ['create'], ['class' => 'btn btn-success']) ?>

<?=
GridView::widget([
    'dataProvider' => $dataProvider,
    'filterModel' => $searchModel,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],
        'id',
        'title',
        'salary',
        'is_for_student',
        'description:ntext',
        // 'is_responseble',
        // 'is_contactable',
        // 'contact_person',
        // 'views',
        // 'created_at',
        // 'updated_at',
        // 'expiriencies_id',
        // 'education_id',
        // 'organizations_id',
        // 'statuses_id',
        // 'members_id',
        ['class' => 'yii\grid\ActionColumn'],
    ],
]);
?>
