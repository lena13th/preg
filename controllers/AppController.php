<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\caching\DbDependency;
use app\models\Main;


class AppController extends Controller
{

    protected function setMeta($title = null, $keywords = null, $description = null)
    {
        $this->view->title = $title;
        $this->view->registerMetaTag(['name' => 'keywords', 'content' => "$keywords"]);
        $this->view->registerMetaTag(['name' => 'description', 'content' => "$description"]);
    }

    protected function getCompany()
    {
        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM main',
        ]);

        $company = Yii::$app->db->cache(function ($db) {
            return Main::findOne(Yii::$app->params['company_id']);
        }, 0, $dependency);
        return $company;
    }

}

