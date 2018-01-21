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
 * @property string $vk
 * @property string $email
 * @property string $field_contacts
 * @property string $updated_on
 */
class Main extends \yii\db\ActiveRecord
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
            [['name', 'vk', 'avtor_vk'], 'string', 'max' => 255],
            [['phone', 'email'], 'string', 'max' => 100],
            [['image'], 'file', 'extensions' => 'png, jpg']
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
            'vk' => 'Группа Вконтакте',
            'avtor_vk' => 'Ссылка на профиль автора',
            'image' => 'Фотография',
            'field_contacts' => 'Поле на странице контакты',
            'updated_on' => 'Updated On',
        ];
    }
    public function upload(){
        if($this->validate()){
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
