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
class SignController extends Controller {
    
    public $enableCsrfValidation = false; // สำหรับใช้ ajax 
    
    public function actionForm_register() {
        $model = new Sign; 
        $token = new Token();
        $s_fname = '';
        $s_lname = '';
        $s_user = '';
        $s_user_db = '';
        $s_pw1 = '';
        $s_pw2 = '';        
        $s_email = '';
        $s_email_db = '';
        $s_accept = '';
        $s_sex = '';
        $enable = 1;
        if(!empty($_POST)) { 
            
            $model->fname = $_POST['fname'];
            $model->lname = $_POST['lname'];            
            $model->user_id = $_POST['user'];
            $model->password = $_POST['pw1'];
            $model->email = $_POST['email'];
            if(!empty($_POST['sex']))
                $model->sex =   $_POST['sex'];
            $model->activate= 0;
            $model->status= 'member';
            //fname
            if(strlen($model->fname) < 5)
            {
                $s_fname = 'has-error';                
                $enable = 0;
            }
            //lname
            if(strlen($model->lname) < 5)
            {
                $s_lname = 'has-error';                
                $enable = 0;
            }
            // user            
            $user_found = Sign::find()
                          ->where(['user_id' => $model->user_id])->one();
            if(!empty($user_found))
            {
                $s_user = 'has-error';  
                $s_user_db = 'double';
                $enable = 0;
            }
            if(!ereg("([a-z0-9]{5})",$model->user_id) )
            {
                $s_user = 'has-error';  
                $s_user_db = 'wrong';
                $enable = 0;
            }
            //==================================================
            // password
            if($model->password != $_POST['pw2']  || strlen($model->password) < 5) {
                $enable = 0;
                
                $s_pw1 = 'has-error';
                $s_pw2 = 'has-error';
            }
            //==================================================
            //sex
            if($model->sex=="") {
                $s_sex = 'has-error';
                $enable = 0;
                
            }
            //==================================================
            //email
            $email_found = Sign::find()
                          ->where(['email' => $model->email])->one();
            
            if(!empty($email_found))
            {
                
                $s_email = 'has-error';  
                $s_email_db = 'double';
                $enable = 0;
            }
            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $model->email)) {
                $enable = 0;
                $s_email = 'has-error';
                $s_email_db = 'wrong';
            }
            //accept
            if(empty($_POST['check']))
            {
                $enable = 0;
                $s_accept = "โปรดย้อมรับข้อตกลง";
            }
            ////////////// end check
            if( $enable == 1) {
                $md5_password = md5($model->password);
                $model->password = $md5_password;
                
                $model->path_image = $model->sex .'.'. 'png';
                
                if($model->save() ){                    
                    $token->code = md5($md5_password);
                    if($token->save()) {
                        //return $this->redirect(['sign/activate']);
                        $content = "สวัสดีคุณ".$model->fname." ".$model->lname;
                        $content .= "<p>โปรดยืนยันการสมัครโดย คลิกลิ้งค์ที่ทางเราได้แนบไป และท่านจะสามารถ Login </P>";
                        $content .= "<P>ด้วย user id และ password ของท่านได้</p>";   
                        $link = "http://localhost/yii2basic/web/index.php?r=sign%2Fconf&id=".$model->id."&code=".$token->code;
                        $content .= "<a href=".'"';
                        $content .= $link.'"';
                        $content .= '>Click for Register Complete</a>';
                        Yii::$app->mailer->compose("@app/mail/layouts/html",['content'=>$content])                                                    
                                ->setTo([$model->email => $model->fname])
                                ->setFrom(Yii::$app->params['adminEmail'])
                                ->setSubject('Register')
                                ->setTextBody('...')
                                ->send(); 
                        return $this->render('activate');
                       
                    }else echo 'error token';
                    
                }else echo 'save_error';
            }
                
        }
       
        
        return $this->render('form_register' , 
                [
                    's_fname' => $s_fname,
                    's_lname' => $s_lname,
                    's_user' => $s_user,  
                    's_user_db' => $s_user_db,                      
                    's_pw1' => $s_pw1,
                    's_pw2' => $s_pw2,
                    's_email' => $s_email,
                    's_email_db' => $s_email_db,
                    's_accept' => $s_accept,
                    's_sex' => $s_sex,
                    'v_fname' => $model->fname,
                    'v_lname' => $model->lname,
                    'v_user' => $model->user_id,
                    'v_email' => $model->email,
                    'v_sex' => $model->sex,
                    
                ]);
    }
    
    

        public function actionActivate() {
        /// send email
        
        return $this->render('activate');
    }         
    
    public function actionConf($id = null,$code = NULL) {
         $tok = Token::find()
               ->where(['id' => $id])->one();
         if($tok->code == $code) {
             if($tok->delete()) {}                
             else{echo 'delete token error'; }
             $sig = Sign::find()
               ->where(['id' => $id])->one();
             $sig->activate = 1;                        
             if($sig->save()) {
                 return $this->redirect(['sign/login']);
             }
             //return $this->render('activate',['tok' => $sig]);
         }
         
    }
    
  

        public function actionLogin() {
      
        $this->layout = 'login'; //เลือก theme
        $sig = '';
        if(Yii::$app->request->post()) {//!empty($_POST)) {
            if($_POST['submit'] =='Login') {  // ถ้ามันรีเฟรสแล้วขึ้น alert ให้ใส่อันนี้แอนเข้าไป && !($_POST['username']=='Username')
                
                $username = $_POST['username'];
                $password = md5($_POST['password']);
                
                $sig = Sign::find()
                       ->where(['user_id' => $username,'password'=>$password,'activate'=>1])->one(); 
                if(empty($sig)) {
                    $sig = 'login not success';
                }else {
                                        
                    $session = Yii::$app->session;
                    $session->open();
                    $session['status'] =  $sig->status;
                    $session['fname'] = $sig->fname;
                    $session['user_id'] = $sig->user_id;
                    $session['session_id'] = session_id();
                    return $this->redirect(['site/index']);                    
                }
                
                       
                        
                
            }else if($_POST['submit']=='Register') {
                return $this->redirect(['sign/form_register']);
            }
        }
        
        return $this->render('login',['sig'=>$sig]);
    }
    
    public function actionLogout() {
        $session = Yii::$app->session;
        $session->open();
        unset($session['status']);
        unset($session['fname']);
        unset($session['session_id']);
        unset($session['user_id']);
        return $this->redirect(['site/index']); 
    }
    
    public function actionUpdate() {
        $this->layout = 'bank';
        
        
        $error_file = '';
        //////////////////////////
        $session = Yii::$app->session;
        $session->open();
        $id = $session['user_id'];
        
        //database 
        $sign = Sign::find()
                       ->where(['user_id' => $id])->one(); 
        
        $filename = $sign->path_image;
        
        if(Yii::$app->request->post()) {
            
            if($_FILES['upfile']['error'] == 4) {
                $error_file = "NoFile";                
            }
            else {
                $filename =  $_FILES['upfile']['name'];
                $tmp_name =  $_FILES['upfile']['tmp_name'];
                
                $array_last = explode(".",$filename);  // ตัด array โดยตัดตรงจุด
                $num = count($array_last)-1;  // นับว่ามี arry กี่ตัว
                $lastname = strtolower($array_last[$num]); 
                
                if($lastname == 'jpg' or $lastname == 'png') {
                    $check_Lastname = $lastname=='jpg'?'jpg':'png';
                    $surname_image = ['jpg' , 'png'];
                    //////////////////////////////////////////////////////////
                    // พวกนี้ ไม่ออก เลย เป็นรูปแบบ ของ yii ที่ต้องส่ง model เข้าไปหน้า from และ มันจะ ส่งกลับมา
                    // yii เขียน โค๊ด เอาแต่ใจฉิบหาย ไม่คำนึกถึง การเขีย นform ปกติ เอามา customize ไม่ได้ 
                    //$image = UploadedFile::getInstance($model, $filename)
                    //$sign->path_image = $_FILES;
                    //$sign->path_image->saveAs(Yii::getAlias('@webroot').'/upload/profile/'.$sign->path_image->baseName.'.'.$sign->path_image->extension);
                    //$path = getcwd().DIRECTORY_SEPARATOR;
                    //////////////////////////////////////////////////////////
                    $path = 'C:\xampp\htdocs\yii2Basic\web\uploaded\profile\\';             
                    $only_name = $sign->user_id.'.'.$check_Lastname;
                    $target = $path.$only_name;   
                    $pat_1 = $path;
                    /// การลบไฟล์ก่อนจะ upload 
                    foreach ($surname_image as $key => $ext) {
                        $pat_2 = $pat_1.$sign->user_id.'.'.$ext;                        
                        if(is_file($pat_2)) {
                            unlink($pat_2);
                        }
                    }
                    
                    move_uploaded_file($_FILES['upfile']['tmp_name'], $target);
                    $sign->path_image = $only_name;
                    $sign->save();
                    return $this->redirect(['profile']);
                }  else {
                    $error_file = "LastNameWrong";       
                }
                
            }
            
        }
        
        return $this->render('update' , [
                'filename' => $filename ,
                'user_id'       => $sign->user_id,
                'error_file' => $error_file,
                'path_image' => $sign->path_image,
                ]);
    }

    public function actionProfile() {
        $this->layout = 'bank'; //เลือก theme
        
        $session = Yii::$app->session;
        $session->open();
        $id = $session['user_id'];
        //database 
        $sign = Sign::find()
                       ->where(['user_id' => $id])->one(); 
        
        return $this->render('profile', [
            'sign' => $sign,
        ]);
    }
    public function actionUpdate_form() {
        $this->layout = 'bank'; //เลือก theme
        
        $session = Yii::$app->session;
        $session->open();
        $id = $session['user_id'];
        //database 
        $sign = Sign::find()
                       ->where(['user_id' => $id])->one(); 
        
        return $this->render('update_form', [
            'sign' => $sign,
        ]);
    }
    //############# begin ajax ######################################################
    // ajax original
    public function actionSample()
    {
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $searchname= explode(":", $data['searchname']);
            $searchby= explode(":", $data['searchby']);
            $searchname= $searchname[0];
            $searchby= $searchby[0];
            $search = // your logic;
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'search' => "555",
                'code' => 100,
            ];
         
          }  else {
              echo  "xxxx";
              die();
          }
    }
    public function actionFname_check() {
        $v_fname = "<font color=green>ชื่อนี้ใช้ได้</font>";
        $cancle = 0;
	if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $fname = explode(":", $data['fname']);
            $fname= $fname[0];
            
            if(strlen($fname) < 5){
                $v_fname = "<font color=red>ชื่อนี้ใช้ไม่ได้</font>";
                $cancle = 1;
            }
            if(strlen($fname) == 0) {
                $v_fname = "<font color=red>กรุณาป้อนชื่อของคุณ</font>";
                $cancle = 1;
            }
            
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'fname' => $v_fname,
                'cancle' => $cancle,
            ];
          }  else {
              echo  "Can not use ajax you find Debug again!!";
              die();
          }
    }
    public function actionLname_check() {
        $v_lname = "<font color=green>ชื่อนี้ใช้ได้</font>";
        $cancle = 0;
	if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $lname = explode(":", $data['lname']);
            $lname= $lname[0];
            
            if(strlen($lname) < 5) {
                $v_lname = "<font color=red>ชื่อนี้ใช้ไม่ได้</font>";
                $cancle = 1;
            }
            if(strlen($lname) == 0) {
                $v_lname = "<font color=red>กรุณาป้อนชื่อของคุณ</font>";
                $cancle = 1;
            }
            
            
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'lname' => $v_lname,
                'cancle' => $cancle,
            ];
          }  else {
              echo  "Can not use ajax you find Debug again!!";
              die();
          }
    }
    public function actionEmail_check() {
        $v_mail = "<font color=green> E-mail นี้ใช้ได้</font>";
         $cancle = 0;
	if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $mail = explode(":", $data['mail']);
            $ogn_mail = explode(":", $data['ogn_mail']);
            $mail= $mail[0];
            $ogn_mail= $ogn_mail[0];
            //email
           $email_found = Sign::find()
                          ->where(['email' => $mail])->one();
            
            if(!empty($email_found) && strcmp($email_found->email,$ogn_mail) )
            {                
                $v_mail = "<font color=red>E-mail นี้มีผู้อื่นใช้แล้ว</font>";
                $cancle = 1;
            }          
            if(!preg_match("/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i", $mail)) {
                $v_mail = "<font color=red>โปรดตรวจสอบ E-mail ของคุณ</font>";
                $cancle = 1;
            }
            
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [
                'mail' => $v_mail,
                'cancle' => $cancle,
            ];
          }  else {
              echo  "Can not use ajax you find Debug again!!";
              die();
          }
    }
    public function actionSave_database() {
        $session = Yii::$app->session;
        $session->open();
        $id = $session['user_id'];
        //database 
       $sign = Sign::find()
                       ->where(['user_id' => $id])->one();
       if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
             $fname = explode(":", $data['fname']);
             $lname = explode(":", $data['lname']);
             $mail = explode(":", $data['mail']);
            // $sex = explode(":", $data['sex']);
            
             //$sex= $sex[0];
             $mail= $mail[0];
             $fname= $fname[0];
             $lname= $lname[0];
            
             $sign->fname = $fname;
            $sign->lname = $lname;   
            $sign->email = $mail;
            //$sign->sex =   $sex;
            
            $sign->save();
            echo '';
       }
    }
    public function actionOgn_password() {
        $cancle = 1;
        $session = Yii::$app->session;
        $session->open();
        $id = $session['user_id'];
        
        $sign = Sign::find()
                       ->where(['user_id' => $id])->one();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $ognPassword = explode(":", $data['ognPassword']);
            $ognPassword= $ognPassword[0];
            $ognPassword= md5($ognPassword);
            if( $sign->password == $ognPassword) {
                $cancle = 0;
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [                
                'cancle' => $cancle,
            ];
        }
    }
    public function actionNew_password() {
        $cancle = 1;
        
        
        
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $newPassword1 = explode(":", $data['newPassword1']);
            $newPassword2 = explode(":", $data['newPassword2']);
            $newPassword1= $newPassword1[0];
            $newPassword2= $newPassword2[0];
            if($newPassword1 == $newPassword2) {
                $cancle = 0;
            }
            \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
            return [                
                'cancle' => $cancle,
            ];
        }
    }
    public function actionChang_password() {
        
        $session = Yii::$app->session;
        $session->open();
        $id = $session['user_id'];
        
        $sign = Sign::find()
                       ->where(['user_id' => $id])->one();
        if (Yii::$app->request->isAjax) {
            $data = Yii::$app->request->post();
            $newPassword1 = explode(":", $data['newPassword1']);
            $newPassword1= $newPassword1[0];
            $newPassword1= md5($newPassword1);
            $sign->password = $newPassword1;
            $sign->save();
            return;
        }else { echo 'error ajax'; }
        
    }
    
    
}
