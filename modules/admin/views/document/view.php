<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\document */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Документы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="document-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить данную запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php $img = $model->getImage(); ?>
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'published',
                'value' => function($data) {
                    if($data->published==1) {
                        return 'Да';
                    }
                    else {
                        return 'Нет';
                    }
                },
            ],
            'title',
            [
                'attribute' => 'description',
                'format' => 'html'
            ],
            [
                'attribute' => 'image',
                'value' => '
                    <div class="prod_img_button"  style="width:150px; display:inline-block;">
                        <a href="'.Url::to($img->getPath('800x')).'" class="product_image_btn lightbox">'.
//                    Html::img($img->getPath('150x'), ['alt' => $model->title, 'class' => 'product_image img-fluid']).
                '<img src="/'.$img->getPath('150x').'" alt="'.$model->title.'">'.
                    '<i class="fa fa-search-plus" aria-hidden="true" style="font-size: 20px; width: 100%; height: 100%; padding-top: 40px; padding-left: auto;"></i>
                        </a>
                    </div>',
                'format' => 'html',
            ],
        ],
    ]) ?>

</div>
