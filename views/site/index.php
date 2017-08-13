<?php

use yii\helpers\Url;

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="findjob ">
    <div class="layer ">
        <div class="iner-wrap">
            <div class="search_box">
                <form name="search-form" action="<?= Url::toRoute('vacancies/index') ?>" class="search_form">
                    <div class="row" style="margin: 0;width: 100%; display: block;position: absolute;">
                        <div class="sup_form">
                            <div class="col-xs-6" style="width: 15%; padding: 0px; display: block;">
                                <div class="input-group ">
                                    <div class="input-group-btn" style="width: 50%;">
                                        <button type="button" class="btn btn-default dropdown-toggle find" data-toggle="dropdown" aria-expanded="false" style=" width: 100%; margin: 0; border-radius: 4px 0px 0px 4px;     background: white;    outline: 0; text-align: left;">
                                            <?php if (isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'): ?>
                                                Вакансии
                                            <?php else: ?>
                                                Резюме
                                            <?php endif; ?>
                                            <span class="caret" style="float: right; margin-top: 8px;"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <?php if (isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'): ?>
                                                <li><a href="<?= Url::current(['searchType' => 'summaries']); ?>">Резюме</a></li>
                                            <?php else: ?>
                                                <li><a href="<?= Url::current(['searchType' => 'vacancies']); ?>">Вакансии</a></li>
                                            <?php endif; ?>

                                        </ul>
                                    </div>

                                </div>
                            </div>
                            <div class="inp_unvis" style="
                                 display: block;
                                 border-left: 1px solid #5F9EA0;
                                 border-right: 1px solid #5F9EA0;
                                 float: left;">
                                <?php if (isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'): ?>
                                    <input type="text" name="VacanciesSearch[title]" class="form-control" placeholder="Найти вакансию, например: Менеджер" style="height: 44px; border-radius: 0px; border: none;">
                                <?php else: ?>
                                    <input type="text" name="VacanciesSearch[title]" class="form-control" placeholder="Найти резюме, например: Менеджер" style="height: 44px; border-radius: 0px; border: none;">
                                <?php endif; ?>             
                            </div>
                        </div>
                        <div class="sup_form">
                                <?php if (isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'): ?>
                                        <div class="param_unvis" style="height: inherit;width: 12%;white-space: nowrap;text-align: center;outline: 0;font-size: 100%;vertical-align: middle;border-right: 1px solid #5F9EA0;float: left; position: relative;line-height: 44px;">
                                        <div><button data-toggle="modal" data-target="#modalVacancies" class="param_btn" onclick="return false;"><i class="icon-sliders"></i>Параметры</button></div>
                                    <?php else: ?>
                                        <div class="param_unvis" style="height: inherit;width: 16%;white-space: nowrap;text-align: center;outline: 0;font-size: 100%;vertical-align: middle;border-right: 1px solid #5F9EA0;float: left; position: relative;line-height: 44px;">
                                        <div><button data-toggle="modal" data-target="#modalSummaries" class="param_btn" onclick="return false;"><i class="icon-sliders"></i>Параметры</button></div>
                                    <?php endif; ?>
                                </div>
                                    <?php if (isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'): ?>
                                    <div class="loc_unvis" style="width: 4%; height: 44px; white-space: nowrap;text-align: center;outline: 0;font-size: 1.0em;border-right: 1px solid #5F9EA0;float: left; position: relative;">
                                        <a href="<?= Url::toRoute('vacancies/map'); ?>" style="display: table-cell;vertical-align: middle;"> 
                                            <i class="icon-location" ></i>
                                        </a>                                   
                                    </div>
                                    <?php endif; ?>     
                            </div>
                            <div style="display: block;position: relative;float: left;width: 15%;">
                                <input name="search" type="submit" value="Найти" tabindex="5" class="search__submit js-search-bar-submit">
                            </div>
                        </div>
                    </div>
                </form>

                <div class="ads">
                    <div class="hd">
                        <h1><?= app\controllers\getMainText(); ?></h1>
                    </div>
                    <div class="num">
                        <h2>Вакансий: <?= $countVacancies; ?></h2>
                        <h2>Резюме: <?= $countSummaries; ?></h2>
                    </div>
                    <div class="ad">
                        <div class="get_vak">
                            <button class="but_vak button">Разместить вакансию</button>
                        </div>
                        <div class="get_res">
                            <button class="but_res button">Разместить резюме</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
<div id="modalSummaries" class="modal fade" role="dialog">
    <div class="modal-dialog">
    <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Расширенный поиск резюме</h4>
          </div>
          <div class="modal-body">
            
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-success" data-dismiss="modal">Найти</button>
          </div>
        </div>
    </div>
</div>

<?php if (isset($_REQUEST['searchType']) && $_REQUEST['searchType'] == 'vacancies'): ?>
   <?= $this->render('_search_vacancies', compact(
        'searchModel',
        'schedule',
        'education',
        'employment',
        'natureOfWork',
        'expiriencies',
        'student',
        'salaries'));
    ?>
<?php endif;?>