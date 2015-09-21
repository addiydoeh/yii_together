<?php

namespace app\Controllers;


use yii\web\Controller;

class test_memberController extends Controller {
    public function actionIndex() {
        $this->layout = 'bank';
        
        return $this->render('index');
    }
}