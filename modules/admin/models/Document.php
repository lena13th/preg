<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "document".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $image
 * @property integer $published
 * @property string $updated_on
 */
class Document extends \yii\db\ActiveRecord
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
        return 'document';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description'], 'string'],
            [['published'], 'integer'],
            [['updated_on'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'title' => 'Наименование',
            'description' => 'Описание',
            'image' => 'Изображение',
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
