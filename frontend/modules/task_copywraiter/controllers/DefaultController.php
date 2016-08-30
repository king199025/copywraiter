<?php

namespace frontend\modules\task_copywraiter\controllers;

use common\classes\Debug;
use common\models\db\Tasks;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `task_copywraiter` module
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
            ->where(['`tasks`.`user_id`' => \Yii::$app->user->id])
            ->with('status_tasks')
       //Debug::prn( $tasks->createCommand()->rawSql);
            ->all();

        return $this->render('index', ['tasks' => $tasks]);
    }

    public function actionRun_tasks(){
        $model = Tasks::find()->where(['id' => $_GET['id']])->one();
        $model->status = 2;
        $model->user_id = Yii::$app->user->id;
        $model->save();

        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            if(isset($_POST['draft'])){
                $model->draft = 1;
            }
            else{
                $model->status = 3;
            }

            $model->save();
            return $this->redirect(['index']);
        } else {

            return $this->render('run-task', [
                'model' => $model,
            ]);
        }
    }

    public function actionFree_tasks(){
        $tasks = Tasks::find()->where(['status' => 1, 'user_id' => null])->all();
        return $this->render('free-tasks',
            [
                'tasks' => $tasks,
            ]);
    }
}
