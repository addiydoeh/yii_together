<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "id_img_travel".
 *
 * @property integer $id
 * @property integer $travel_id
 * @property integer $Image_id
 */
class IdImgTravel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'id_img_travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['travel_id', 'Image_id'], 'required'],
            [['travel_id', 'Image_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'travel_id' => 'Travel ID',
            'Image_id' => 'Image ID',
        ];
    }
}
