<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dbname".
 *
 * @property integer $id
 * @property string $fname
 * @property string $lname
 * @property integer $sex
 */
class Dbnamed extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dbname';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fname', 'lname', 'sex'], 'required'],
            [['sex'], 'integer'],
            [['fname', 'lname'], 'string', 'max' => 20]
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
        ];
    }
}
