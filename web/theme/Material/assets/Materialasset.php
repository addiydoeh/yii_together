<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\theme\Material\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class Materialasset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/Material/css/Material.min.css',
        'theme/Material/css/ripples.min.css',
        'theme/Material/css/material-fullpalette.min.css',
        'theme/Material/css/style.css',
        
        
    ];
    public $js = [
        'theme/Material/js/Material.min.js',
        'theme/Material/js/ripples.min.js',
    ];    
      
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
