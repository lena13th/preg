<?php

namespace app\controllers;

use app\models\Services;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;

class ServicesController extends AppController
{
     public function actionIndex()
    {
        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM services',
        ]);

        $query = Services::find()->where(['published' => 1])
            ->orderBy(['name' => SORT_ASC,]);

        // Инициируем пагинацию
        $pages = new Pagination([
            'totalCount'=>$query->count(),
            'pageSize'=>4,
            'forcePageParam' => false,
            'pageSizeParam' => false
        ]);

        $services = Yii::$app->db->cache(function ($db) use ($pages, $query) {
            return $query->offset($pages->offset)->limit($pages->limit)->all();
        }, 0, $dependency);

        $this->setMeta('Услуги', '', 'Услуги. Блог врача-хирурга Тансык Магадеева');

        return $this->render('index',compact( 'services'));
    }

    public function actionView($id)
    {

        $service = Services::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        if (empty($service)) throw new \yii\web\HttpException(404, 'К сожалению такой услуги не найдено.');

        $this->setMeta($service->name, '', 'Услуги');
        return $this->render('view', compact('service'));
    }
}