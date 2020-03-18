<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\disease */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="disease-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="main_public">
        <?= $form->field($model, 'published')->checkbox([ '0', '1', 'class'=>'is_boolean']) ?>
    </div>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <label for="product-category_id" class="control-label">Категория</label>
    <select name="Disease[category_id]" id="product-category_id" class="form-control">
        <option value="0"></option>
        <?= app\modules\admin\components\RelatedCategory::widget(['model'=>$model,'cat'=>'0']) ?>
    </select>
    <br>

    <?= $form->field($model, 'description')->textarea(['rows' => 3]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>


    <?php $img = $model->getImage(); ?>
    <?php if($img->filePath != 'no_image.jpg') {?>
        <div>
            <?= Html::a('Удалить изображение', ['deletephoto', 'id' => $model->id, 'image'=>$img->id, 'g'=>0], ['class' => 'remove_gallery_image', 'data-id'=>$model->id, 'data-g'=>0, 'data-image' => $img->id]) ?><br>
            <img src="/<?php echo $img->getPath('150x')?>" alt="<?= $model->name ?>">
        </div>

    <?php } ?>

    <?= $form->field($model, 'image')->fileInput() ?>


    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
