<?php

namespace app\components;
use app\models\Main;
use yii\base\Widget;
use Yii;
use yii\caching\DbDependency;

class CompanyWidget extends Widget{
	public $object;
	public $company;

	public function init() {
			parent::init();
//        $this->company = Company::getDb()->cache(function ($db) {
//            return Company::findOne(Yii::$app->params['company_id']);
//        }, 3600); //change
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM main',
        ]);
        $this->company = Yii::$app->db->cache(function ($db) {
            return Main::find()->where(['id' => '1'])->one();
        }, 0, $dependency);
    }

	public function run() {



        switch ($this->object) {
            case 'name':
                return $this->company->name; break;
            case 'description':
                return $this->company->description; break;
            case 'phone':
                return $this->company->phone; break;
            case 'email':
                return $this->company->email; break;
        }

	}

}

