<?php
use yii\helpers\Url;

$this->params['active_page'][] = 'services';
?>
    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Услуги</li>
    </ul>

    <h1>Услуги</h1>

    <?php if (!(empty($services))): ?>
        <?php foreach ($services as $key1 => $service): ?>
            <!--        --><?php
//            if ($key1!='0'){echo '<hr>';}
//        ?>

            <?= $service->name ?>
            <br><br>
            <?= $service->description ?>
            <br><br>
            <?= $service->image ?>
            <br><br>
            <?= $service->price ?>
            <br><br>


            <a href="<?= Url::to(['/services/view', 'id' => $service->id]) ?>"> Подробнее</a>
            <br><br>
        <?php endforeach; ?>
<?php else: ?>
    <div class="empty_content empty_center">
        <div class="h2">Услуг не найдено</div>
        <p>К сожалению на данный момент на сайте нет опубликованных услуг.</p>
        <a href="<?= Url::to(['/site/index']) ?> " class="btn btn-default back_to_home"><span>Вернуться на главную</span></a>
    </div>
<?php endif; ?>