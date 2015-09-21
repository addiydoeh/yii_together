<?php
namespace app\controllers;

use yii\web\Controller;

class TestController extends Controller
{
    public function actionBlankpage()
    {
        $this->layout = 'blank'; //เป็นการเปลี่ยน theme แค่หน้าเดียว
        $a = 3;
        $b = 4;
        $sum = $a + $b;
        
        $data1 = [1,2,3,4];
        $data2 = ['a'=>1,'b'=>4,'c'=>2,'d'=>6];
        
        return $this->render('blankpage',['sum'=>$sum , 'data1'=>$data1,
                                          'data2'=>$data2                            
                            ]); // version php 5.4 upper
        
        
        
        //return $this->render('blankpage',array('sum'=>$sum)); // version php5.3
    }// end blankpage
    public function actionTest2($name=null,$lname=null) {
       
       $fullname =  "your name is $name $lname" ;
       return $this->render('test2',['name'=>$fullname]);
    }

}
