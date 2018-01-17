<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "services".
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $image
 * @property string $price
 * @property int $published
 * @property string $updated_on
 */
class Services extends \yii\db\ActiveRecord
{
    public $image;

    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'services';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'content'], 'string'],
            [['published'], 'integer'],
            [['updated_on'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 50],
            [['image'], 'file', 'extensions' => 'png, jpg'],

        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
            'description' => 'Краткое описание',
            'content' => 'Описание услуги',
            'image' => 'Изображение',
            'price' => 'Цена',
            'published' => 'Опубликовано',
            'updated_on' => 'Updated On',
        ];
    }
    public function upload(){
        if($this->validate()){
//            $path = 'img/' . $this->image->baseName . '.' . $this->image->extension;
            $path = $this->image->baseName . '.' . $this->image->extension;
            $this->image->saveAs($path);
            $this->attachImage($path, true);
            @unlink($path);
            return true;
        } else {
            return false;
        }
    }

}
