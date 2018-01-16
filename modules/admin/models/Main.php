<?php

namespace app\modules\admin\models;

use Yii;

/**
 * This is the model class for table "main".
 *
 * @property integer $id
 * @property string $name
 * @property string $description
 * @property string $mission
 * @property string $about
 * @property string $phone
 * @property string $email
 * @property string $field_contacts
 * @property string $updated_on
 */
class Main extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'main';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['description', 'mission', 'about','full_about', 'field_contacts'], 'string'],
            [['updated_on'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['phone', 'email'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'description' => 'Описание',
            'mission' => 'Цель сайта',
            'about' => 'Обо мне',
            'full_about' => 'Подробнее о специализации',
            'phone' => 'Телефон',
            'email' => 'Email',
            'field_contacts' => 'Поле на странице контакты',
            'updated_on' => 'Updated On',
        ];
    }
}
