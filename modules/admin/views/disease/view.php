<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\disease */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Болезни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="disease-view">

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
            'name',
            [
                'attribute' => 'description',
                'format' => 'html'
            ],
            [
                'attribute' => 'category_id',
                'value' => app\modules\admin\components\RelatedCategory::widget(['model'=>$model,'cat'=>$model->category_id]),
                'format' => 'html'
            ],


//            'content:ntext',
//            'updated_on',
        ],

    ]) ?>
    <?php $img = $model->getImage(); ?>

    <?php if($img->filePath != 'no_image.jpg') { ?>

        <div class="prod_img_button" style="width:150px; display:inline-block;">
            <a href="<?= Url::to('/'.$img->getPath('1500x'))?>" class="product_image_btn lightbox" data-toggle="lightbox">
                <img src="/<?= $img->getPath('150x')?>" alt="<?= $model->name?>">
                <i class="fa fa-search-plus" aria-hidden="true" style="font-size: 20px; width: 100%; height: 100%; padding-top: 40px; padding-left: auto;"></i>
            </a>
        </div>

    <?php } ?>

</div>
