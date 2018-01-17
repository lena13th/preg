<?php

use yii\helpers\Url;

$this->params['active_page'][] = 'contacts';

?>
    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Контакты</li>
    </ul>

<h1>Контакты</h1>

Описание: <?= $main->field_contacts ?>
<br><br>
Телефон: <?= $main->phone ?>
<br><br>
Email: <?= $main->email ?>