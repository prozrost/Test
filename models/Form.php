<?php

namespace app\models;

use Yii;
use yii\web\UploadedFile;
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
 * @property resource $image_1
 * @property resource $image_2
 * @property resource $image_3
 * @property resource $image_4
 * @property resource $image_5

 */
class Form extends \yii\db\ActiveRecord
{
    public $images;
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
            [['images'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 5],
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
    public function insertForm()
    {
        $Form= new Form();
        $Form->name = $this->name;
        $Form->email = $this->email;
        $Form->age = $this->age;
        $Form->height= $this->height;
        $Form->weight= $this->weight;
        $Form->city = $this->city;
        $Form->techies = $this->techies;
        $Form->english_level = $this->english_level;
        $Form->images = UploadedFile::getInstances($Form,'images');
        foreach($Form->images as $file){
         $folder = ('uploads/' . $file->baseName . '.' . $file->extension);
         $file->saveAs('uploads/' . $file->baseName . '.' . $file->extension);
         $Form->image_1.=$folder . ';';
        }
        $this->contact();
        return $Form->save(false);
    }
    private function contact()
   {
       if ($this->validate()) {
           Yii::$app->mailer->compose()
               ->setTo($this->email)
               ->setFrom('ppbesta@mail.ru')
               ->setSubject('Hello From Yii2')
               ->setTextBody('Имя' . $this->name . '' . 'Возраст' . $this->age . '' . 'Рост' . $this->height . '' . 'Вес' . $this->weight . '' . 'Нужна ли техника' . $this->techies . '' . 'Уровень английского' . $this->english_level . '' . 'Сохраненные изображения' . $this->image_1 )
               ->send();

           return true;
       } else {
           return false;
       }
   }

}
