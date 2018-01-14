<?php
use yii\helpers\Url;
?>
<div class="menu_container window">
    <div class="inside_window">
        <div class="close_window">✕</div>
        <div class="h3 window_header">Меню</div>
        <ul class="menu">
            <li
                <?php
                if ($this->params['active_page'][0] == 'index') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home" aria-hidden="true"></i>Обо мне</a>
            </li>
            <li
                <?php
                if ($this->params['active_page'][0] == 'services') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/services/index']) ?>"><i class="fa fa-building" aria-hidden="true"></i>Услуги</a>
            </li>
            <li
                <?php
                if ($this->params['active_page'][0] == 'disease') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/disease/new']) ?>"><i class="fa fa-building" aria-hidden="true"></i>Болезни</a>
            </li>
            <li
                <?php
                if ($this->params['active_page'][0] == 'hemostas') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/site/hemostas']) ?>"><i class="fa fa-newspaper-o" aria-hidden="true"></i>
                    Гемостаз</a>
            </li>
            <li
                <?php
                if ($this->params['active_page'][0] == 'article') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/article/index']) ?>"><i class="fa fa-users"
                                                                                  aria-hidden="true"></i>Статьи</a>
            </li>
            <li
                <?php
                if ($this->params['active_page'][0]=='reviews') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/site/reviews']) ?>"><i class="fa fa-calendar" aria-hidden="true"></i> Отзывы</a>
            </li>
            <li
                <?php
                if ($this->params['active_page'][0]=='contacts') { ?>
                    class="active"
                <?php }
                ?>
            >
                <a href="<?= Url::to(['/site/contacts']) ?>"><i class="fa fa-address-card-o" aria-hidden="true"></i>
                    Контакты</a>
            </li>
        </ul>
    </div>
</div>
<button type="button" class="navbar-toggle">
    <span class="sr-only">Меню</span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
    <span class="icon-bar"></span>
</button>
