<?php

use yii\helpers\Url;

$this->params['active_page'][] = 'reviews';

?>
<ul class="breadcrumbs col-xs-12 col-md-12">
    <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
    <li>Отзывы</li>
</ul>

<h1>Отзывы</h1>

<script type="text/javascript">
    VK.init({apiId: 6329820, onlyWidgets: true});
</script>

<!-- Put this div tag to the place, where the Comments block will be -->
<div id="vk_comments"></div>
<script type="text/javascript">
    VK.Widgets.Comments("vk_comments", {limit: 15, attach: "*"});
</script>