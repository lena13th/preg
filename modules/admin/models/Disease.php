<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "disease".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $content
 * @property string $updated_on
 */
class Disease extends \yii\db\ActiveRecord
{

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
            [['description', 'content','image'], 'string'],
            [['updated_on'], 'safe'],
            [['published','category_id'], 'integer'],
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
            'description' => 'Описание',
            'image' => 'Изображение',
            'content' => 'Код для вставки',
            'published' => 'Опубликовано',
            'category_id' => 'Категория',
            'updated_on' => 'Updated On',
        ];
    }
}
