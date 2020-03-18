<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
$this->params['active_page'][] = 'services';
?>
<ul class="breadcrumbs col-xs-12 col-md-12">
    <li><a href="<?= Url::to(['/site/index']) ?>"><i class="fa fa-home"></i>Главная</a></li>
    <li><a href="<?= Url::to(['/services/index']) ?>">Услуги</a></li>
    <li><?= $service->name ?></li>
</ul>

<div class="row">
    <?php $img = $service->getImage(); ?>
    <?php if (!preg_match('/placeHolder/', $img->getPath())) { ?>
    <div class="col-xs-12 col-sm-4 service_block_image">
        <?= Html::img('/'.$img->getPath(), ['alt' => $service->name, 'class' => 'img-fluid']) ?>
    </div>
    <?php } ?>
    <div class="col-xs-12 col-sm-8 service_block_content">
        <h1><?= $service->name ?> </h1>
        <p><?= $service->content ?></p>
        <?php if ($service->price) {?>
            <div class="h3"><?= $service->price ?></div>
        <?php } ?>
        <?php if ($company->phone) { ?>
            <p>Вы можете заказать услугу, позвонив по телефону: <?= $company->phone ?></p>
        <? } if ($company->email) { ?>
            <p>написав на почту: <?= $company->email ?></p>
        <? } ?>
        <?php if ($company->phone && $company->email) { ?>
            <p> или заполнив форму на сайте, нажав кнопку "Заказать" </p>
        <?php } ?>
        <div class="btn btn-primary send_list">Заказать</div>
    </div>
</div>

<?php if(Yii::$app->session->hasFlash('success')) {?>
    <div class="overlay overlay_showen"></div>
    <div class="order send">
        <div class="close_order">✕</div>
        <h3>Ваше письмо отправлено!</h3> <p>Спасибо за заявку, в скором времени мы свяжемся с вами.</p>
    </div>
<?php } elseif(Yii::$app->session->hasFlash('error')) { ?>
    <div class="overlay overlay_showen"></div>
    <div class="order send">
        <div class="close_order">✕</div>
        <h3>Ошибка!</h3> <p>В результате отправки возникла ошибка, пожалуйста попробуйте снова.</p>
    </div>
<?php } else { ?>
    <div class="overlay"></div>
    <div class="order">
        <div class="close_order">✕</div>
        <div class="h3">Форма заказа услуги</div>
        <p>Поля со звездочкой * являются обязательными</p>
        <p><u>Услуга: <?= $service->name ?></u></p>
        <?php $form = ActiveForm::begin(['id' => 'order-form']); ?>
        <div class="row">
            <div class="col-md-6 contact_rows">
                <?= $form->field($order, 'name') ?>
                <?= $form->field($order, 'phone') ?>
                <?= $form->field($order, 'message')->textarea(['rows' => 4]) ?>
            </div>
            <div class="col-md-6 contact_rows">
                <?= $form->field($order, 'email') ?>
                <?= $form->field($order, 'verifyCode')->widget(Captcha::className(), [
                    'template' => '<div>{image}</div><div>{input}</div>',
                ]) ?>
            </div>
        </div>
        <div class="form-group col-xs-12" style="text-align:center;">
            <?= Html::submitButton('Отправить', ['class' => 'btn btn-primary', 'name' => 'order-button']) ?>
        </div>
        <?php ActiveForm::end(); ?>
    </div>
<?php } ?>