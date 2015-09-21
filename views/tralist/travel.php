<?php

$session = Yii::$app->session;
$session->open();
?>
  
<div class="container-fluid">
    
    <!-- Page Heading/Breadcrumbs -->
    
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Travel
                <small>Subheading</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="/yii2basic/web/index.php?r=site%2Findex">Home</a>
                </li>
                <li class="active">Three Column Portfolio</li>
            </ol>
        </div>
    </div>
    <!-- /.row -->
    <div class="row"> 
        
        <div class="col-lg-12">
            
            <form method="post" class="form-inline ">

                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
                <div class="row ">  
                    <div class="col-md-12">
                        <div class="col-md-2" >
                            <input type="checkbox" class="checkbox" name="all" id="all" value="all" <?= $checkAll ?>> ทั้งหมด &nbsp;&nbsp;&nbsp;
                        </div>
                        <?php
                            for($i = 0 ;$i < count($typeTravel) ; $i++) {
                                ?>
                                    <div class="col-md-2" >
                                    <input type="checkbox" class="checkbox" name="check_travel[]" id="check_travel<?= $i ?>" value="<?= $typeTravel[$i]->id ?>" 
                                   
                                    <?php 
                                    if(!empty($session['check_travel'])) {
                                        for($j = 0; $j < count($session['check_travel']) ;$j++ ) {
                                            if($session['check_travel'][$j]==$typeTravel[$i]->id) {
                                                echo 'checked="checked"';
                                            }
                                        }
                                    }
                                    ?>
                                   ><?= $typeTravel[$i]->name ?> &nbsp;&nbsp;&nbsp;
                                    </div>
                            <?php
                            }
                        ?>  
                    </div>
                </div> <!--- hidden  phone -->
                
                
                <!---------- end resposive --->
                
                
                <span class="row">
                    <div class="col-xs-12">
                        <center>
                        <input hidden="true" type="text" id="countTypeTravel" value="<?= count($typeTravel) ?>">
                        <input hidden="true" type="text" id="checkAll" value="<?=  $session['checkAll'] ?>">                
                        <!--search-->
                        <div class="input-group">
                            <div class="input-group-addon"><span class="glyphicon glyphicon-search"></span></div>
                            <input type="text" class="form-control" id="txtSearch" name="txtSearch" placeholder="Search">                  
                        </div>
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <button type="submit" class="btn btn-default"><i class="fa  fa-search fa-2x"></i></button>
                        </center>
                    </div>
                </span>
                <hr>
            </form>
            <br><br><br>
            
        </div>
    </div>
    <!-- Projects Row -->
    <div class="row">
        <?php if(count($DbTravel) >= 1) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[0]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[0]->Image_id)-1]->path ?>"  alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[0]->id ?>"><?= $DbTravel[0]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[0]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
        <?php if(count($DbTravel) >= 2) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[1]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[1]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[1]->id ?>"><?= $DbTravel[1]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[1]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
        <?php if(count($DbTravel) >= 3) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[2]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[2]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[2]->id ?>"><?= $DbTravel[2]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[2]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
    </div>
    <!-- /.row -->

    <!-- Projects Row -->


    <div class="row">
        <?php if(count($DbTravel) >= 4) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[3]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[3]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[3]->id ?>"><?= $DbTravel[3]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[3]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
        <?php if(count($DbTravel) >= 5) { ?>

        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[4]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[4]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[4]->id ?>"><?= $DbTravel[4]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[4]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
        <?php if(count($DbTravel) >= 6) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[5]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[5]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[5]->id ?>"><?= $DbTravel[5]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[5]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
    </div>

    <!-- Projects Row -->
    <div class="row">

        <?php if(count($DbTravel) >= 7) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[6]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[6]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[6]->id ?>"><?= $DbTravel[6]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[6]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
        <?php if(count($DbTravel) >= 8) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[7]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[7]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[7]->id ?>"><?= $DbTravel[7]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[7]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
        <?php if(count($DbTravel) >= 9) { ?>
        <div class="col-md-4 img-portfolio">
            <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[8]->id ?>">
                <img class="img-responsive img-hover" src="<?= $modelImage[($modelIdImg[8]->Image_id)-1]->path ?>" alt="">
            </a>
            <h3>
                <a href="/yii2basic/web/index.php?r=tralist%2Fsingle_travel&id=<?= $DbTravel[8]->id ?>"><?= $DbTravel[8]->title; ?></a>
            </h3>
            <p>&nbsp;&nbsp;&nbsp;
            <?= mb_substr($DbTravel[8]->detail, 0, 150)."...." ?></p>
        </div>
        <?php } ?>
    </div>
    <!-- /.row -->

    <hr>

    <!-- Pagination -->
    <div class="row text-center">
        <div class="col-lg-12">
            <ul class="pagination">
                <li>
                    <a <?php if($page >= $pageAll-1) {?>href="http://localhost/yii2basic/web/index.php?r=tralist%2Ftravel&page=<?= $page-1 ?>"<?php } ?> >&laquo;</a>
                </li>
                <?php for($i=0 ; $i < $pageAll ; $i++) { ?>
                    
                        <li <?php if($page==$i) {?> class="active" <?php } ?> >
                            <a href="http://localhost/yii2basic/web/index.php?r=tralist%2Ftravel&page=<?= $i ?>"><?= $i+1 ?></a>
                        </li> 
                        <?php
                        }   
                    ?>

                <li>
                    <a <?php if($page < $pageAll-1) {?>href="http://localhost/yii2basic/web/index.php?r=tralist%2Ftravel&page=<?= $page+1 ?>"<?php } ?> >&raquo;</a>
                </li>
            </ul>
        </div>
    </div>
    <!-- /.row -->
</div>

<script>
    $(function(){
        var countTypeTravel = parseInt($("#countTypeTravel").val());
        if($("#checkAll").val() == 1) {
            var pat = false;
            for(var i=0; i< countTypeTravel ; i++) {
                    $("#check_travel"+i).attr('disabled','disabled');
            }
        }else{
            var pat = true;
            
        }
        $("#all").click(function() {
            if(pat){
                pat = false;
                for(var i=0; i< countTypeTravel ; i++) {
                    $("#check_travel"+i).attr('disabled','disabled');
                }
            }else {
                for(var i=0; i< countTypeTravel ; i++) {
                    pat = true;
                    $("#check_travel"+i).removeAttr('disabled');
                }
            }
            
        });
    });
    
</script>   

