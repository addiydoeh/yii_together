<?php

namespace app\Controllers;

use yii\web\Controller;
use app\models\Sign;
use app\models\Travel;

//เขียนเองทั้งหมด

/**
 * DBnameController implements the CRUD actions for Dbnamed model.
 */
class OptionController extends Controller {
    
    
    public function actionIndex() {
        $this->layout = 'bank'; //เลือก theme
        return $this->render('index');
    }
    public function actionView_member() {
        $this->layout = 'bank';
        $sign = Sign::find()->all();
        
        return $this->render('view_member', [
                'sign' => $sign,
              
            
            
            ]);
    }
    public function actionEdit_member($id = null) {
        $this->layout = 'bank';
        $sign = Sign::find()->all();
        
        if(!empty($_POST)) {
            $activate = $_POST['activate'];
            $status = $_POST['status'];
            $sign[$id]->activate = $activate;
            $sign[$id]->status = $status;
            $sign[$id]->save();
            return $this->redirect(['view_member']);
        }
        
        return $this->render('edit_member', [
                'sign' => $sign,
                'id'  => $id,
            ]);
    }
    public function actionDelete_member($id = null) {        
        $sign = Sign::findOne($id);
        if($sign->delete()){
            return $this->redirect(['option/view_member']);
        }  else {
            echo 'delete fail in method Delete_member of Controller view';
        }
    }

        public function actionView_travel() {
        $this->layout = 'bank';
        $travel = Travel::find()->all();
        
        return $this->render('view_travel', [
                'travel' => $travel,
              
            
            
            ]);
    }
    
    
  
    public function actionEdit_travel($id = null) {
        $this->layout = 'bank';
        $travel = Sign::find()->all();
        
        return $this->render('edit_travel', [
                'travel' => $travel,
                'id'  => $id,
            ]);
    }
    
 
}