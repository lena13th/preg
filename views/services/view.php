<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['active_page'][] = 'services';

?>
<ul class="breadcrumbs col-xs-12 col-md-12">
    <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
    <li><a href="<?= Url::to(['/services/index']) ?>">Услуги</a></li>
    <li><?= $service->name ?></li>
</ul>

<h1><?= $service->name ?> </h1>

        <?= $service->content ?>
        <?= $service->price ?>

