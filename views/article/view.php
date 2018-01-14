<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['active_page'][] = 'article';

?>
<h1><?= $article->title ?> </h1>

        <?= $article->content ?>
        <?= $article->code ?>

