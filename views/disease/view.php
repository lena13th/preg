<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['active_page'][] = 'disease';

?>
<ul class="breadcrumbs col-xs-12 col-md-12">
    <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
    <li><a href="<?= Url::to(['/disease/new']) ?>">Болезни</a></li>
    <li><?= $disease->name ?></li>
</ul>

<h1><?= $disease->name ?> </h1>

        <?= $disease->content ?>
<?php //$img = $disease->getImage(); ?>
<!---->
<!--<a href="--><?//= Url::to($img->getPath('1500x'))?><!--" class="product_image_btn" data-toggle="lightbox" data-gallery="album-gallery"><i class="fa fa-search-plus"></i></a>-->
<!--<p>-->
<!--    --><?//= Html::img($img->getPath('350x'), ['alt' => $document->title, 'class' => 'img-fluid']) ?>
<!--</p>-->
