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
            <div class="panel-heading"><strong> <h1>Member</h1> </strong></div>
        </div>
        
<table class="table table-hover">
    <thead>
        <tr> <th>ID</th> <th>FirstName</th>  <th>LastName</th> <th>Sex</th> <th>Status</th> <th>Email</th> <th>Activate</th> </tr> 
    </thead>
        <?php for($i = 0 ; $i < count($sign) ; $i++) 
               
        {?>
        <tr>            
            
            <td><?= $i+1 ?></td> 
            <td><?= $sign[$i]->fname ?></td>
            <td><?= $sign[$i]->lname ?></td> 
            <td><?= $sign[$i]->sex ?></td> 
            <td><?= $sign[$i]->status ?></td> 
            <td><?= $sign[$i]->email ?></td> 
            <td><?= $sign[$i]->activate ?></td>
            <td>
                
                        <a class="btn btn-danger"  href="/yii2basic/web/index.php?r=option%2Fedit_member&id=<?= $i ?>" >
                            <span class="glyphicon glyphicon-wrench"></span> Edit
                        </a>
                
            </td> 
            <td>
                <div class="Delete">
                    <a class="btn btn-danger" href="/yii2basic/web/index.php?r=option%2Fdelete_member&id=<?= $sign[$i]->id ?>">
                        <span class="glyphicon glyphicon-trash"></span> Delete
                    </a>
                </div>
            </td> 
        </tr>
        <?php  } 
        ?>
        
        
    </table>
    </div>    
</div>

<br>
<br>
<script>
    $(function(){       
            $(".Delete").click(function() {                    
                    if(confirm("คุณต้องการที่จะลบ member นี้ ใช่หรือไม่")) {
                        return true;
                    }else {
                        return false;
                    }
                    
            });
        
    });
 </script>







