<?php
///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id() and $session['status'] != 'member') {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}
?>
<div class="col-md-offset-0 col-md-5" >
    
    <div class="container-fluid">
        <div class="panel panel-danger">
            <div class="panel-heading"><strong> <h1>Edit Travel</h1> </strong></div>
        </div>
        
        
    
    
    
    
    
    
    
    
    </div>
</div>