<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "travel".
 *
 * @property integer $id
 * @property string $title
 * @property integer $tra_type
 * @property string $detail
 * @property string $address
 * @property double $place_Latitude
 * @property double $place_Longitude
 * @property string $time_open
 * @property string $time_close
 * @property string $day
 * @property string $tel
 * @property string $website
 * @property integer $price_cal
 * @property string $price_text
 * @property string $Date_time
 *
 * @property TypeTravel $traType
 */
class Travel extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'travel';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'tra_type', 'detail', 'address', 'place_Latitude', 'place_Longitude', 'time_open', 'time_close', 'day', 'tel', 'website', 'price_cal', 'price_text', 'Date_time'], 'required'],
            [['tra_type', 'price_cal'], 'integer'],
            [['detail', 'address'], 'string'],
            [['place_Latitude', 'place_Longitude'], 'number'],
            [['time_open', 'time_close', 'Date_time'], 'safe'],
            [['title', 'day', 'website', 'price_text'], 'string', 'max' => 255],
            [['tel'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'ชื่อท่องเที่ยว',
            'tra_type' => 'หมวดหมู่',
            'detail' => 'ลายละเอียด',
            'address' => 'Address',
            'place_Latitude' => 'เส้นรุ่ง',
            'place_Longitude' => 'เส้นแวง',
            'time_open' => 'เวลาเปิด',
            'time_close' => 'เวลาปิด',
            'day' => 'Day',
            'tel' => 'Tel',
            'website' => 'เว็บไซต์',
            'price_cal' => 'Price Cal',
            'price_text' => 'Price Text',
            'Date_time' => 'วันเวลา',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getTraType()
    {
        return $this->hasOne(TypeTravel::className(), ['id' => 'tra_type']);
    }
}
