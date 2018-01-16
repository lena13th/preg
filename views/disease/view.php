<?php
use yii\helpers\Html;
use yii\helpers\Url;


$this->params['active_page'][] = 'disease';

?>
<h1><?= $disease->name ?> </h1>

        <?= $disease->content ?>
<?php $img = $documents[((count($documents)-1) - $key1)]->getImage(); ?>

<a href="<?= Url::to($img->getPath('1500x'))?>" class="product_image_btn" data-toggle="lightbox" data-gallery="album-gallery"><i class="fa fa-search-plus"></i></a>
<p>
    <?= Html::img($img->getPath('350x'), ['alt' => $document->title, 'class' => 'img-fluid']) ?>
</p>
