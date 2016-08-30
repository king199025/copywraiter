<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 14.07.2016
 * Time: 12:47
 */

namespace frontend\controllers\user;


use common\classes\Debug;
use common\models\db\Profile;
use dektrium\user\controllers\SettingsController;

use Yii;


class SettingController extends SettingsController
{
    /**
     * Shows profile settings form.
     *
     * @return string|\yii\web\Response
     */
    public function actionProfile()
    {

        $model = $this->finder->findProfileById(Yii::$app->user->identity->getId());

        if ($model == null) {
            $model = Yii::createObject(Profile::className());
            $model->link('user', Yii::$app->user->identity);
        }

        $event = $this->getProfileEvent($model);

        $this->performAjaxValidation($model);

        $this->trigger(self::EVENT_BEFORE_PROFILE_UPDATE, $event);

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            /*if(!empty($_POST['limit'])){
                $model->limit = $_POST['limit'];
            }*/
            //Debug::prn($_POST);
            $model->save();

            $this->trigger(self::EVENT_AFTER_PROFILE_UPDATE, $event);
            return $this->refresh();
        }
       // Debug::prn($model->)
        return $this->render('profile', [
            'model' => $model,
        ]);
    }
}