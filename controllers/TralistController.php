<?php

namespace app\Controllers;

use yii\web\Controller;
use app\models\Travel;
use app\models\TypeTravel;
use app\models\IdImgTravel;
use app\models\ImageTravel;
use yii\web\Session;
use yii;

class TralistController extends Controller {
    
    
    public function actionIndex() {
        
    }
    public function actionTravel($page=null,$start = null) {        
        //session
        $session = Yii::$app->session;
        $session->open();
        
        
        $this->layout = 'bank';
        $search = '';
        $all = '';
        $travel = '';
        $checkAll = 0;
        
        
        if(!empty($_POST['check_travel'])) { //!empty($_POST) 
            //echo 'not empty'; 
            $start = 0;
            if(!empty($_POST['check_travel']) ) 
                $search = $_POST['check_travel'];             
           
            $session['check_travel'] = $search;
            $session['checkAll'] = 0;
            $checkAll = '';
            $page = 0;
            //$session['checkAll'] = 0;
        }else if($start == 1 || empty($session['check_travel']) ){
            //echo 'start = 1';            
            $session['checkAll'] = 1;
            $checkAll = 'checked="checked"';
            $session['check_travel'] = '';
        }else if(!empty($session['check_travel'])){
            //echo 'search now';
            $search = $session['check_travel'];                    
            if(!empty($_POST['all'])) {
                $search = 'all';
                $session['checkAll'] = 1;
                $checkAll = 'checked="checked"';
                $page=0;
                $session['check_travel'] = '';
            }
        }
        
        
        
        //typeTravel about id 
        $typeTravel = TypeTravel::find()->all();
        
        /// database image_travel
        $modelImage = ImageTravel::find()->all();
        $offsetPage = $page*9;
        
                  
        if($search >= 1) { 
            // database travel name 
            $DbAll = Travel::find()->where(['tra_type' => $search])->all();
            $pageAll =  ceil(count($DbAll)/9);           
            $DbTravel = Travel::find()->where(['tra_type' => $search])->limit(9)->offset($offsetPage)->all();                              
            
            if(!empty($_POST['txtSearch']) ) {
                $txtSearch = $_POST['txtSearch'];
                $DbTravel = Travel::find()->where([ 'LIKE','title',$txtSearch])->andwhere(['tra_type' => $search])->limit(9)->offset($offsetPage)->all();                              
                
               // $DbTravel = Travel::find()->where($checkAll, $params)             
            }
            
        } else{
            
            // database travel name 
            $DbAll = Travel::find()->all();
            $pageAll =  ceil(count($DbAll)/9);
            $DbTravel = Travel::find()->limit(9)->offset($offsetPage)->all();   
            /// condition text search
            if(!empty($_POST['txtSearch']) ) {
                $txtSearch = $_POST['txtSearch'];
                $DbTravel = Travel::find()->where(['LIKE','title',$txtSearch])->limit(9)->offset($offsetPage)->all();   
            }
            
            //$ttest = Travel::find()->where(['LIKE','title','a'])->one();
            
        }  
        
        
        
        if($search >= 1) {
           $travel = $search;
        }
        
          
        /// image 
        $IdImg = [-1,-1,-1,-1,-1,-1,-1,-1,-1];
        $modelIdImg = [-1,-1,-1,-1,-1,-1,-1,-1,-1];
        for($i=0 ; $i < count($DbTravel) ; $i++) {            
            $IdImg[$i] = $DbTravel[$i]->id;            
            $modelIdImg[$i] = IdImgTravel::find()->where(['travel_id' => $IdImg[$i] ])->one();
        }
        
        
        
        return $this->render('travel',[
            'DbAll' => $DbAll,
            'DbTravel' => $DbTravel,
            'typeTravel' => $typeTravel,
            'modelImage' => $modelImage,            
            'modelIdImg' => $modelIdImg,
            'pageAll'  => $pageAll,
            'page'     => $page,
            'checkAll' => $checkAll,
            'travel' => $travel ,
            'search' => $search,
             
        ]);
    }
    public function actionSingle_travel($id) {
        $this->layout = 'bank';
        $id_travel = $id - 1;
        
        $travel = Travel::find()->all();
        $type_travel = TypeTravel::find()->all();
        $image = ImageTravel::find()->all();
        $id_image = IdImgTravel::find()->all();
        
        $idPathImage = IdImgTravel::find()
                                    ->where(['travel_id'=>$id])->all();
        
        return $this->render('single_travel',[
            'id_travel' => $id_travel,
            'travel' => $travel,
            'image' => $image,
            'id_image' => $image,
            'idPathImage' => $idPathImage,
            'type_travel' => $type_travel,
        ]);
    }
    public function actionTest_map() {
        $this->layout = 'bank';
        return $this->render('test_map');
    }
}