<?php

use yii\helpers\Url;
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
                                    <div class="h2">Магадеев Тансык Ренатович.</div>
                                    <p>Врач-гемостазиолог акушер-гинеколог, врач хирург, рентген-хирург, хирургия-эндоскопия, коагулопатолог, ведение беременности.</p>
                                    <div class="h4">Специалист в области:</div>
                                    <ul>
                                        <li>Лапароскопия</li>
                                        <li>Гистероскопия</li>
                                        <li>Бесплодие</li>
                                        <li>Хирургия в гинекологии</li>
                                        <li>Рентген хирургия</li>
                                        <li>Оперативные роды</li>
                                        <li>Ведение беременности при невынашивание, с наследственной тромбофилией, АТ к
                                            ХГЧ, АФС. Гемостазиология.
                                        </li>
                                        <li>Обследование при невынашивании беременности</li>
                                        <li>Лечение при невынашивании беременности</li>
                                        <li>Предгравидарная подготовка при замершей беременности.</li>
                                        <li>Онлайн консультации.</li>
                                        <li>Эмболизация маточных артерий (ЭМА).</li>
                                    </ul>
                                    <div class="h4">Курсы повышения квалификации и первичной специализации:</div>
                                    <p>2012 - году окончил Башкирский Государственный Медицинский Университет.</p>
                                    <p>2013 - Первичная специализация по эндоскопии Образовательный Центр Высоких Медицинских Технологий AMTEC KAZAN. г.Казань</p>
                                    <p>2015 - «Центр сердца, крови и эндокринологии им.Алмазова» г.Санкт-Петербург</p>
                                    <p>2015 -РУДН "Проблемы невынашивания беременности, врожденной тромбофилии. Основы гемостазиологии и коагулопатологии" г.Москва</p>
                                    <p>2015 - ФГБУ НАУЧНЫЙ ЦЕНТР АКУШЕРСТВА, ГИНЕКОЛОГИИ И ПЕРИНАТОЛОГИИ имени академика В.И. Кулакова</p>
                                    <p>Министерства здравоохранения Российской Федерации г.Москва</p>
                                    <p>2016 - курсы профессиональной переподготовки по специальности «Рентген-эндоваскулярная диагностика и лечение» КГМА г.Казань.</p>
                                    <p>Участник и докладчик научных конференций.Несколько раз в год посещаю научные семинары и конференции, познаю наиболее современные и глобальные исследования Европы, Великобритании и США.</p>
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
<!--                            <li class="slide document_index_image document_index_--><?//=$key1?><!-- --><?//= $key1 === count($documents)-1? 'document_index_image_active': '' ?><!--">-->
<!--                                <i class="fa fa-search-plus"></i>-->
<!--                                <img src="--><?//= $documents[((count($documents)-1) - $key1)]->image?><!--" alt="">-->
<!--                            </li>-->
                            <li class="slide document_index_image">
                                <a href="vk.com"> <i class="fa fa-search-plus"></i></a>
                                <?= $documents[((count($documents)-1) - $key1)]->image?>
                            </li>
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
