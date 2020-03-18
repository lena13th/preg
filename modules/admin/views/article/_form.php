<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;
/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

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
    <?= $form->field($model, 'content')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'code')->textarea(['rows' => 6]) ?>

    <?php $img = $model->getImage(); ?>
    <?php if($img->filePath != 'no_image.jpg') {?>
        <div>
            <?= Html::a('Удалить изображение', ['deletephoto', 'id' => $model->id, 'image'=>$img->id, 'g'=>0], ['class' => 'remove_gallery_image', 'data-id'=>$model->id, 'data-g'=>0, 'data-image' => $img->id]) ?><br>
            <img src="/<?php echo $img->getPath('150x')?>" alt="<?= $model->title ?>">
        </div>

    <?php } ?>

    <?= $form->field($model, 'image')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
