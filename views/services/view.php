<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['active_page'][] = 'services';

?>
<h1><?= $service->name ?> </h1>

        <?= $service->content ?>
        <?= $service->price ?>

