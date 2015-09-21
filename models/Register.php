<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "register".
 *
 * @property integer $id
 * @property string $user
 * @property string $email
 * @property string $password
 * @property string $sex
 */
class Register extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'register';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user', 'email', 'password', 'sex' , 'create_date'], 'required'],
            [['create_date'],'safe'],
            [['user', 'email', 'password', 'sex'], 'string', 'max' => 20]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user' => 'User',
            'email' => 'Email',
            'password' => 'Password',
            'sex' => 'Sex',
            'create_date' => 'Date'
        ];
    }
}
