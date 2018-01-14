<?php
use yii\helpers\Url;

$this->params['active_page'][] = 'disease';
?>
    <h1>Болезни</h1>

    <?php if (!(empty($diseases))): ?>
        <?php foreach ($diseases as $key1 => $disease): ?>
            <!--        --><?php
//            if ($key1!='0'){echo '<hr>';}
//        ?>

            <?= $disease->name ?>
            <br><br>
            <?= $disease->description ?>
            <br><br>


            <a href="<?= Url::to(['/disease/view', 'id' => $disease->id]) ?>"> Подробнее</a>
            <br><br>
        <?php endforeach; ?>
    <?php endif; ?>
