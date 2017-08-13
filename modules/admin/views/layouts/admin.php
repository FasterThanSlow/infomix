<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

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
    <title>Администрирование | <?= Html::encode($this->title) ?></title>
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
                        <button style="background: none; border: none; outline: 0; color:#5d4484; line-height: 45px;font-size: 1.4em;" data-toggle="modal" data-target="#myModal">Вход</button>
                        <span style="margin-left: 5px;margin-right: 5px;">|</span>
                        <button style="background: none; border: none; outline: 0;color: #5d4484;line-height: 45px;font-size: 1.4em;" data-toggle="modal" data-target="#myModal">Регистрация</button>
                        <div id="myModal" class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-applicant-auth modal-body">
                                        <div id="login-error-area" class="alert alert-error alert_small"></div>
                                        <section class="auth">
                                            <div class="auth__wrapper">
                                                <div class="auth__title h3-like registr-title">Вход</div>
                                                <!--script src="/forms/js/third-party/jquery.form.min.js" type="text/javascript"></script>
                        <script src="/js/praca/auth-ajax-form.js" type="text/javascript"></script-->
                                                <form name="login-form" method="post" class="auth__form" id="login-form">
                                                    <div>
                                                        <dl>
                                                            <dt>E-mail <span class="red-star">*</span>  <span id="praca-login-help-email" class="help-icon" data-original-title="" title=""></span></dt>
                                                            <dd>
                                                                <input name="login-form[email]" type="text" maxlength="255" class="form-etc account-area auth__text-input"> </dd>
                                                            <dt>Пароль <span class="red-star">*</span>  <span id="praca-login-help-password" class="help-icon" data-original-title="" title=""></span></dt>
                                                            <dd>
                                                                <input name="login-form[password]" type="password" maxlength="16" class="form-etc xxx account-password auth__text-input"> </dd>
                                                            <dd id="web-forms__collection_dd_js-advanced-checkbox-58b687df2a428__item">
                                                                <label class="ui-checkboxradio-label ui-corner-all ui-button ui-widget ui-checkboxradio-checked ui-state-active"><span class="ui-checkboxradio-icon ui-corner-all ui-icon ui-icon-background ui-icon-check ui-state-checked ui-state-hover"></span><span class="ui-checkboxradio-icon-space"> </span><div class="advanced-checkbox"><input name="login-form[remember]" type="checkbox" checked="checked" value="1" id="js-advanced-checkbox-58b687df2a428" class="ui-checkboxradio ui-helper-hidden-accessible"></div> запомнить меня <span id="praca-login-help-remember" class="help-icon" data-original-title="" title=""></span></label> </dd>
                                                            <dd>
                                                                <input name="login-form[referrer]" type="hidden" value="https://praca.by/"> </dd>
                                                            <dd>
                                                                <input type="submit" value="Войти" data-loading-text="Вход..." class="btn btn_green"><a class="forget-password" href="#" tabindex="-1">Забыли пароль?</a> </dd>
                                                        </dl>
                                                    </div>
                                                </form>
                                                <!--script type="text/javascript">web_forms__init_ajax_form('#login-form');</script>
                                                <script>
                                                    $(document).trigger('auth-event', ['', false]);

                                                    Praca.Common.Interface.Popovers.setupPopover($('#praca-login-help-email'), 'login_email');
                                                    Praca.Common.Interface.Popovers.setupPopover($('#praca-login-help-password'), 'login_password');
                                                    Praca.Common.Interface.Popovers.setupPopover($('#praca-login-help-remember'), 'login_remember');

                                                    $('#login-form input[type="checkbox"]').checkboxradio();
                                                </script-->
                                                <div class="social-binding social-binding_login">
                                                    <p class="social-binding__note social-binding__note_login">Вход через социальную сеть</p>
                                                    <ul class="social-binding__list clearfix">
                                                        <li class="social-binding__item"><a class="social-icon social-icon_google-plus" href="https://praca.by/social-auth/Google/"><i class="mdi mdi-google-plus"></i></a></li>
                                                        <li class="social-binding__item"><a class="social-icon social-icon_facebook" href="https://praca.by/social-auth/Facebook/"><i class="mdi mdi-facebook"></i></a></li>
                                                        <li class="social-binding__item"><a class="social-icon social-icon_twitter" href="https://praca.by/social-auth/Twitter/"><i class="mdi mdi-twitter"></i></a></li>
                                                        <li class="social-binding__item"><a class="social-icon social-icon_vk" href="https://praca.by/social-auth/Vkontakte/"><i class="mdi mdi-vk"></i></a></li>
                                                        <li class="social-binding__item"><a class="social-icon social-icon_odnoklassniki" href="https://praca.by/social-auth/Odnoklassniki/"><i class="mdi mdi-odnoklassniki"></i></a></li>
                                                    </ul>
                                                </div>
                                            </div>

                                            <div class="auth__wrapper js-dependent-auth js-default-auth">
                                                <div class="reg-invite">
                                                    <div class="reg-invite__wrapper">
                                                        <div class="h3-like registr-title">Соискателям</div>
                                                        <p class="reg-invite__description">
                                                            <noindex>Зарегистрировавшись, соискатели могут размещать резюме и откликаться на заинтересовавшие их вакансии.</noindex>
                                                        </p>
                                                        <a href="#" class="btn btn_green">Регистрация соискателя</a>
                                                    </div>

                                                    <div class="reg-invite__wrapper">
                                                        <div class="h3-like registr-title">Работодателям</div>
                                                        <p class="reg-invite__description">
                                                            <noindex>Зарегистрировавшись, работодатели могут размещать свои&nbsp;вакансии.</noindex>
                                                        </p>
                                                        <a href="#" class="btn btn_orange">Регистрация работодателя</a>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="auth__wrapper js-dependent-auth js-applicant-auth no-padding-right" style="display: none;">
                                                <div class="reg-applicant__wrapper">
                                                    <div class="fff h3-like registr-title">Регистрация соискателя</div>
                                                    <div class="text-gray">
                                                        <noindex>Еще нет аккаунта? Зарегистрируйтесь!</noindex>
                                                    </div>
                                                    <div class="info-registr-cont">
                                                        <div class="info-registr">
                                                            <i class="svg svg-publish"></i>
                                                            <span class="text-gray">Создавайте резюме</span>
                                                        </div>
                                                        <div class="info-registr">
                                                            <i class="svg svg-laptop"></i>
                                                            <span class="text-gray">Откликайтесь на вакансии</span>
                                                        </div>
                                                        <div class="info-registr">
                                                            <i class="svg svg-mail"></i>
                                                            <span class="text-gray">Получайте предложения от работодателей</span>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn_green btn_mrg-vertical">
                                                            Регистрация соискателя                            </a>

                                                    <p class="text-gray">Ищете сотрудников?
                                                        <a href="#">Регистрация работодателя</a>
                                                    </p>
                                                </div>
                                            </div>
                                            <div class="auth__wrapper js-dependent-auth js-employer-auth no-padding-right" style="display: none;">
                                                <div class="reg-applicant__wrapper">
                                                    <div class="asd h3-like registr-title">Регистрация работодателя</div>
                                                    <div class="text-gray">
                                                        <noindex>Еще нет аккаунта? Зарегистрируйтесь!</noindex>
                                                    </div>
                                                    <div class="info-registr-cont">
                                                        <div class="info-registr">
                                                            <i class="svg svg-publish"></i>
                                                            <span class="text-gray">Размещайте вакансии</span>
                                                        </div>
                                                        <div class="info-registr">
                                                            <i class="svg svg-laptop"></i>
                                                            <span class="text-gray">Получайте отклики от соискателей</span>
                                                        </div>
                                                        <div class="info-registr">
                                                            <i class="svg svg-servises"></i>
                                                            <span class="text-gray">Воспользуйтесь дополнительными услугами портала</span>
                                                        </div>
                                                    </div>
                                                    <a href="#" class="btn btn_green btn_mrg-vertical">
                                                                Регистрация работодателя                            </a>

                                                    <p class="text-gray">Ищете работу?
                                                        <a href="#">Регистрация соискателя</a>
                                                    </p>
                                                </div>
                                            </div>
                                        </section>
                                    </div>
                                    <button type="button" class="modal-close" data-dismiss="modal" aria-hidden="true">
                                                <i class="mdi mdi-close"></i></button>
                                </div>
                            </div>
                        </div>
                    </div>
    
                </div>
            </div>
        </div>
        
        <div id="mainNav">
            
            <div class="iner-wrap clearfix">
                <?php echo Nav::widget([
                    'options' => ['class' => 'menu'],
                    'items' => [
                        ['label' => 'Главная', 'url' => ['/']],
                        ['label' => 'Вакансии', 'url' => ['/vacancies/specialities-section']],
                        ['label' => 'Организации', 'url' => ['/vacancies/specialities-section']],
                    ],
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
