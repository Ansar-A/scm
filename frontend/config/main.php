<?php
$params = array_merge(
    require __DIR__ . '/../../common/config/params.php',
    require __DIR__ . '/../../common/config/params-local.php',
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'frontend\controllers',
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            'bsVersion' => '5.x', // Jika menggunakan Bootstrap 5
            'downloadAction' => 'gridview/export/download',
        ],
    ],

    'components' => [
        'assetManager' => [
            'bundles' => [
                'kartik\base\AssetBundle' => [
                    'depends' => [
                        'yii\bootstrap5\BootstrapAsset', // Menggunakan Bootstrap 5
                        'yii\bootstrap5\BootstrapPluginAsset',
                    ],
                ],
                // Override BootstrapAsset jika diperlukan
                'yii\bootstrap\BootstrapAsset' => [
                    'class' => 'yii\bootstrap5\BootstrapAsset', // Bootstrap 5
                ],
                'yii\bootstrap\BootstrapPluginAsset' => [
                    'class' => 'yii\bootstrap5\BootstrapPluginAsset', // Bootstrap 5 plugin
                ],
            ],
        ],
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\Suppliers',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => \yii\log\FileTarget::class,
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        
    ],
    'params' => $params,
];
