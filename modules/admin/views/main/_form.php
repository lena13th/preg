<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use mihaildev\ckeditor\CKEditor;
use mihaildev\elfinder\ElFinder;

/* @var $this yii\web\View */
/* @var $model app\modules\admin\models\Main */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="main-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'mission')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'about')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'full_about')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'phone')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'email')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <?= $form->field($model, 'field_contacts')->widget(CKEditor::className(), [
        'editorOptions' => ElFinder::ckeditorOptions('elfinder',[
            'height' => 100,
            'preset' => 'full',
            'inline' => false,
        ]),
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
