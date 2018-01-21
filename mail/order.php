<?php use yii\helpers\Html; ?>
<?php use yii\helpers\Url; ?>
<?php use yii\bootstrap\ActiveForm; ?>
<?php use yii\captcha\Captcha; ?>

<div style=" position: relative; text-align: left; padding-right: 15px; margin-right: auto; margin-left: auto;">
		<div style="text-align: left; padding-top: 20px; padding-bottom: 20px; padding-left:20px;">
			<span style="margin-top: 20px; margin-bottom: 10px; font-size: 30px; font-weight:100!important; color: #444!important;">Заявка на услугу: <?=$service->name?></span>
		</div>
		<div style="padding-left:20px"><p>От: <?= $order->name ?></p>
			<p>Телефон: <?= $order->phone ?></p>
			<?php if ($order->message) { ?>
			<p>Сообщение: <?= $order->message ?></p>
			<?php } ?>
			<?php if ($order->message) { ?>
			<p>Email: <?= $order->email ?></p>
			<?php } ?>
		</div>
</div>
