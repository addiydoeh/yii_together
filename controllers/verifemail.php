<?php

namespace app\Controllers;

use app\models\Sign;
use app\models\Token;
use yii\web\Controller;
use yii;
use yii\bootstrap\Alert;
use yii\grid\GridView;
use yii\web\Session;
use app\Controllers\SignController;
use yii\web\UploadedFile;

//เขียนเองทั้งหมด

/**
 * DBnameController implements the CRUD actions for Dbnamed model.
 */

    
        
    
        $usremail = $_POST['tEmail'];
        $user_id = $_POST['tUser_id'];
        if(!filter_var($usremail,FILTER_VALIDATE_EMAIL)) {
            echo '<font color=red>อีเมล์ไม่ถูกต้อง</font>';
        }  else {

                echo '<font color=green>อีเมล์นี้ใช้ได้</font>';

        }
    

    
                    
        
  
