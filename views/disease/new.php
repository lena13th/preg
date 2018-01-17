<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['active_page'][] = 'disease';
?>

    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Болезни</li>
    </ul>


    <h1><?= $page_disease->title ?></h1>
<?= $page_disease->content ?>
    <?php if (!(empty($categories))): ?>
        <?php foreach ($categories as $key => $category): ?>
        <div class="">
            <div class="h3"><?= $category->name ?></div>
            <?= $category->description ?>
            <?= $category->image ?>
            <div class="row">
                <?php foreach ($category->disease as $key1 => $disease): ?>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="h4"><?= $disease->name ?></div>
                        <div>
                            <?//= $disease->description ?>
                            <?php $img = $category->disease[$key1]->getImage(); ?>

                            <?= Html::img($img->getPath('350x'), ['alt' => $disease->name, 'class' => 'img-fluid']) ?>
                        </div>
                        <a class="btn btn-primary" href="<?= Url::to(['/disease/view', 'id' => $disease->id]) ?>"> Подробнее</a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
        <?php endforeach; ?>
    <?php else: ?>
    <div class="empty_content empty_center">
        <div class="h2">Болезней не найдено</div>
        <p>К сожалению на данный момент на сайте нет опубликованных болезней.</p>
        <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
    </div>
<?php endif; ?>