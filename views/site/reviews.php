<?php

$this->params['active_page'][] = 'reviews';

?>
<h1>Отзывы</h1>

<script type="text/javascript">
    VK.init({apiId: 6329820, onlyWidgets: true});
</script>

<!-- Put this div tag to the place, where the Comments block will be -->
<div id="vk_comments"></div>
<script type="text/javascript">
    VK.Widgets.Comments("vk_comments", {limit: 15, attach: "*"});
</script>