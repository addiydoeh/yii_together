<?php
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\web\theme\theme4\assets\asset4;
use yii\web\Session;

/* @var $this \yii\web\View */
/* @var $content string */

asset4::register($this);
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

    <!-- ใส่เพิ่มขึ้นมาเพราะ ใช้ onclick confirm ของ jquery ไม่ได้ -->
    <!--<script src="/yii2basic/web/theme/theme4/js/jquery.min.js"></script>-->
    <!-- <script src="/yii2basic/web/theme/theme4/js/jquery-2.1.4"></script>-->
    <script src="/yii2basic/web/theme/theme4/js/jquery.js"></script>
    
    <!-- สำหรับหน้า update_form ลองใช้ ajax --> 
    <!--<script src="/yii2basic/web/theme/theme4/js/ajax_update_form.js"></script>-->
    <style>
        #map {
        height: 50%;
        width: 50%
      }
    </style>
  </head>
<!-- NAVBAR
================================================== -->
  <body>
  <?php $this->beginBody() ?>
  <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="/yii2basic/web/index.php?r=site%2Findex">TripAdward</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                                                         
                    <?php
                        $session = Yii::$app->session;
                        $session->open();
                        if($session['status']=='admin'||$session['status']=='member') {
                            ?>
                            
                            <li>
                              <a href="/yii2basic/web/index.php?r=sign%2Flogout">Logout(<?= $session['fname'] ?>)</a>
                            </li>
                            <li>
                                <a href="/yii2basic/web/index.php?r=site%2Fcontact">contact</a>
                            </li>
                            <li>
                                <a href="/yii2basic/web/index.php?r=sign%2Fprofile">Profile</a>
                            </li>
                            <?php
                        }else { ?>                        
                            <li>
                              <a href="/yii2basic/web/index.php?r=sign%2Flogin">Login</a>
                            </li>
                            <?php
                        }
                        if($session['status']=='admin') {
                            ?>
                            <li>
                              <a href="/yii2basic/web/index.php?r=option%2F">Option</a>
                            </li>
                            <?php
                        }
                    ?>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Portfolio <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="portfolio-1-col.html">1 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-2-col.html">2 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-3-col.html">3 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-4-col.html">4 Column Portfolio</a>
                            </li>
                            <li>
                                <a href="portfolio-item.html">Single Portfolio Item</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Blog <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="blog-home-1.html">Blog Home 1</a>
                            </li>
                            <li>
                                <a href="blog-home-2.html">Blog Home 2</a>
                            </li>
                            <li>
                                <a href="blog-post.html">Blog Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Other Pages <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li>
                                <a href="full-width.html">Full Width Page</a>
                            </li>
                            <li>
                                <a href="sidebar.html">Sidebar Page</a>
                            </li>
                            <li>
                                <a href="faq.html">FAQ</a>
                            </li>
                            <li>
                                <a href="404.html">404</a>
                            </li>
                            <li>
                                <a href="pricing.html">Pricing Table</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    

    <!-- Page Content -->
    <div class="container">
        <br>
        <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
                
        </div>
        
        

        <hr>
        <!-- Call to Action Section -->
        <div class="well">
            <div class="row">
                <div class="col-md-8">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias, expedita, saepe, vero rerum deleniti beatae veniam harum neque nemo praesentium cum alias asperiores commodi.</p>
                </div>
                <div class="col-md-4">
                    <a class="btn btn-lg btn-default btn-block" href="#">Call to Action</a>
                </div>
            </div>
        </div>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; Create By Ratchanon Sermthanawisan 1993</p>
                </div>
            </div>
        </footer>

    </div>
    
    <script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
    </script>

  <?php $this->endBody() ?>  
  </body>
</html>
<?php $this->endPage() ?>
