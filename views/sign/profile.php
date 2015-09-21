<?php
    ///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id()) {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}
?>
<div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Profile
                    <small><?= $sign->fname ?></small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/yii2basic/web/index.php?r=site%2Findex">Home</a>
                    </li>
                    <li class="active">Blog Home One</li>
                </ol>
            </div>
</div>
<div>
    <div class="row" >
        <span class="col-lg-6 well">
            <div class="fa fa-camera-retro fa-3x"></div>
            <center>                
                <a href="/yii2basic/web/index.php?r=sign%2Fupdate"><img class="img-circle" src="uploaded/profile/<?= $sign->path_image ?>" alt="Mountain View" style="width:304px;height:304px;"></a>
                <h3>Your Picture Profile </h3>
            </center>
            
        </span>    
        <span class="col-lg-6">               
            <div class="panel panel-primary">
                <div class="panel-body ">
                    <h2  class="panel-title ">Your Information</h2>
                </div>
                <div class="panel-footer ">                    
                    <h4><abbr > First Name : </abbr> <abbr class="text-info"><?= $sign->fname ?></abbr>  </h4> 
                    <h4><abbr > Last Name : </abbr> <abbr class="text-info"><?= $sign->lname ?></abbr>  </h4>  
                    <h4><abbr > User ID &nbsp&nbsp&nbsp&nbsp&nbsp: </abbr> <abbr class="text-info"><?= $sign->user_id ?></abbr>  </h4> 
                    <h4><abbr > E-mail&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </abbr> <abbr class="text-info"><?= $sign->email ?></abbr>  </h4> 
                    <h4><abbr > Gender&nbsp&nbsp&nbsp&nbsp&nbsp : </abbr> <abbr class="text-info"><?= $sign->sex ?></abbr>  </h4> 
                    <h4><abbr > Status &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp : </abbr> <abbr class="text-info"><?= $sign->status ?></abbr>  </h4> 
                    <h4><abbr > Date/time&nbsp&nbsp : </abbr> <abbr class="text-info"><?= $sign->Date_time ?></abbr>  </h4>  
                    <br><br><br>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href="/yii2basic/web/index.php?r=sign%2Fupdate_form"><i class="fa fa-pencil-square-o fa-5x"></i></a>
                    &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                    <a href="/yii2basic/web/index.php?r=site%2Findex"><i class="fa fa-home fa-5x"></i></a>
                    <br>
                </div>
            </div>
                
            
        </span>
    </div>
</div>
<!--<a class="btn btn-primary" href="/yii2basic/web/index.php?r=sign%2Fupdate" role="button">Update</a>-->

<!--/yii2basic/web/index.php?r=sign%2Fupdate-->
<script>
    $(function(){
		$("#update").click(function() {
			window.location.href='/yii2basic/web/index.php?r=sign%2Fupdate'
		});
	});
</script>