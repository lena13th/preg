<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "category".
 *
 * @property integer $id
 * @property string $name
 * @property integer $published
 * @property string $description
 * @property string $image
 * @property string $updated_on
 */
class Category extends \yii\db\ActiveRecord
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
        return 'category';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['published'], 'integer'],
            [['description'], 'string'],
            [['updated_on'], 'safe'],
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
            'published' => 'Опубликовано',
            'description' => 'Описание',
            'image' => 'Изображение',
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
