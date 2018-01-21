<?php

use yii\helpers\Url;
use yii\helpers\Html;

$this->params['active_page'][] = 'contacts';

?>
    <ul class="breadcrumbs col-xs-12 col-md-12">
        <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
        <li>Контакты</li>
    </ul>

<h1>Контакты</h1>
<div class="row">
    <div class="col-xs-12 col-sm-8">
    <?= $main->field_contacts ?>
        <div class="row">
            <div class="col-xs-12 col-sm-6">
                <div class="contact_field">
                    <div class="contact_field_icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                    <div>Телефон:<br> <?= $main->phone ?></div>
                </div>
            </div>
            <div class="col-xs-12 col-sm-6">
                <div class="contact_field">
                    <div class="contact_field_icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
                    <div>Email:<br> <?= $main->email ?></div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xs-12 col-sm-4">
        <div class="avatar_block">
            <?php $avtor_img = $main->getImage(); ?>
            <!--                            <li class="slide document_index_image document_index_--><?//=$key1?><!-- --><?//= $key1 === count($documents)-1? 'document_index_image_active': '' ?><!--">-->
            <!--                                <i class="fa fa-search-plus"></i>-->
            <!--                                <img src="--><?//= $documents[((count($documents)-1) - $key1)]->image?><!--" alt="">-->
            <!--                            </li>-->
            <?php if($avtor_img->filePath != 'no_image.jpg') {?>
                <p class="avtor_image_container">
                    <?= Html::img($avtor_img->getPath(), ['alt' => 'Магадеев Тансык', 'class' => 'img-fluid']) ?>
                </p>
            <?php } ?>
            <div class="h3">Магадеев Тансык Ренатович</div>
            <p>
                <?php
                $vk = $main->avtor_vk
                ?>
                <?php if ($vk) { ?>
                    <a href="<?= $vk ?>" class="avtor_vk_link" target="_blank"><i class="fa fa-vk"></i></a>
                <?php } ?>
            </p>
        </div>
    </div>
</div>