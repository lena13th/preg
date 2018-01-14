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
            [['description', 'content', 'image'], 'string'],
            [['image'], 'required'],
            [['published'], 'integer'],
            [['updated_on'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['price'], 'string', 'max' => 50],
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
}
