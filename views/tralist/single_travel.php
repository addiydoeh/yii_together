<?php
    //print_r($idPathImage);
    //echo $idPathImage[2]->Image_id;

?>

<!-- Page Content -->
    <div class="container">

        <!-- Page Heading/Breadcrumbs -->
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header"><?= $travel[$id_travel]->title ?>
                    <small>Travel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="/yii2basic/web/index.php?r=tralist%2Ftravel">Travel</a>
                    </li>
                    <li class="active">Detail</li>
                </ol>
            </div>
        </div>
        <!-- /.row -->

        <!-- Portfolio Item Row -->
        <div class="row">

            <div class="col-md-8">
                <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <?php for($i = 0;$i < count($idPathImage) ; $i++) {  ?>                                                  
                            <li data-target="#carousel-example-generic" data-slide-to="<?= $i ?>" <?php if($i==0) { ?>class="active"><?php }; ?></li>
                        <?php 
                        } ?>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <?php for($j = 0; $j < count($idPathImage) ;$j++ ) { ?>
                            <div <?php if($j==0) { ?>class="item active" <?php }else{ ?> class="item" <?php } ?>>
                                <img class="img-responsive" width="750" height="500" src="<?= $image[($idPathImage[$j]->Image_id)-1]->path ?>" alt="">
                            </div>
                            
                        <?php } ?>
                        
                    </div>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <h2><strong><?= $travel[$id_travel]->title ?></strong></h2><br>                
                <span class="fa fa-list-alt fa-2x" style="color: #0044cc"> </span><strong style="font-size: 20px"> ประเภท : </strong> <strong style="font-size: 16px"><?= $type_travel[($travel[$id_travel]->tra_type)-1]->name ?></strong>
                <br><br>
                <span class="fa fa-university fa-2x" style="color: #0044cc"> </span><strong style="font-size: 20px"> ที่อยู่ : </strong><strong style="font-size: 16px"><?= $travel[$id_travel]->address ?></strong>
                <br><br>
                <span class="fa fa-clock-o fa-2x" style="color: #0044cc"> </span><strong style="font-size: 20px"> เปิดให้บริการ : </strong><strong style="font-size: 16px"><?= $travel[$id_travel]->day ?></strong>
                <br><br>
                <span class="fa fa-phone fa-2x" style="color: #0044cc"> </span><strong style="font-size: 20px"> เบอร์โทรศัพท์ : </strong><strong style="font-size: 16px"><?= $travel[$id_travel]->tel ?></strong>
                <br><br>
                <span class="fa fa-share-alt fa-2x" style="color: #0044cc"> </span><strong style="font-size: 20px"> เว็บไซค์ : </strong><strong style="font-size: 16px"><?= $travel[$id_travel]->website ?></strong>
                <br><br>
                <span class="fa fa-money fa-2x" style="color: #0044cc"> </span><strong style="font-size: 20px"> ราคา : </strong><strong style="font-size: 16px"><?= $travel[$id_travel]->price_text ?></strong>
            </div>

        </div>
        <div class="row">
            <strong><h2/>รายละเอียด</h2></strong>
            <p style="font-size: 15px"> &nbsp;&nbsp;&nbsp;&nbsp;<?= $travel[$id_travel]->detail ?></p>
        </div>
        <div class="row">
            <span class="col-md-12" >
                
            

            </span>
        </div>
        
        
        <!-- /.row -->
        
