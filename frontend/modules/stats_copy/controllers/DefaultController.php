<?php

namespace frontend\modules\stats_copy\controllers;


use dektrium\user\models\User;

use yii\web\Controller;

/**
 * Default controller for the `stats_copy` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $user = User::find()
            ->leftJoin('auth_assignment','`auth_assignment`.`user_id` = `user`.`id`')
            ->leftJoin('profile', '`profile`.`user_id` = `user`.`id`')
            ->where(['`auth_assignment`.`item_name`' => 'copywriter'])
            ->all();

        return $this->render('index', [
            'user' => $user,
        ]);

    }
}
