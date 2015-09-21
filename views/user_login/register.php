<?php
use yii\helpers\Html;
use yii\helpers\BaseHtml;
/* @var $this yii\web\View */
$this->title = 'Register';

//เขียนเองทั้งหมด
?>

<style type="text/css">

</style>

<section class="container" >
    <div class="row" >
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal">
          Register
        </button>

        <!-- Modal -->
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Sign up</h4>
              </div>
              <form action="/yii2basic/web/index.php?r=user_login%2Fregister" method="post">  
                <div class="modal-body">

                        <div class="input-group">
                          <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                            <!--<input type="hidden" name="_csrf" value="M0Q5QkJlQkFFLwgXG1c4M2w3DBsKICQobC5ady9UMAYGHVY7IQQGOw==">  -->
                          <span class="input-group-addon" id="basic-addon1 ">UserID</span>
                          <input type="text" name="fname" class="form-control" placeholder="Username" aria-describedby="basic-addon1">
                        </div>

                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                  <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
              </form>   
            </div>
          </div>
        </div>
        
        <?='hi '.$fname ?>
        
    </div>  
        

</section>


