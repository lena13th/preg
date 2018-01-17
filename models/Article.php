<?php 

namespace app\models;
use yii\db\ActiveRecord;

class Article extends ActiveRecord{


    public function behaviors()
    {
        return [
            'image' => [
                'class' => 'rico\yii2images\behaviors\ImageBehave',
            ]
        ];
    }


}