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
    "Staradmin/src/assets/vendors/feather/feather.css",
    "Staradmin/src/assets/vendors/mdi/css/materialdesignicons.min.css",
    "Staradmin/src/assets/vendors/ti-icons/css/themify-icons.css",
    "Staradmin/src/assets/vendors/font-awesome/css/font-awesome.min.css",
    "Staradmin/src/assets/vendors/typicons/typicons.css",
    "Staradmin/src/assets/vendors/simple-line-icons/css/simple-line-icons.css",
    "Staradmin/src/assets/vendors/css/vendor.bundle.base.css",
    "Staradmin/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css",
    "Staradmin/src/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.css",
    "Staradmin/src/assets/js/select.dataTables.min.css",
    "Staradmin/src/assets/css/style.css",
    "Staradmin/src/assets/images/favicon.png",
    ];
    public $js = [
    "Staradmin/src/assets/vendors/js/vendor.bundle.base.js",
    "Staradmin/src/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js",
    "Staradmin/src/assets/vendors/chart.js/chart.umd.js",
    "Staradmin/src/assets/vendors/progressbar.js/progressbar.min.js",
    "Staradmin/src/assets/js/off-canvas.js",
    "Staradmin/src/assets/js/template.js",
    "Staradmin/src/assets/js/settings.js",
    "Staradmin/src/assets/js/hoverable-collapse.js",
    "Staradmin/src/assets/js/todolist.js",
    "Staradmin/src/assets/js/jquery.cookie.js",
    // "Staradmin/dist/assets/js/dashboard.js",
    "Staradmin/src/assets/js/dashboard.js",
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap5\BootstrapAsset',
    ];
}
