<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\theme\startboot\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class bootasset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        'theme/startboot/css/bootstrap.css',
        'theme/startboot/css/modern-business.css',
        'theme/startboot/css/font-awesome.min.css',
    ];
    public $js = [
        'theme/startboot/js/bootstrap.js',
        'theme/startboot/js/contact_me.js',
        'theme/startboot/js/jqBootstrapValidation.js',
        'theme/startboot/js/jquery.js', 
        
    ];    
    public $fonts = [
        'glyphicons-halflings-regular.eot',
        'glyphicons-halflings-regular.svg',
        'glyphicons-halflings-regular.ttf',
        'glyphicons-halflings-regular.woff', 
        'glyphicons-halflings-regular.woff2', 
    ];    
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
