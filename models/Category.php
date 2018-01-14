<?php 

namespace app\models;
use yii\db\ActiveRecord;

class Category extends ActiveRecord{

    public function getDisease(){
            return $this->hasMany(Disease::className(), ['category_id' => 'id']);

    }


}