<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "type_travel".
 *
 * @property integer $id
 * @property string $name
 *
 * @property Travel[] $travels
 */
class TypeTravel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'type_travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ชื่อหมวดหมู่',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTravels()
    {
        return $this->hasMany(Travel::className(), ['tra_type' => 'id']);
    }
}
