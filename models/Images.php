<?php
namespace app\models;
use Yii;
use yii\web\UploadedFile;
/**
 * This is the model class for table "images".
 *
 * @property integer $id
 * @property integer $form_id
 * @property string $images
 */
class Images extends \yii\db\ActiveRecord{
    public $imagesFiles;
    public static function tableName()
    {
        return 'images';
    }
    public function rules()
    {   return [
        [['imagesFiles'], 'file', 'extensions' => 'png, jpg', 'maxFiles' => 5],
    ];
    }
    public function getForm()
    {
        return $this->hasOne(Form::className(),['id' => 'form_id']);
    }
}
