<?php

namespace app\modules\admin\controllers;

use dektrium\user\controllers\SettingsController;
use dektrium\user\models\SettingsForm;

/**
 * ServicesController implements the CRUD actions for Services model.
 */
class AdminSettingsController extends SettingsController
{
    public $layout = '@app/modules/admin/views/layouts/main';
/**
 * Displays page where user can update account settings (username, email or password).
 *
 * @return string|\yii\web\Response
 */
    public function actionAccount()
    {
        /** @var SettingsForm $model */
        $model = \Yii::createObject(SettingsForm::className());
        $event = $this->getFormEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_ACCOUNT_UPDATE, $event);
        if ($model->load(\Yii::$app->request->post()) && $model->save()) {
            \Yii::$app->session->setFlash('success', \Yii::t('user', 'Your account details have been updated'));
            $this->trigger(self::EVENT_AFTER_ACCOUNT_UPDATE, $event);
            return $this->refresh();
        }

        return $this->render('account', [
            'model' => $model,
        ]);
    }
}
