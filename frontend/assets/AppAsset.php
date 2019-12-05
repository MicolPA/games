<?php

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
        'css/bootstrap.css',
        'css/main.css?v=3',
        'https://fonts.googleapis.com/css?family=Oswald',
        'css/fontawesome.min.css',
    ];
    public $js = [
        'js/bootstrap.js',
        'js/sweetalert.min.js',
        'js/main.js',
        'js/fontawesome.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
