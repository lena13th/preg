<?php

namespace app\modules\admin\components;

use app\modules\admin\models\Category;
use yii\base\Widget;
use Yii;
use yii\caching\DbDependency;

class RelatedCategory extends Widget
{

//    public $id;
    public $model;
    public $cat;
//    public $active_submenu;
//    public $model; /* Нужно для админки - передаем значение текущего экземпляра модели. проще говоря - запись категории на странице которой мы находимся */
//	public $tree; /* Результат работы функции - из массива строится дерево со вложенностью */
//	public $menuHtml; /* Готовый HTML код в зависимости от шаблона */
//	public $xxx; /* Готовый HTML код в зависимости от шаблона */


    public function init()
    {
        parent::init();

    }

    public function run()
    {
//                Yii::$app->cache->flush();

        $dependency = new DbDependency([
            'sql' => 'SELECT MAX(updated_on) FROM category',
        ]);
        $model = $this->model;
        $cat = $this->cat;
        if ($cat==0) {
            $pages = Yii::$app->db->cache(function ($db) {
                return Category::find()->all();
            }, 60, $dependency);

            return $this->render('related_category', compact('pages', 'model'));
        } else {
            $pages = Yii::$app->db->cache(function ($db) use ($cat) {
                return Category::find()->where(['id'=>$cat])->one();
            }, 60, $dependency);

            return $this->render('related_category_1', compact('pages', 'model'));
        }
    }
}