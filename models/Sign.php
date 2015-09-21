<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "sign".
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property string $sex
 * @property string $user_id
 * @property string $password
 * @property string $email
 * @property integer $actiivate
 * @property string $status
 * @property string $Date_time
 */
class Sign extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    
    public static function tableName()
    {
        return 'sign';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'fname', 'lname', 'sex', 'user_id', 'password', 'email', 'activate', 'status'], 'required'],
            [['activate'], 'integer'],
            [['Date_time'], 'safe'],
            [['fname', 'lname', 'user_id'], 'string', 'max' => 20],
            [['sex', 'status'], 'string', 'max' => 11],
            [['password'], 'string', 'max' => 100],
            [['email'], 'string', 'max' => 40],
            [['path_image'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fname' => 'Fname',
            'lname' => 'Lname',
            'sex' => 'Sex',
            'user_id' => 'User ID',
            'password' => 'Password',
            'email' => 'Email',
            'activate' => 'Activate',
            'status' => 'Status',
            'Date_time' => 'Date Time',
            'path_image' => 'Image',
        ];
    }
}
