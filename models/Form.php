<?php

namespace app\models;

use Yii;
/**
 * This is the model class for table "form".
 *
 * @property integer $id
 * @property string $name
 * @property string $email
 * @property integer $age
 * @property integer $height
 * @property integer $weight
 * @property string $city
 * @property string $techies
 * @property string $english_level
 */
class Form extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'form';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'email', 'age', 'height', 'weight', 'city', 'techies', 'english_level'], 'required'],
            [['name', 'city', 'techies', 'english_level'], 'string'],
            [['email'],'email'],
            [['age', 'height', 'weight'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'age' => 'Age',
            'height' => 'Height',
            'weight' => 'Weight',
            'city' => 'City',
            'techies' => 'Techies',
            'english_level' => 'English Level',
            'image_1' => 'Image 1',

        ];
    }

    public function contact($model,$images)
   {
       if ($this->validate()) {
           Yii::$app->mailer->compose()
               ->setTo($model->email)
               ->setFrom('ppbesta@mail.ru')
               ->setSubject('Hello From Yii2')
               ->setTextBody('Имя' . $model->name . '' . 'Возраст' . $model->age . '' . 'Рост' . $model->height . '' . 'Вес' . $model->weight . '' . 'Нужна ли техника' . $model->techies . '' . 'Уровень английского' . $model->english_level . '' )
               ->send();

           return true;
       } else {
           return false;
       }
   }
    public function getImages(){
        return $this->hasMany(Images::className(),['form_id' => 'id']);
    }
}
