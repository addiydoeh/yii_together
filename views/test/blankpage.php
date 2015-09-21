
<p>
        Blank page
        <?php echo $sum.'<br>'?>
        <hr>
        <h3>Array</h3>
        <?php 
            print_r($data1); echo '<br>';
            print_r($data2);
        ?>
        <hr>
        การสร้าง link โดยใช้ urlManager<br />
        
        <?php 
            $route1 = Yii::$app->urlManager->createUrl(['test/test2','name'=>'ant','lname'=>'ja'])
        ?>
        <a href="<?=$route1?>">goto test2</a> <br>
        <!------------------------------>
        <?php 
            $route2 = Yii::$app->urlManager->createUrl('site/index')
        ?>
        <a href="<?=$route2?>">goto home</a>
        
        <br>
        <?= \yii\helpers\Html::a('ลิ้งค์แบบที่ 3',['test/test2']); ?>
        
</p>