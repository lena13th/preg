<?php
use app\components\CompanyWidget;
?>
<footer class="footer_container content_row col-xs-12">
    <div class="footer_title">Беременность+</div>
    <?php
    $vk = CompanyWidget::widget(['object'=>'vk'])
    ?>
    <?php if ($vk) { ?>
        <a href="<?= $vk ?>" class="footer_vk_link" target="_blank"><i class="fa fa-vk"></i></a>
    <?php } ?>
    <div class="footer_year"><?= date('Y') ?> г.</div>
</footer>
