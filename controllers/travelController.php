<?php

namespace app\Controllers;

use app\models\Travel;
use yii\web\Controller;
use yii;
//เขียนเองทั้งหมด

/**
 * DBnameController implements the CRUD actions for Dbnamed model.
 */
class TravelController extends Controller {
    
    
    
    public function actionView_travel()
    {
        $travel = Travel::find()
               ->all();
        
        return $this->render('view_travel',['tv' => $travel]);
       
    }       
    public function actionCreate_travel () {
        $model = new travel; 
        //$mm = '';
        if(isset($_POST)){
            //$mm = $_POST['Register[password]'];
            //echo $mm;
            $model->Date_time = date('Y-m-d H:m:s');
            $model->load(\Yii::$app->request->post());
            if($model->save()){
                return $this->redirect(['travel/view_travel']);
            }
                        
        }       

        return $this->render('create_travel',['model'=>$model]);
    }
    public function actionUpdate_travel($id) {
        $model = Travel::findOne($id);
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
                return $this->redirect(['register/view_travel']);
            }
        }
        return $this->render('update_travel',['model'=>$model]);
    }
    
    public function actionDelete_travel($id) {
        $model = Register::findOne($id);
        if($model->delete()){
            return $this->redirect(['register/view_register']);
        }  else {
            echo 'delete fail...';
        }
            
    }
   
    
}
