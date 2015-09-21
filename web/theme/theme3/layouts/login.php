<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\web\theme\theme3\assets\asset3;

/* @var $this \yii\web\View */
/* @var $content string */

asset3::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
  <head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>

   
    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
  </head>
<!-- NAVBAR
================================================== -->
  <?php $this->beginBody() ?>
    <div class="navbar-wrapper">
        <div class="container">

          <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
              <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                  <span class="sr-only">Toggle navigation</span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                  <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">TripAward</a>
              </div>
              <div id="navbar" class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                  <li>
                      <?php
                    $i = '1';
                      echo Nav::widget([
                            'options' => ['class' => 'navbar-nav navbar-right'],
                            'items' => [
                                ['label' => 'Home', 'url' => ['/site/index']],
                                ['label' => 'About', 'url' => ['/site/about']],
                                ['label' => 'Contact', 'url' => ['/site/contact']],
                                ['label' => 'Test', 'url' => ['/test/blankpage']],
                                ['label' => 'DBname', 'url' => ['/dbname/index']],                                
                                ['label' => 'Travel', 'url' => ['/travel/view_travel']],                                                                                                                              
                                ['label' => 'Register', 'url' => ['/sign/index']],
                                ['label' => 'Login', 'url' => ['/sign/login']],                                
                                /*Yii::$app->user->isGuest ?
                                    ['label' => 'Login', 'url' => ['/site/login']] :
                                    ['label' => 'Logout (' . Yii::$app->user->identity->username . ')',
                                        'url' => ['/site/logout'],
                                        'linkOptions' => ['data-method' => 'post']],*/
                            ],
                        ]);
                    ?>
                   </li>
                  <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">DropDown <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/yii2basic/web/index.php?r=user_login%2Fregister">Test</a></li>
                    <li role="separator" class="divider"></li>
                    <li class="dropdown-header">Nav header</li>
                    <li><a href="/yii2basic/web/index.php?r=site%2Fabout">About</a></li>
                    
                  </ul>
                </li>
                </ul>
              </div>
            </div>
          </nav>

        </div>
    </div>    
    <div>
      <br />
      <br />
      <br />
      <br />  
      <br />
      <br />
      <br />     
      <br />
      <br />
      <br />
      <br />  
      <br />
      <br />
      <br />  
      <br />
      <br />
      <br />  
      <br />
      <br />
      <br />  
    </div>  
      
      
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
      
    <hr class="featurette-divider">

      <!-- /END THE FEATURETTES -->


      <!-- FOOTER -->
      <footer class="container">
        <p class="pull-right"><a href="#">Back to top</a></p>
        <p>&copy; 2014 Company Ratchanon, Inc. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
      </footer>  
          
  <?php $this->endBody() ?>  
  </body>
</html>
<?php $this->endPage() ?>
