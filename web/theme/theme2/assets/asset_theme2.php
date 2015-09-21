<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\web\theme\theme2\assets;

use yii\web\AssetBundle;

/**
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class asset_theme2 extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        //'css/site.css',
        //'theme/theme2/css/style.css',
        'theme/theme2/css/bootstrap.min.css',
        'theme/theme2/css/bootstrap-responsive.min.css',     
    ];
    public $js = [
        'theme/theme2/js/bootstrap.js',
        'theme/theme2/js/jquery.js',
        'theme/theme2/js/bootstrap-alert.js',
        'theme/theme2/js/bootstrap-button.js',
        'theme/theme2/js/bootstrap-carousel.js',
        'theme/theme2/js/bootstrap-collapse.js',
        'theme/theme2/js/bootstrap-dropdown.js',
        'theme/theme2/js/bootstrap-modal.js',
        'theme/theme2/js/bootstrap-popover.js',
        'theme/theme2/js/bootstrap-scrollspy.js',
        'theme/theme2/js/bootstrap-tab.js',
        'theme/theme2/js/bootstrap-tooltip.js',
        'theme/theme2/js/bootstrap-transition.js',
        'theme/theme2/js/bootstrap-typeahead.js',
    ];    
      
    public $depends = [
        'yii\web\YiiAsset',
        //'yii\bootstrap\BootstrapAsset',
    ];
}
