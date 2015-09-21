<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\view;
?>
<p>
    <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create', ['travel/create_travel'], ['class' => 'btn btn-primary']) ?>
</p>

<table class="table table-striped table-bordered table-hover">
    <thead style="background-color: #18bc9c">
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Type</th>
            <th>Detail</th>              
            <th>Score Summer</th>
            <th>Score Rain</th> 
            <th>Score Winter</th> 
            <th>Place Latitude</th>
            <th>Place Longitude</th>
            <th>Time Open</th>
            <th>Time Close</th>
            <th>Website</th>
            <th>DateTime</th>
            <th>Option</th>
            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($tv as $key => $trav) : ?>
        <tr>
            <td><?= $trav->id; ?></td>
            <td><?= $trav->title; ?></td>
            <td><?= $trav->tra_type; ?></td>
            <td><?= $trav->detail; ?></td>
            <td><?= $trav->score_summer; ?></td>
            <td><?= $trav->score_rain; ?></td>
            <td><?= $trav->score_winter; ?></td>
            <td><?= $trav->place_Latitude; ?></td>
            <td><?= $trav->place_Longitude; ?></td>
            <td><?= $trav->time_open; ?></td>
            <td><?= $trav->time_close; ?></td>
            <td><?= $trav->website; ?></td>
            <td><?= $trav->Date_time; ?></td>
            <td>
                            
                <?= Html::a('<i class="glyphicon glyphicon-pencil" ></i>',["travel/update_travel",'id'=>$trav->id]);  ?> |
                                                 
                <?php // Html::a('ลบ',["register/view_register"] , $options = array('class'=>'delete')); ?>  
                <a href="<?= Url::to(["travel/delete_travel",'id'=>$trav->id]); ?>" class="delete"><i class="glyphicon glyphicon-trash" ></i>   </a>
                
                
            </td>
        </tr>                
        <?php endforeach; ?>
        
    </tbody>
</table>

<script>
// การเขียน scrip แบบนี้ มันจะมาอยู่ข้างล่างตารางเลย ทำให้ไม่สวย และ ได้ยินมาว่า
// มันจะโหลดเร็วกว่าถ้า ไฟล์ scrip อยู่ข้างล่าง เพราะข้างล่างโหลดก่อน
jQuery(document).ready(function () {
    $(".delete").click(function(){
        if(confirm(' กรุณายืนยันการลบอีกครั้ง !!! ')){
                     return true; // ถ้าตกลง OK โปรแกรมก็จะทำงานต่อไป 
              }else{
                     return false; // ถ้าตอบ Cancel ก็คือไม่ต้องทำอะไร 
              }
    });
});
</script>

<?php
//    print_r($reg);
//"register/update_register"
    // การใช้ jQuery แบบนี้ จะทำให้จัดรูปแบบได้สวยๆกว่า เพราะมันจะไปอยู่ข้างล่าง
    // แต่พอดี ดันใช้แบบนี้ไม่ได้ ไม่รู้เพราะอาราย แต่ไม่มีผลกระทบเท่าไร นอกจาก ต้อง include 
    // scrip เข้ามาใหม่ ถ้าใช้แบบบน ต้อง include ใน tag header 
    /*
    $this->registerJs("
        $(.delete2).click(function() {
            if(confirm(' กรุณายืนยันการลบอีกครั้ง !!! ')){
                     return true; // ถ้าตกลง OK โปรแกรมก็จะทำงานต่อไป 
              }else{
                     return false; // ถ้าตอบ Cancel ก็คือไม่ต้องทำอะไร 
              }
        });
    "); */
?>