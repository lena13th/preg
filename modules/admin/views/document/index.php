<?php

use yii\helpers\Html;
use yii\grid\GridView;
/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\models\documentSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Документы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать документ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'title',
            'description:ntext',
            [
                'attribute' => 'published',
                'filter' => ['0' => 'Не опубликовано', '1' => 'Опубликовано'],
                'value' => function($data) {
                    if($data->published==1) {
//                        return '<span style="color:green;">Опубликовано</span>';
                        return 'Опубликовано';
                    }
                    else {
//                        return '<span class="text-danger">Не опубликовано</span>';
                        return 'Не опубликовано';
                    }
                },
//                'format' => 'html'

            ],
//            'image',
//            [
//                'attribute'=>'published',
//                'pageSummary'=>false,
//                'filter' => Html::activeDropDownList($searchModel, 'published', ['Нет', 'Да'],['class'=>'form-control','prompt' => ' ']),
//                'value' => function($data) {
//                    if($data->published==1) {
//                        return '<span style="color:green;">Опубликовано</span>';
//                    }
//                    else {
//                        return '<span class="text-danger">Не опубликовано</span>';
//                    }
//                },
//                'format' => 'html'
//            ],
            // 'updated_on',

            ['class' => 'yii\grid\ActionColumn',

                'options'=> [
                    'width' => '80px'
                ]],
        ],
    ]); ?>

</div>
