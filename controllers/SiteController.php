<?php

namespace app\controllers;

use app\models\Disease;
use app\models\Document;
use app\models\LoginForm;
use app\models\Main;
use app\models\Page;
use app\models\SignupForm;
use app\models\User;
use Yii;
use yii\caching\DbDependency;
use yii\filters\AccessControl;
use yii\web\Response;

class SiteController extends AppController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],

        ];
    }

    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }
    /**
     * Displays homepage.
     */
    public function actionIndex()
    {
        $this->layout = 'index_layout';
        Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM main',
        ]);
        $main = Yii::$app->db->cache(function ($db) {
            return Main::findOne(Yii::$app->params['company_id']);
        }, 60, $dependency);

        $dependency1 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);

        $pages = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['published' => 1])->all();
        }, 60, $dependency1);

        $dependency2 = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM document',
        ]);

        $isIndex = true;

        $documents = Yii::$app->db->cache(function ($db) {
            return Document::find()->where(['published' => 1])->all();
        }, 60, $dependency2);

        $this->setMeta('Беременность +. Блог врача-хирурга. Тансык Магадеев', '', $main->name);

        return $this->render('index', compact( 'main','pages', 'documents', 'isIndex'));
    }


    public function actionHemostas()
    {
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM page',
        ]);
        $hemostas = Yii::$app->db->cache(function ($db) {
            return Page::find()->where(['alias' => 'hemostas'])->one();
        }, 60, $dependency);
        $this->setMeta('Гемостазиология', '', 'Гемостазиология. Блог врача-хирурга. Тансык Магадеев');

        return $this->render('hemostas', compact( 'hemostas'));
    }


    public function actionReviews()
    {
        $this->setMeta('Отзывы', '', 'Отзывы. Блог врача-хирурга. Тансык Магадеев');

        return $this->render('reviews');
    }

    public function actionContacts()
    {
        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM main',
        ]);
        $main = Yii::$app->db->cache(function ($db) {
            return Main::findOne(Yii::$app->params['company_id']);
        }, 60, $dependency);

        $this->setMeta('Контакты', '', 'Контактные данные. Блог врача-хирурга. Тансык Магадеев');

        return $this->render('contacts',compact('main'));
    }

    public function actionSignup(){
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }
        $model = new SignupForm();
        if($model->load(\Yii::$app->request->post()) && $model->validate()){
            $user = new User();
            $user->username = $model->username;
            $user->password = \Yii::$app->security->generatePasswordHash($model->password);
            if($user->save()){
                return $this->goHome();
            }
        }

        return $this->render('signup', compact('model'));
    }
}
