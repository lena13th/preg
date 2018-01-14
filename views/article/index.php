<?php
use yii\helpers\Url;

$this->params['active_page'][] = 'article';
?>
    <h1><?= $page_article->title ?></h1>
    <?= $page_article->content   ?>
    <?php if (!(empty($articles))): ?>
        <?php foreach ($articles as $key1 => $article): ?>
            <!--        --><?php
//            if ($key1!='0'){echo '<hr>';}
//        ?>

            <?= $article->title ?>
            <br><br>
            <?= $article->description ?>
            <br><br>
            <?= $article->image ?>
            <br><br>


            <a href="<?= Url::to(['/article/view', 'id' => $article->id]) ?>"> Подробнее</a>
            <br><br>
        <?php endforeach; ?>
<?php else: ?>
    <div class="empty_content empty_center">
        <div class="h2">Статей не найдено</div>
        <p>К сожалению на данный момент на сайте нет опубликованных статей.</p>
        <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
    </div>
<?php endif; ?>