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
        'css/main.css?v=6',
        'https://fonts.googleapis.com/css?family=Oswald',
        'css/fontawesome.min.css',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css',
    ];
    public $js = [
        'js/bootstrap.js',
        'js/sweetalert.min.js',
        'js/main.js?v=5',
        'js/fontawesome.min.js',
        'https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
