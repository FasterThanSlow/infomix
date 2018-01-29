<?php

use yii\helpers\Url;
/* @var $this yii\web\View */

$this->title = 'My Yii Application';
$roles = \Yii::$app->authManager->getRolesByUser(\Yii::$app->user->id);
$role = array_shift($roles);
?>
<div class="findjob ">
    <div class="layer">
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

            
            <?php if(Yii::$app->user->isGuest): ?>
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
            <?php elseif($role->name == 'Работодатель'):?>
                <nav class="loginNav">
	            <div class="ads">    
                        <ul class="menu">
                            <li><a href="#">Мои вакансии</a></li>
                            <li><a href="#">Отклики</a></li>
                            <li><a href="#">Предложения</a></li>
                            <li style="float: right;"><a href="#">Моя организация<span class="caret" style="color:white;"></span></a></li>
                        </ul>
                        <ul class="menu_unvis">
                            <li style="background-color: background-color: rgb(35,35,35);">
                                <a href="#" class="icon-menu" style="padding-left:1px; padding-right:1px;"></a>
                                <ul class="submenu_unvis">
                                    <li><a href="#">Мои вакансии</a></li>
                                    <li><a href="#">Отклики</a></li>
                                    <li><a href="#">Предложения</a></li>
                                    <li><a href="#">Статистика</a></li>
                                    <li><a href="#">Отложенные</a></li>
                                </ul>
                                <li style="float: right;"><a href="#">Моя организация<span class="caret" style="color:white;"></span></a></li>
                            </li>
                        </ul>
                    </div>
                </nav>
			    <div class="cabinet">
			        <div class="loginLeft">
                    <div class="equates_login">
                        <div style="m"><img src="img/companies/05f971b5ec196b8c65b75d2ef8267331.jpg" alt="" class="comp_img_login"></div>
                        <div><span style="font-size: 12px; color: green;">ID клиента: 54609</span></div>
                        <div style="margin: 15px 0 15px 0;"><a href="#">&laquo;ЧТУП АПРОАВТОТЕХ&raquo;</a></div>
                        <div><a href="#">Представители</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 100px;"></div><span>1</span></div>
                        <div><a href="#">Вакансии организации</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 51px;"></div><span>5</span></div>
                    </div>
                    </div>
                    <div class="loginCenter">
                        <div class="equates_login">
                            <div class="loginCenter_left">
                                <div><h4 style="font-weight: 600;">Ваш кабинет</h4></div>
                                <div style="margin: 15px 0px 15px 0px;"><span style="font-size: 12px; color: green;">Статус: Работодатель</span></div>
                                <div style="margin-bottom: 10px;"><a href="#">Опубликованные ваканси</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 109px;"></div><span>0</span></div>
                                <div style="margin-bottom: 10px;"><a href="#">Отклики в работе</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 163px;"></div><span>0</span></div>
                                <div style="margin-bottom: 10px;"><a href="#">Предложения ожидают ответа</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 80px;"></div><span>0</span></div>
                                <div><button class="but_create_vak" onclick="location.href='<?= Url::toRoute('vacancy/create') ?>';">Создать вакансию</button></div>
                            </div>
                            <div class="loginCenter_right">
                                <div><h4 style="font-weight: 600;">Вакансии и услуги</h4></div>
                                <div style="margin-top:10px; margin-bottom: 15px;"><a href="#"><span style="font-weight:800; font-size:20px;">+</span>Добавить</a></div>
                                <div style="margin-bottom: 10px;"><button class="but_prem">Премиум</button>Осталось<div style="display:inline-block; border-bottom: 2px dotted grey; width: 90px;"></div><span>0</span></div>
                                <div style="margin-bottom: 10px;"><button class="but_stand">Стандартная</button>Осталось<div style="display:inline-block; border-bottom: 2px dotted grey; width: 90px;"></div><span>0</span></div>
                                <div style="margin-bottom: 10px;"><button class="but_free">Бесплатная</button>Осталось<div style="display:inline-block; border-bottom: 2px dotted grey; width: 90px;"></div><span>0</span></div>
                                <div style="margin-bottom: 5px; ">Автообновление вакансий<div style="display:inline-block; border-bottom: 2px dotted grey; width: 84px;"></div><span>0</span></div>
                                <div >Доступ  контактам<div style="display:inline-block; border-bottom: 2px dotted grey; width: 103px;"></div><a href="#">Купить</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                 <?php elseif($role->name == 'Соискатель'):?>
                   <nav class="loginNav">
	            <div class="ads">    
                        <ul class="menu">
                            <li><a href="#">Мои резюме</a></li>
                            <li><a href="#">Отклики</a></li>
                            <li><a href="#">Предложения</a></li>                        
                        </ul>
                        <ul class="menu_unvis">
                            <li style="background-color: background-color: rgb(35,35,35);">
                                <a href="#" class="icon-menu" style="padding-left:1px; padding-right:1px;"></a>
                                <ul class="submenu_unvis">
                                    <li><a href="#">Мои резюме</a></li>
                                    <li><a href="#">Отклики</a></li>
                                    <li><a href="#">Предложения</a></li>     
                                </ul>
                            </li>
                        </ul>
                    </div>
                </nav>
			    <div class="cabinet">
                    <div class="loginCenter">
                        <div class="equates_login">
                            <div class="loginCenter_left">
                                <div><h4 style="font-weight: 600;">Ваш кабинет</h4></div>
                                <div style="margin: 15px 0px 15px 0px;"><span style="font-size: 12px; color: green;">Статус: Соискатель</span></div>
                                <div style="margin-bottom: 10px;"><a href="#">Опубликованные резюме</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 109px;"></div><span>0</span></div>
                                <div style="margin-bottom: 10px;"><a href="#">Предложения о работе</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 163px;"></div><span>0</span></div>
                                <div style="margin-bottom: 10px;"><a href="#">Отклики ожидают ответа</a><div style="display:inline-block; border-bottom: 2px dotted grey; width: 80px;"></div><span>0</span></div>
                                <div><button class="but_create_vak" onclick="location.href='<?= Url::toRoute('summary/create') ?>';">Создать резюме</button></div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endif;?>
                </div>
        </div>
    </div>
    <?php if(isset($_REQUEST['reg']) && $_REQUEST['reg'] == 'true'): 
        echo "Вы успешно зарегистрированны. Проверьте ваш электронный адрес для активации."
    ?>
    
    <?php endif;?>
    
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