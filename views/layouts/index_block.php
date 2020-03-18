<?php
use app\components\CompanyWidget;
use yii\helpers\Url;

?>
<nav class="nav_line">
    <?php $this->beginContent('@app/views/layouts/menu.php'); ?>
    <?php $this->endContent(); ?>
    <div class="main_block">
        <div class="site_main">
            <div class="site_title_back"><noindex>Беременность +</noindex></div>
            <h1 class="site_title"><span>Беременность</span><span class="site_title_plus">+</span></h1>
<!--            <div class="site_description">Блог врача-хирурга.<br> Все о невынашивания беременности, гемостазиологии, привычного невынашивания, свертываемости крови, гиперкоагуляции крови</div>-->
            <div class="site_description">
                <?= CompanyWidget::widget(['object' => 'name']); ?>
                <br>
                <?= CompanyWidget::widget(['object' => 'description']); ?>
            </div>
            <a class="btn btn-primary site_descr_button" href="#page2">
                <div class="fdown">
                    <span class="fdowntext">Знакомство с сайтом</span>
                </div>
            </a>
        </div>
        <?php
            $vk = CompanyWidget::widget(['object'=>'vk'])
        ?>
        <?php if ($vk) { ?>
        <a href="<?= $vk ?>" class="index_vk_link" target="_blank"><i class="fa fa-vk"></i></a>
        <?php } ?>
    </div>
</nav>