<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\DiseaseSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Болезни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disease-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            [
                'attribute' => 'published',
                'filter' => ['0' => 'Нет', '1' => 'Да'],
                'value' => function($data) {
                    if($data->published==1) {
                        return '<span style="color:green;">Опубликовано</span>';
//                        return 'Опубликовано';
                    }
                    else {
                        return '<span class="text-danger">Не опубликовано</span>';
//                        return 'Не опубликовано';
                    }
                },
                'format' => 'html'

            ],
//            'description:ntext',
//            'content:ntext',
//            'updated_on',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
