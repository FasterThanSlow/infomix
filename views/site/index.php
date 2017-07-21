<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
    <div class="findjob ">
        <div class="layer ">
            <div class="iner-wrap">
                <div class="search_box">
                    <form class="search_form">
                        <div class="row" style="margin: 0;width: 100%; display: block;position: absolute;">
                            <div class="sup_form">
                                <div class="col-xs-6" style="width: 15%; padding: 0px; display: block;">
                                    <div class="input-group ">
                                        <div class="input-group-btn" style="width: 50%;">
                                            <button type="button" class="btn btn-default dropdown-toggle find" data-toggle="dropdown" aria-expanded="false" style=" width: 100%; margin: 0; border-radius: 4px 0px 0px 4px;     background: white;    outline: 0; text-align: left;">
						            Вакансии <span class="caret" style="float: right; margin-top: 8px;"></span>
						          </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#" rel="nofollow">Вакансии</a></li>
                                                <li><a href="#">Резюме</a></li>
                                            </ul>
                                        </div>

                                    </div>
                                </div>
                                <div class="inp_unvis" style="
                                    display: block;
                                    border-left: 1px solid #5F9EA0;
                                    border-right: 1px solid #5F9EA0;
                                    float: left;

                                    ">
                                    <input type="text" class="form-control" placeholder="Найти вакансию, например: Менеджер" style="height: 44px; border-radius: 0px; border: none;">
                                </div>
                            </div>
                            <div class="sup_form">
                                <div class="param_unvis" data-toggle="modal" style="height: inherit;width: 12%;white-space: nowrap;text-align: center;outline: 0;font-size: 100%;vertical-align: middle;border-right: 1px solid #5F9EA0;float: left; position: relative;line-height: 44px;">

                                    <div><button class="param_btn"><i class="icon-sliders"></i>Параметры</button></div>
                                </div>
                                <div class="loc_unvis" style="width: 4%; height: 44px; white-space: nowrap;text-align: center;outline: 0;font-size: 1.0em;border-right: 1px solid #5F9EA0;float: left; position: relative;">
                                    <i class="icon-location" style="
    display: table-cell;
    vertical-align: middle;
"></i>
                                </div>
                            </div>
                            <div style="display: block;position: relative;float: left;width: 15%;">
                                <input name="form-submit-btn" type="submit" value="Найти" tabindex="5" class="search__submit js-search-bar-submit">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="ads">
                    <div class="hd">
                        <h1>Найти работу с SALAM</h1>
                    </div>
                    <div class="num">
                        <h2>Вакансий: 1244</h2>
                        <h2>Резюме: 1368</h2>
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