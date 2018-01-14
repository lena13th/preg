<?php
use yii\helpers\Html;
use yii\helpers\Url;
use app\assets\IndexAsset;
IndexAsset::register($this);
?>

<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>

        <?php $this->head() ?>
    </head>

    <body data-spy="scroll">

    <?php $this->beginBody() ?>

    <div class="nav_cover index_section1">
        <?php $this->beginContent('@app/views/layouts/index_block.php', compact('isIndex')); ?>
        <?php $this->endContent(); ?>
    </div>
    <?= $content ?>
    <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
    <?php $this->endContent(); ?>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>