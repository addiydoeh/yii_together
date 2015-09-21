<?php

namespace app\Controllers;

use app\models\Register;
use yii\web\Controller;
use yii;
//เขียนเองทั้งหมด

/**
 * DBnameController implements the CRUD actions for Dbnamed model.
 */
class RegisterController extends Controller {
    
    
    
    public function actionView_register()
    {
        $reg = Register::find()
               ->all();
        
        return $this->render('view_register',['reg' => $reg]);
       
    }       
    public function actionCreate_register () {
        $model = new Register; 
        //$mm = '';
        if(isset($_POST)){
            //$mm = $_POST['Register[password]'];
            //echo $mm;
            $model->create_date = date('Y-m-d');
            $model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect(['register/view_register']);
            }
                        
        }       

        return $this->render('create_register',['model'=>$model]);
    }
    public function actionUpdate_register($id) {
        $model = Register::findOne($id);
        // คล้ายๆกับ isset($_POST); แต่แบบนี้ดีกว่า เพราะอันนี้มีค่าแล้วมันเข้ามาตลอด แต่แบบที่ใช้อยู่ไม่เข้า
        if(Yii::$app->request->post()) { 
            $model->user = $_POST['Register']['user'];
            $model->email = $_POST['Register']['email'];
            $model->password = $_POST['Register']['password'];
            $model->sex = $_POST['Register']['sex'];    
            $model->create_date = $_POST['Register']['create_date'];    
            // or
            //$model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect(['register/view_register']);
            }
        }
        return $this->render('update_register',['model'=>$model]);
    }
    
    public function actionDelete_register($id) {
        $model = Register::findOne($id);
        if($model->delete()){
            return $this->redirect(['register/view_register']);
        }  else {
            echo 'delete fail...';
        }
            
    }
   
    
}
