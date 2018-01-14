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
    public function actionCategory()
    {

        Yii::$app->cache->flush();


        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM category',
        ]);

        $query = Category::find()
            ->joinWith([
                'disease' => function ($query1) {
                    $query1->onCondition(['disease.published' => 1]);
                },
            ])
            ->andWhere(['category.published' => 1])
            ->andWhere(['disease.published' => 1])
            ->orderBy(['category.name' => SORT_ASC,])

        ;

        // Инициируем пагинацию
        $pages = new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'=>6,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $categories = Yii::$app->db->cache(function ($db) use ($pages, $query) {
            return $query->offset($pages->offset)->limit($pages->limit)->all();
        }, 0, $dependency);


        $dependency1 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $disease = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['alias' => 'disease'])->one();
        }, 60, $dependency1);

        $this->setMeta('Болезни', '', 'Болезни. Блог врача-хирурга Тансык Магадеева');

        return $this->render('category',compact( 'categories','disease'));
    }

    public function actionIndex($id)
    {
        Yii::$app->cache->flush();
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM disease',
        ]);

        $query = Disease::find()->where(['published' => 1])
            ->andWhere(['category' => $id])->orderBy(['name' => SORT_ASC,])
        ;

        // Инициируем пагинацию
        $pages = new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'=>4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $diseases = Yii::$app->db->cache(function ($db) use ($pages, $query) {
            return $query->offset($pages->offset)->limit($pages->limit)->all();
        }, 0, $dependency);
        if (empty($diseases)) throw new \yii\web\HttpException(404, 'В данной категории нет болезней');

        $this->setMeta('Болезни', '', 'Болезни. Блог врача-хирурга Тансык Магадеева');

        return $this->render('index',compact( 'diseases'));
    }

    public function actionView($id)
    {

        $disease = Disease::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        if (empty($disease)) throw new \yii\web\HttpException(404, 'К сожалению, такой болезни не найдено.');

        $this->setMeta($disease->name, '', 'Болезни');
        return $this->render('view', compact('disease'));
    }
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
            ->orderBy(['category.name','disease.name'])
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
}