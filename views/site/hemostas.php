<?php

use yii\helpers\Url;

$this->params['active_page'][] = 'hemostas';

?>
    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li><?= $hemostas->title ?></li>
    </ul>

<h1><?= $hemostas->title ?></h1>
<?= $hemostas->content ?>