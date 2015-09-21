<?php
///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id() and $session['status'] != 'member') {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}
?>


<div class="container-fluid">
    <div class="col-md-6" >
        <div class="panel panel-danger">
            <div class="panel-heading"><strong> <h1>Edit Member</h1> </strong></div>
        </div>
        <hr>
        <form method="post" action="">
            <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                
            <h3>ID <?= $sign[$id]->user_id ?></h3>
            <hr>

            
                <label  class="col-sm-3 control-label">First Name</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="<?= $sign[$id]->fname ?>" disabled="disabled">
                </div>    
                <br><br>

                <label  class="col-sm-3 control-label">Last Name</label>
                <div class="col-sm-8">
                   <input type="text" class="form-control"   placeholder="<?= $sign[$id]->lname ?>" disabled="disabled">
                </div>
                <br><br>
                <label  class="col-sm-3 control-label">Sex</label>
                    <div class="checkbox col-sm-8" >

                     <?php if($sign[$id]->sex =='man') $define = 'checked="checked"';
                           else $define = '';
                     ?>       
                           <input type="radio" name="sex" disabled value="man"<?= $define ?> > man


                     <?php if($sign[$id]->sex=='woman') $define = 'checked="checked"';
                               else $define = '';
                     ?>      
                            <input type="radio" name="sex" disabled value="woman"<?= $define ?> > woman

                    </div>
                <br><br>                
                <label  class="col-sm-3 control-label">Email</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control"  placeholder="<?= $sign[$id]->email ?>" disabled="disabled">
                </div>
                <br><br>           
                <label  class="col-sm-3 control-label">Status</label>
                    <div class="col-sm-8">
                        <input type="text" class="form-control" name="status"  placeholder="Status" value="<?= $sign[$id]->status ?>" required>
                    </div>
               <br><br>
                <label  class="col-sm-3 control-label">Activate</label>
                <div class="col-sm-8">
                    <input type="text" class="form-control" placeholder="Activate" name="activate" value="<?= $sign[$id]->activate ?>" required>
                </div>
                
                <BR><BR><BR>
                <label  class="col-sm-3 control-label"></label>
                <div class="col-sm-8">
                    <button type="submit"  class="btn btn-primary" >Save</button>
                    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                    <a class="btn btn-danger" href="/yii2basic/web/index.php?r=option%2Fview_member"> Back</a>
                </div>
            
        </form>    
    </div>   
    <div class="col-md-6" >
        <br><br><br>
        <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Picture profile</h3>
            </div>
            <div class="panel-body">
                <br><br>
               <center>
                   <img class="img-circle" src="uploaded/profile/<?= $sign[$id]->path_image ?>" style="width:304px;height:304px;" >
                </center>    
                <br><br>
            </div>
        </div>
        
        
    </div>
        
</div>





