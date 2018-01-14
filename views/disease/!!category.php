<?php
use yii\helpers\Url;

$this->params['active_page'][] = 'disease';
?>
    <h1><?= $disease->title ?></h1>
<?= $disease->content ?>

    <?php if (!(empty($categories))): ?>
        <?php foreach ($categories as $key1 => $category): ?>

            <?= $category->name ?>
            <br><br>
            <?= $category->description ?>
            <br><br>
            <?= $category->image ?>
            <br><br>


            <a href="<?= Url::to(['/disease/index', 'id' => $category->id]) ?>"> Подробнее</a>
            <br><br>
        <?php endforeach; ?>
<?php else: ?>
    <div class="empty_content empty_center">
        <div class="h2">Болезней не найдено</div>
        <p>К сожалению на данный момент на сайте нет опубликованных болезней.</p>
        <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
    </div>
<?php endif; ?>