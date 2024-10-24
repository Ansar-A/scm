<?php

namespace consumen\assets;

use yii\web\AssetBundle;

/**
 * Main consumen application asset bundle.
 */
class AppAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        "plain/assets/css/bootstrap.min.css",
        "plain/assets/css/lineicons.css",
        "plain/assets/css/materialdesignicons.min.css",
        "plain/assets/css/fullcalendar.css",
        "plain/assets/css/fullcalendar.css",
        "plain/assets/css/main.css",
    ];
    public $js = [
        "plain/assets/js/bootstrap.bundle.min.js",
        "plain/assets/js/Chart.min.js",
        "plain/assets/js/dynamic-pie-chart.js",
        "plain/assets/js/moment.min.js",
        "plain/assets/js/fullcalendar.js",
        "plain/assets/js/jvectormap.min.js",
        "plain/assets/js/world-merc.js",
        "plain/assets/js/polyfill.js",
        "plain/assets/js/main.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
