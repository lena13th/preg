
<?php
use yii\helpers\Url;
use yii\helpers\Html;
$this->params['active_page'][] = 'services';
?>
    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Услуги</li>
    </ul>

    <h1>Услуги</h1>

    <?php if (!(empty($services))): ?>
        <div class="row page_item_row">
            <?php foreach ($services as $key1 => $service): ?>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="page_item_block">
                        <div class="h4"><?= $service->name ?></div>
                        <div class="page_item_description"><?= $service->description ?></div>
                        <div class="page_item_image">
                            <?//= $disease->description ?>
                            <?php $img = $service->getImage(); ?>

                            <?= Html::img('/'.$img->getPath('350x'), ['alt' => $service->name, 'class' => 'img-fluid']) ?>
                        </div>
                        <div class="page_item_price_and_link">
                            <div class="h4"><?= $service->price ?></div>
                            <a class="btn btn-primary" href="<?= Url::to(['/services/view', 'id' => $service->id]) ?>"> Подробнее</a>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    <?php else: ?>
        <div class="empty_content empty_center">
            <div class="h2">Услуг не найдено</div>
            <p>К сожалению на данный момент на сайте нет опубликованных услуг.</p>
            <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
        </div>
    <?php endif; ?>