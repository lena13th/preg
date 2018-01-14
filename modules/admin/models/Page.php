<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string $title
 * @property string $alias
 * @property int $published
 * @property string $description
 * @property string $content
 * @property string $meta_keywords
 * @property string $meta_description
 * @property string $updated_on
 */
class Page extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['published'], 'integer'],
            [['description', 'content'], 'string'],
            [['updated_on'], 'safe'],
            [['title', 'meta_keywords', 'meta_description'], 'string', 'max' => 255],
            [['alias'], 'string', 'max' => 50],
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
            'alias' => 'Ссылка',
            'published' => 'Опубликовано',
            'description' => 'Краткое описание',
            'content' => 'Содержание страницы',
            'meta_keywords' => 'Meta Keywords',
            'meta_description' => 'Meta Description',
            'updated_on' => 'Updated On',
        ];
    }
}
