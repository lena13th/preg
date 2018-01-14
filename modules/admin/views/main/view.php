<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

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
                'attribute' => 'phone',
                'format' => 'html'
            ],
            [
                'attribute' => 'email',
                'format' => 'html'
            ],
            [
                'attribute' => 'field_contacts',
                'format' => 'html'
            ],
        ],
    ]) ?>

</div>
