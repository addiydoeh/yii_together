<?php
///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id() and $session['status'] != 'member') {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}

?>


<a  href="/yii2basic/web/index.php?r=site%2Findex"><strong>Home</strong></a>&nbsp&nbsp
<a  href="/yii2basic/web/index.php?r=option%2Findex"><strong>Option</strong></a>

<BR><BR>
<BR><BR>

<div class="col-md-offset-0 col-md-5" >
    
    <div class="container-fluid">
        <div class="panel panel-primary">
            <div class="panel-heading"><strong> <h1>Travel</h1> </strong></div>
        </div>
        
<table class="table table-hover">
    <thead>
        <tr><th>Id</th>  <th>Title</th> </tr> 
    </thead>
      <?php for($i = 0 ; $i < count($travel) ; $i++) 
               
        {?>  
    <tr> 
        <td> <?= $i+1 ?></td> 
        <td> <?= $travel[$i]->title ?></td> 
         
        <td><button class="btn btn-danger">
                <a href="/yii2basic/web/index.php?r=option%2Fedit_travel&id=<?= $i ?>" >
                    <span class="glyphicon glyphicon-wrench"></span> Edit</button></a></td> 
            
                    <td><button class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> Delete
                </button>
            </td> 
    </tr>
     <?php  } 
        ?>
    
    
    
    
    </table>
    </div>    
</div>