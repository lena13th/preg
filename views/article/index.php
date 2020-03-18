<?php
use yii\helpers\Html;
use yii\helpers\Url;

$this->params['active_page'][] = 'article';
?>
    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Статьи</li>
    </ul>

    <h1><?= $page_article->title ?></h1>
    <?= $page_article->content   ?>
    <?php if (!(empty($articles))): ?>

        <div class="row page_item_row">
            <?php foreach ($articles as $key1 => $article): ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="page_item_block">
                        <div class="h4"><?= $article->title ?></div>
                        <div class="page_item_image">
                            <?//= $disease->description ?>
                            <?php $img = $articles[$key1]->getImage(); ?>

                            <?= Html::img($img->getPath('350x'), ['alt' => $article->title, 'class' => 'img-fluid']) ?>
                        </div>
                        <a class="btn btn-primary" href="<?= Url::to(['/article/view', 'id' => $article->id]) ?>"> Подробнее</a>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>

<?php else: ?>
    <div class="empty_content empty_center">
        <div class="h2">Статей не найдено</div>
        <p>К сожалению на данный момент на сайте нет опубликованных статей.</p>
        <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
    </div>
<?php endif; ?>