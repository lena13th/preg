<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "article".
 *
 * @property integer $id
 * @property string $title
 * @property string $description
 * @property string $content
 * @property string $code
 * @property integer $published
 * @property string $updated_on
 */
class Article extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'article';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['description', 'content', 'code','image'], 'string'],
            [['published'], 'integer'],
            [['updated_on'], 'safe'],
            [['title'], 'string', 'max' => 255],
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
            'description' => 'Краткое описание',
            'content' => 'Содержание статьи',
            'code' => 'Код для вставки',
            'image' => 'Изображение',
            'published' => 'Опубликовано',
            'updated_on' => 'Updated On',
        ];
    }
}
