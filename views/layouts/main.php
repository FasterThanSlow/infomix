<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\widgets\LoginFormWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<header>
        <div class='head-top'>
            <div class='iner-wrap'>
                <div id='date'>
                    <script language="javascript" type="text/javascript">
                        <!--
                        var d = new Date();

                        var day = new Array("Воскресенье", "Понедельник", "Вторник",
                            "Среда", "Четверг", "Пятница", "Суббота");

                        var month = new Array("января", "февраля", "марта", "апреля", "мая", "июня",
                            "июля", "августа", "сентября", "октября", "ноября", "декабря");

                        document.write(day[d.getDay()] + " " + d.getDate() + " " + month[d.getMonth()] +
                            " " + d.getFullYear() + " г.");
                        //-->

                    </script>
                </div>
                <img src="">
                <div id="social-links">
                    <a href="#">
                        <i class="icon-facebook"></i>
                    </a>
                    <a href="#">
                        <i class="icon-twitter"></i>
                    </a>
                    <a href="#">
                        <i class="icon-youtube"></i>
                    </a>
                    <a href="#">
                        <i class="icon-vkontakte"></i>
                    </a>
                    <a href="#">
                        <i class="icon-odnoklassniki"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class='clearfix iner-wrap'>
            <div class=" head-bot clearfix">
                <div class="head-inner">
                    <?php if ((Yii::$app->controller->id != 'site') && (Yii::$app->controller->action->id != 'index')): ?>
                        <a href='<?= \yii\helpers\Url::to(Yii::$app->homeUrl)?>'><img src="../img/logo.png" /></a>
                    <?php else: ?>
                        <img style="width:100%;height: 100%;" src="<?= Yii::$app->request->BaseUrl; ?>/img/logo.png" />
                    <?php endif; ?>
                </div>
                
                <div class='top-right'>
                    <div id='logintop' class="head-inner">
                        <i class='icon-users'></i>
                        <a href='#' style="background: none; border: none; outline: 0; color:#5d4484; line-height: 45px;font-size: 1.4em;" data-toggle="modal" data-target="#login-modal">Вход</a>
                        <span style="margin-left: 5px;margin-right: 5px;">|</span>
                        <button style="background: none; border: none; outline: 0;color: #5d4484;line-height: 45px;font-size: 1.4em;" data-toggle="modal" data-target="#myModal">Регистрация</button>
                        <?= LoginFormWidget::widget([]); ?>
                    </div>
    
                </div>
            </div>
        </div>
        
        <div id="mainNav">
            
            <div class="iner-wrap clearfix">
                <?php echo Nav::widget([
                    'options' => ['class' => 'menu'],
                    'items' => app\controllers\AppController::getMainMenu(),
                ]); ?>
            </div>
           
        </div>
    </header>
    <script>$('.menu').removeClass('nav');</script>

       
    <?= $content ?>
  


<footer class='text-foot'>
        <div class=" footer-top">
            <div class="inner-wrap-foot">
                <div id="footer-fix" class="clearfix">
                    <div class='foot-menu'>
                        <h3 class='foot-menu-top'>Правила пользования</h3>
                        <ul class=''>
                            <li>
                                <a href="#">Пользовательское соглашение</a>
                            </li>
                            <li>
                                <a href="#">Политика конфеденциальности</a>
                            </li>
                            <li>
                                <a href="#">Правила размещения</a>
                            </li>
                            <li>
                                <a href="#">Публичный договор</a>
                            </li>
                        </ul>
                    </div>
                    <div class='foot-menu'>
                        <h3 class='foot-menu-top'>Обратная связь</h3>
                        <ul class=''>
                            <li>
                                <a href="#">Тарифы и услуги</a>
                            </li>
                            <li>
                                <a href="#">Соглашение на размещение</a>
                            </li>
                            <li>
                                <a href="#">Реклама на сайте</a>
                            </li>
                        </ul>
                    </div>
                    <div class='foot-menu'>
                        <h3 class='foot-menu-top'>Работодателям</h3>
                        <ul class=''>
                            <li>
                                <a href="#">Часто задаваемые вопросы</a>
                            </li>
                            <li>
                                <a href="#">Размещение резюме</a>
                            </li>
                            <li>
                                <a href="#">Контанткы</a>
                            </li>
                        </ul>
                    </div>
                    <div class='foot-menu foot-menu-right'>
                        <ul id='contacts'>
                            <li>
                                <a href="#"><i class='icon-vkontakte-rect' style="font-size: 18px"></i></a>
                                <a href="#"><i class='icon-facebook-squared'></i></a>
                                <a href="#"><i class='icon-twitter-squared'></i></a>
                                <a href="#"><i class='icon-odnoklassniki-square'></i></a>
                            </li>
                            <li>
                                Работа salam.by
                            </li>
                            <li>
                                <span>+375(29) 668 21 15</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="inner-wrap-foot">
                <div style="padding-top:10px;">Rabota.salam.by 2017, ООО &laquoАпроАвтоТех&raquo</div>
                <div style="padding-bottom:10px;">УНП 77788999 Свидетельство о государственной регистрации выдано Мингорисполкомом решением от 11.08.2003 № 856</div>
            </div>
        </div>
    </footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
