<?php
use yii\widgets\ActiveForm;

///session
$session = Yii::$app->session;
$session->open();
if($session['session_id'] != session_id()) {
    header('Location:/yii2basic/web/index.php?r=sign%2Flogin');
    die();
}
?>

<h1>Update</h1>
<hr>
<ol class="breadcrumb">
    <li><a href="/yii2basic/web/index.php?r=sign%2Fprofile">Profile</a>
    </li>
    <li class="active">Blog Home One</li>
</ol>

<img class="img-circle" src="uploaded/profile/<?= $path_image ?>" alt="Mountain View" style="width:304px;height:304px;">
<form action="" method="post" enctype="multipart/form-data" name="frmUpload" id="frmUpload">
  <p>
    <label for="upfile">Upload File:</label>
    <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
    <input  type="file" name="upfile" id="upfile" />
    
    
  </p>
  <?php 
        if($error_file == 'NoFile') {
        ?>
        <div class="alert alert-danger">
            กรุณาเลือกไฟล์ ที่ท่านต้องการ upload 
        </div> 
        <?php  
        }else if($error_file == 'LastNameWrong') {
            ?>
            <div class="alert alert-danger">
                อัปโหลดได้เฉพาะ ไฟล์ jpg และ png เท่านั้น
            </div> 
            <?php
        }
    ?>
  <p>
    <input class="btn btn-primary"  type="submit" name="button" id="button" value="Submit" />
    
  </p>
  
</form>


<div>
    คูณคือ ID ที่ : <?= $user_id ?> 
    ชื่อไฟล์ : <?= $filename; ?>
    
</div>

<script>
    $(function(){
		$("#black").click(function() {
			window.location.href='/yii2basic/web/index.php?r=sign%2Fprofile'
		});
	});
</script>