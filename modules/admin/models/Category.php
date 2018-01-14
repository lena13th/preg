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
            [['description', 'image'], 'string'],
            [['updated_on'], 'safe'],
            [['name'], 'string', 'max' => 255],
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
}
