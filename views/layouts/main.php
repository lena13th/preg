<?php
use yii\helpers\Html;
use app\assets\MainAsset;

MainAsset::register($this);
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
        <script type="text/javascript" src="//vk.com/js/api/openapi.js?151"></script>

        <?php $this->head() ?>
    </head>

    <body data-spy="scroll">
    <div class="main_page_wrapper">
        <?php $this->beginBody() ?>

        <div class="nav_cover index_section1">
            <?php $this->beginContent('@app/views/layouts/main_block.php'); ?>
            <?php $this->endContent(); ?>
        </div>
        <div class="content_wrapper">
            <div class="content_row">
                <?= $content ?>
            </div>
        </div>
        <?php $this->beginContent('@app/views/layouts/footer.php'); ?>
        <?php $this->endContent(); ?>
    </div>

    <?php $this->endBody() ?>
    </body>
    </html>
<?php $this->endPage() ?>