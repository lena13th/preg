<?php

namespace app\controllers;

use app\models\Services;
use Yii;
use yii\caching\DbDependency;
use yii\data\Pagination;
use app\models\Order;

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

        $this->setMeta('Услуги', '', 'Услуги. Блог врача-хирурга. Тансык Магадеев');

        return $this->render('index',compact( 'services'));
    }

    public function actionView($id)
    {
        $session =Yii::$app->session;
        $session->open();
//        $this->setMeta('Список пожеланий');
        $service = Services::find()->where(['published' => 1])->andWhere(['id' => $id])->one();
        $company =$this->getCompany();
        $order = new Order();
        if ($order->load(Yii::$app->request->post())) {
            if ($order->save()) {
                Yii::$app->session->setFlash('success', 'Ваше письмо отправлено.');
                Yii::$app->mailer->compose('order', ['order'=>$order, 'service'=>$service])
                    ->setFrom(['mr-15@mail.ru' => 'Блог врача-хирурга. Беременность +'])
                    ->setTo($company->email)
                    ->setSubject('Заявка на услугу с сайта')
                    ->send();
                return $this->refresh();
            }
            else {
                Yii::$app->session->setFlash('error', 'Возникла ошибка при отправке');
                return $this->refresh();
            }
        }
//         return $this->render('order_form', compact('order'));
//        return $this->render('wishlist_page', compact('session', 'order'));

        if (empty($service)) throw new \yii\web\HttpException(404, 'К сожалению такой услуги не найдено.');

        $this->setMeta($service->name, '', $service->description);
        return $this->render('view', compact('service', 'session', 'order', 'company'));
    }
}