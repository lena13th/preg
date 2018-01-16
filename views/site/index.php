<?php

use yii\helpers\Url;
use yii\helpers\Html;
$this->params['active_page'][] = 'index';

?>
<div class="content_wrapper">
    <div class="content_row">
        <div class="row">
            <div class="left_conent col-xs-12 col-sm-8">
                <div class="h3">Цель сайта</div>
                <?= $main->mission ?>
            </div>
            <div class="right_content col-xs-12 col-sm-4">
                <div class="left_padding_20 h3">Пару слов о себе</div>
                <div class="about_index_block">
                    <?= $main->about ?>
                    <div class="about_button btn btn-default" data-toggle="modal" data-target="#myModal">Подробнее о специализации</div>
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <?= $main->full_about ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="content_row seaks_index col-xs-12">
        <div class="row">
            <?php if (!(empty($pages))): ?>
                <?php foreach ($pages as $key => $page): ?>
                    <div class="col-xs-12 col-sm-4">
                        <div class="seak_index_block">
                            <div class="h3"><?= $page->title ?></div>
                            <div class="seak_index_description"><?= $page->description ?></div>
                            <a class="btn btn-primary" href="<?= Url::to([$page->link]) ?>">Подробнее</a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class="content_row col-xs-12 document_index">
        <div class="document_index_container">
            <?php if (!(empty($documents))): ?>
                <?php foreach ($documents as $key1 => $document): ?>
                    <div class="document_index_left <?= $key1 === 0? 'document_index_active': '' ?>">
                        <div class="h3">
                            <?= $document->title ?>
                        </div>
                        <div class="document_index_desciption">
                            <?= $document->description ?>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
            <div class="document_index_images">
                <div class="document_index_images_container">
                    <div class="document_index_circle"></div>
                    <ul id="bool" class="passive cube">
                        <?php foreach ($documents as $key1 => $document): ?>
<!--                            --><?php //$img = $documents[((count($documents)-1) - $key1)]->getImage(); ?>
                            <?php $img = $documents[$key1]->getImage(); ?>
<!--                            <li class="slide document_index_image document_index_--><?//=$key1?><!-- --><?//= $key1 === count($documents)-1? 'document_index_image_active': '' ?><!--">-->
<!--                                <i class="fa fa-search-plus"></i>-->
<!--                                <img src="--><?//= $documents[((count($documents)-1) - $key1)]->image?><!--" alt="">-->
<!--                            </li>-->
                            <?php if($img->filePath != 'no_image.jpg') {?>
                                <li class="slide document_index_image document_index_image_active">
                                    <a href="<?= Url::to($img->getPath('1500x'))?>" class="product_image_btn" data-toggle="lightbox" data-gallery="album-gallery"><i class="fa fa-search-plus"></i></a>
                                    <p>
                                        <?= Html::img($img->getPath('350x'), ['alt' => $document->title, 'class' => 'img-fluid']) ?>
                                    </p>
                                </li>
                            <?php } ?>
                        <?php endforeach; ?>
                    </ul>
                </div>
            </div>
        </div>
        <div class="document_index_navigation">
            <i class="prev fa fa-angle-left" id="left"></i>
            <i class="next fa fa-angle-right" id="right"></i>
        </div>
    </div>
</div>
