<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['active_page'][] = 'article';

?>
<ul class="breadcrumbs col-xs-12 col-md-12">
    <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
    <li><a href="<?= Url::to(['/article/index']) ?>">Статьи</a></li>
    <li><?= $article->title ?></li>
</ul>

<h1><?= $article->title ?> </h1>
    <?php $img = $article->getImage(); ?>
    <?php if (!preg_match('/placeHolder/', $img->getPath())) { ?>
    <?= Html::img('/'.$img->getPath(), ['alt' => $article->title, 'class' => 'img-fluid']) ?>
        <?= $article->content ?>
        <?= $article->code ?>
    <?php } ?>
<!--placeHolder_350x-->
