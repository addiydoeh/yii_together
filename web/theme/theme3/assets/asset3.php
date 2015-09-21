<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\theme\theme3\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class asset3 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/theme3/css/bootstrap-theme.min.css',
        'theme/theme3/css/bootstrap.min.css', 
        'theme/theme3/css/carousel.css',  
    ];
    public $js = [
        'theme/theme3/js/bootstrap.min.js',
        'theme/theme3/js/jquery.min.js',
        'theme/theme3/js/npm.min.js',
        'theme/theme3/js/ie-emulation-modes-warning.js',
    ];    
      
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
