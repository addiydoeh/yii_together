<?php
namespace app\controllers;
use yii;
use yii\web\Controller;

class User_loginController extends Controller
{
    
    public function actionRegister()
    {
        
        $fname = "";
        if(!empty($_POST)) {
            $fname = $_POST['fname'];
        }
        //$fname = $request->post('fname');  
        //$fname = $fname."555";
        return $this->render('register',array('fname' => $fname));
    }// end blankpage
    

}
