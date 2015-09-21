<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\theme\theme4\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class asset4 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        //bootstrap.min.
        'theme/theme4/css/bootstrap.min.css',
        'theme/theme4/css/modern-business.css',
        'theme/theme4/font-awesome/css/font-awesome.min.css',
        
    ];
    public $js = [
        'theme/theme4/js/bootstrap.min.js',
        'theme/theme4/js/jquery.js',
        'theme/theme4/js/jqBootstrapValidation.js',
        
    ];    
      
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}
