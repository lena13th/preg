<?php

namespace app\controllers;

use app\models\Article;
use app\models\Page;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;

class ArticleController extends AppController
{
     public function actionIndex()
    {
        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM article',
        ]);

        $query = Article::find()->where(['published' => 1])
            ->orderBy(['title' => SORT_ASC,]);

        // Инициируем пагинацию
        $pages = new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'=>4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $articles = Yii::$app->db->cache(function ($db) use ($pages, $query) {
            return $query->offset($pages->offset)->limit($pages->limit)->all();
        }, 0, $dependency);

        $dependency1 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $page_article = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['alias' => 'article'])->one();
        }, 60, $dependency1);

        $this->setMeta('Статьи', '', 'Статьи. Блог врача-хирурга Тансык Магадеева');

        return $this->render('index',compact( 'articles','page_article'));
    }

    public function actionView($id)
    {

        $article = Article::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        if (empty($article)) throw new \yii\web\HttpException(404, 'К сожалению, такой статьи не найдено.');

        $this->setMeta($article->title, '', 'Статьи');
        return $this->render('view', compact('article'));
    }
}