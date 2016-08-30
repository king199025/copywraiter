<?php

namespace frontend\modules\users\controllers;

use common\classes\Debug;
use dektrium\user\models\User;
use yii\web\Controller;

/**
 * Default controller for the `users` module
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
        return $this->render('index',
            [
                'user' => $user
            ]);
    }

    public function actionBlock(){
        $user = User::find()->where(['id' => $_GET['id']])->one();

        if(empty($user->blocked_at)){
            $user->blocked_at = time();
        }
        else{
            $user->blocked_at = null;
        }

        $user->save();
        return $this->redirect('index');
    }

    /*public function actionEdit(){
        $model = User::find()
    }*/
}
