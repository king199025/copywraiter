<?php

namespace frontend\modules\task_moderator\controllers;

use common\classes\Debug;
use common\models\db\Tasks;
use common\models\User;
use frontend\models\user\Profile;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `task_moderator` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $tasks = Tasks::find()
        ->leftJoin('status_tasks', '`status_tasks`.`id` = `tasks`.`status`')
        ->leftJoin('user', '`user`.`id` = `tasks`.`user_id`')
        ->with('status_tasks','user')
        //Debug::prn( $tasks->createCommand()->rawSql);
        ->all();
        return $this->render('index', ['tasks' => $tasks]);
    }

    public function actionCheck_tasks(){
        $model = Tasks::find()->where(['id' => $_GET['id']])->one();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(isset($_POST['approve'])){
                $model->status = 5;
                $model->dt_change = time();
            }
            if(isset($_POST['rework'])){
                $model->status = 6;
            }
            if(isset($_POST['disapprove'])){
                $model->status = 4;
                $model->dt_change = time();

                $user = Profile::find()->where(['user_id' => $model->user_id])->one();
                $user->penalti = $user->penalti + $_POST['penalti'];
                $user->save();

                $post2 = clone $model;
                $post2->save();

                $taskCopy = Tasks::find()->where(['id' => $post2->id])->one();
                $taskCopy->user_id = null;
                $taskCopy->status = 1;
                $taskCopy->dt_add = time();
                $taskCopy->dt_update = time();
                $taskCopy->koment_moder = '';
                $taskCopy->vihod_text = '';
                $taskCopy->dt_change = null;
                $taskCopy->save();

                /*$model2 = Tasks::find()->where(['id' => $model->id])->one();
                $model2->isNewRecord=true;
                $model2->id = null;
                $model2->status = 1;
                $model2->user_id = NULL;
                $model2->save();*/
                //Debug::prn($model2);
            }
            $model->save();
            //Debug::prn($_POST);
            return $this->redirect(['index']);
        } else {

            return $this->render('check-task', [
                'model' => $model,
            ]);
        }

    }
}
