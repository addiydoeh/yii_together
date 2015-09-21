<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\view;
?>
<p>
    <?= Html::a('<span class="glyphicon glyphicon-plus"></span> Create', ['register/create_register'], ['class' => 'btn btn-primary']) ?>
</p>

<table class="table table-striped table-bordered table-hover">
    <thead style="background-color: #18bc9c">
        <tr>
            <th>ID</th>
            <th>User</th>
            <th>E-mail</th>
            <th>Password</th>              
            <th>Sex</th>
            <th>Date</th> 
            <th>Option</th>            
        </tr>
    </thead>
    <tbody>
        <?php foreach ($reg as $key => $re) : ?>
        <tr>
            <td><?= $re->id; ?></td>
            <td><?= $re->user; ?></td>
            <td><?= $re->email; ?></td>
            <td><?= $re->password; ?></td>
            <td><?= $re->sex; ?></td>
            <td><?= $re->create_date; ?></td>
            <td>
                <i class="glyphicon glyphicon-pencil" ></i>                
                <?= Html::a('แก้ไข',["register/update_register",'id'=>$re->id]);  ?> |
                <i class="glyphicon glyphicon-trash" ></i>                                    
                <?php // Html::a('ลบ',["register/view_register"] , $options = array('class'=>'delete')); ?>  
                <a href="<?= Url::to(["register/delete_register",'id'=>$re->id]); ?>" class="delete">ลบ</a>
                
                
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