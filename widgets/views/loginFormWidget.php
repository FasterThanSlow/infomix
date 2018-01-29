<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\bootstrap\Modal;
  
?>
<?php Modal::begin([
    'header' => false,
    'footer' => false,
]);
?>

<?php
Modal::end();
?>

 <div id="login-modal" class="modal fade">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-applicant-auth modal-body">
                <div id="login-error-area" class="alert alert-error alert_small"></div>
                <section class="auth">
                    <div class="auth__wrapper">
                        <div class="auth__title h3-like registr-title">Вход</div>
                        
                        <?php $form = ActiveForm::begin([
                            'options' => ['class' => 'auth__form'],
                            'enableAjaxValidation' => true,
                            'validateOnBlur' => false,
                            'validateOnChange' => false,
                            'validateOnType' => false,
                            'action' => ['/user/login'],
                            
                        ]); ?>
                                                
                        <div>
                            <dl>
                                <dt>Логин <span class="red-star">*</span>  <span id="praca-login-help-email" class="help-icon" data-original-title="" title=""></span></dt>
                                <dd>
                                    <?= $form->field($model, 'login')->textInput(['class'=>'form-etc account-area auth__text-input'])->label(false); ?>
                                </dd>
                                <dt>Пароль <span class="red-star">*</span>  <span id="praca-login-help-password" class="help-icon" data-original-title="" title=""></span></dt>
                                <dd>
                                    <?= $form->field($model, 'password')->passwordInput(['class'=> 'form-etc xxx account-password auth__text-input'])->label(false); ?>
                                </dd>
                                <dd id="web-forms__collection_dd_js-advanced-checkbox-58b687df2a428__item">
                                    <label class="ui-checkboxradio-label ui-corner-all ui-button ui-widget ui-checkboxradio-checked ui-state-active">
                                        <span class="ui-checkboxradio-icon ui-corner-all ui-icon ui-icon-background ui-icon-check ui-state-checked ui-state-hover"></span>
                                        <span class="ui-checkboxradio-icon-space"> </span>
                                        <div class="advanced-checkbox">
                                            <?= $form->field($model, 'rememberMe')->checkbox([
                                                'class'=>'ui-checkboxradio ui-helper-hidden-accessible',
                                                'id'=>'js-advanced-checkbox-58b687df2a428',
                                                'template' => '{input} <p style="display:inline">запомнить меня</p>',
                                            ])->label(false); ?>
                                        </div>
                                        <span id="praca-login-help-remember" class="help-icon" data-original-title="" title=""></span>
                                    </label> 
                                </dd>
                                   <?= Html::submitInput('Войти', ['class' => 'btn btn_green', 'name' => 'login-button']); ?><a class="forget-password" style='margin-left: 5px;' href="<?= yii\helpers\Url::toRoute('user/recovery/request')?>" tabindex="-1">Забыли пароль?</a> </dd>
                            </dl>
                        </div>
                                                
                        <?php $form->end();?>

                        <div class="social-binding social-binding_login">
                            <p class="social-binding__note social-binding__note_login">Вход через социальную сеть</p>
                            <ul class="social-binding__list clearfix">
                                <li class="social-binding__item"><a class="social-icon social-icon_google-plus" href="<?= yii\helpers\Url::to(['/user/security/auth','authclient'=>'google'])?>"><i class="mdi mdi-google-plus"></i></a></li>
                                <li class="social-binding__item"><a class="social-icon social-icon_facebook" href="<?= yii\helpers\Url::to(['/user/security/auth','authclient'=>'facebook'])?>"><i class="mdi mdi-facebook"></i></a></li>
                                <li class="social-binding__item"><a class="social-icon social-icon_twitter" href="<?= yii\helpers\Url::to(['/user/security/auth','authclient'=>'twitter'])?>"><i class="mdi mdi-twitter"></i></a></li>
                                <li class="social-binding__item"><a class="social-icon social-icon_vk" href="<?= yii\helpers\Url::to(['/user/security/auth','authclient'=>'vkontakte'])?>"><i class="mdi mdi-vk"></i></a></li>
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
                                <a href="<?= \yii\helpers\Url::toRoute(['/user/registration/register','type'=>'applicant'])?>" class="btn btn_green">Регистрация соискателя</a>
                            </div>

                            <div class="reg-invite__wrapper">
                                <div class="h3-like registr-title">Работодателям</div>
                                <p class="reg-invite__description">
                                    <noindex>Зарегистрировавшись, работодатели могут размещать свои&nbsp;вакансии.</noindex>
                                </p>
                                <a href="<?= \yii\helpers\Url::toRoute(['/user/registration/register','type'=>'employer'])?>" class="btn btn_orange">Регистрация работодателя</a>
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
                        <i class="mdi mdi-close"></i>
            </button>
            
        </div>
    </div>
</div>