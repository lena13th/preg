<?php

namespace app\controllers;

use app\models\Category;
use app\models\Disease;
use app\models\Page;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;

class DiseaseController extends AppController
{
    public function actionNew()
    {
        Yii::$app->cache->flush();

        $categories=Category::find()
            ->joinWith([
                'disease' => function ($query1) {
                    $query1->onCondition(['disease.published' => 1]);
                },
            ])
            ->where(['category.published'=>1])
            ->andWhere(['disease.published'=>1])
            ->orderBy(['category.name' => SORT_ASC, 'disease.name' => SORT_ASC,])
            ->with('disease')
            ->all();

        $dependency1 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $page_disease = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['alias' => 'disease'])->one();
        }, 60, $dependency1);

        $this->setMeta('Болезни', '', 'Болезни. Блог врача-хирурга Тансык Магадеева');

        return $this->render('new',compact( 'categories','page_disease'));
    }
    public function actionView($id)
    {

        $disease = Disease::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        if (empty($disease)) throw new \yii\web\HttpException(404, 'К сожалению, такой болезни не найдено.');

        $this->setMeta($disease->name, '', 'Болезни');
        return $this->render('view', compact('disease'));
    }

}