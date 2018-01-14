<?php
foreach ($pages as $page) {
?>
<option
        value="<?= $page['id'] ?>"
    <?php if ($page['id'] == $model->category_id) echo ' selected' ?>
>
    <?= $page['name'] ?>

</option>
<?php
}
?>