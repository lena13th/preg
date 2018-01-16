<?php
use app\components\CompanyWidget;
use yii\helpers\Url;

?>
<nav class="nav_line">
    <?php $this->beginContent('@app/views/layouts/menu.php'); ?>
    <?php $this->endContent(); ?>
    <button type="button" class="navbar-toggle">
        <span class="sr-only">Меню</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
    </button>
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
            <div class="btn btn-primary site_descr_button">Знакомство с сайтом</div>
        </div>
        <a href="https://vk.com" class="main_vk_link" target="_blank"><i class="fa fa-vk"></i></a>
    </div>
</nav>