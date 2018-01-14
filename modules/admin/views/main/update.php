<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Main */

$this->title = 'Редактирование';
$this->params['breadcrumbs'][] = ['label' => 'Редактировать данные', 'url' => ['view', 'id' => 1]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="main-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
