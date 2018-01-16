<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "disease".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $content
 * @property string $updated_on
 */
class Disease extends \yii\db\ActiveRecord
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
        return 'disease';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'content'], 'string'],
            [['updated_on'], 'safe'],
            [['published','category_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'description' => 'Описание',
            'image' => 'Изображение',
            'content' => 'Код для вставки',
            'published' => 'Опубликовано',
            'category_id' => 'Категория',
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
