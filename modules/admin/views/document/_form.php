<?php

use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\document */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="document-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>
    <div class="main_public">
        <?= $form->field($model, 'published')->checkbox([ '0', '1', 'class'=>'is_boolean']) ?>
    </div>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>

    <?php $img = $model->getImage(); ?>
    <?php if($img->filePath != 'no_image.jpg') {?>
        <div>
            <?= Html::a('Удалить изображение', ['deletephoto', 'id' => $model->id, 'image'=>$img->id, 'g'=>0], ['class' => 'remove_gallery_image', 'data-id'=>$model->id, 'data-g'=>0, 'data-image' => $img->id]) ?><br>
            <img src="/<?php echo $img->getPath('150x')?>" alt="<?= $model->title ?>">
        </div>

    <?php } ?>

    <?= $form->field($model, 'image')->fileInput() ?>

<!--    --><?//= $form->field($model, 'image')->widget(CKEditor::className(), [
//        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
//            'height' => 100,
//            'preset' => 'full',
//            'inline' => false,
//        ]),
//    ]);
//    ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
