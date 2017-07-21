<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/animation.css',
        'css/bootstrap-theme.min.css',
        'css/fontello-codes.css',
        'css/fontello-embedded.css',
        'css/fontello-ie7-codes.css',
        'css/fontello-ie7.css',
        'css/fontello.css',
        'css/materialdesignicons.css',
        'css/materialdesignicons.min.css',
        'css/style.css',
    ];
    public $js = [
        'js/script.js',
        'js/bootstrap.min.js'
    ];
    
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD, 'async' => 'async'];
    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
