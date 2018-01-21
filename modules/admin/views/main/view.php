<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\helpers\Url;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Main */

$this->title = $model->name;
$this->params['breadcrumbs'][] = 'Редактировать данные';
?>
<div class="main-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'name',
            [
                'attribute' => 'description',
                'format' => 'html'
            ],
            [
                'attribute' => 'mission',
                'format' => 'html'
            ],
            [
                'attribute' => 'about',
                'format' => 'html'
            ],
            [
                'attribute' => 'full_about',
                'format' => 'html'
            ],
            [
                'attribute' => 'phone',
                'format' => 'html'
            ],
            [
                'attribute' => 'email',
                'format' => 'html'
            ],
            [
                'attribute' => 'vk',
                'format' => 'html'
            ],
            [
                'attribute' => 'avtor_vk',
                'format' => 'html'
            ],
            [
                'attribute' => 'field_contacts',
                'format' => 'html'
            ],
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
