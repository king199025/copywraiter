<?php

namespace frontend\modules\mainpage\controllers;

use common\classes\Debug;
use common\classes\UserFunction;
use common\models\db\Tasks;
use Yii;
use yii\web\Controller;

/**
 * Default controller for the `mainpage` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        if (!Yii::$app->user->isGuest) {
            $role = UserFunction::getRole_user();
            //Debug::prn($role);
            if ($role['admin']) {
                $views = 'admin';
                return $this->render($views);
            }
            if ($role['moderator']) {
                $views = 'moderator';
                return $this->render($views);
            }
            if ($role['copywriter']) {

                $tasksAply = Tasks::find()->where(['user_id' => Yii::$app->user->id, 'status' => 5])->count();
                $taskModer = Tasks::find()->where(['user_id' => Yii::$app->user->id, 'status' => 3])->count();
                $taskDelay = Tasks::find()->where(['user_id' => Yii::$app->user->id, 'status' => 4])->count();


                $views = 'copywriter';
                return $this->render($views,
                    [
                        'taskAply' => $tasksAply,
                        'taskModer' => $taskModer,
                        'taskDelay' => $taskDelay,
                    ]);
            }

        }else{
            $views = 'index';
            return $this->render($views);
        }


    }

    public function actionStat_copy(){
        $from = strtotime($_POST['from']);
        $to = strtotime($_POST['to']);

        $tasksAply = Tasks::find()
            ->where(['user_id' => Yii::$app->user->id, 'status' => 5])
            ->andWhere(['>=', 'dt_change', $from])
            ->andWhere(['<=', 'dt_change', $to])
        //Debug::prn($tasksAply->createCommand()->rawSql);
            ->count();
        $taskDelay = Tasks::find()
            ->where(['user_id' => Yii::$app->user->id, 'status' => 4])
            ->andWhere(['>=', 'dt_change', $from])
            ->andWhere(['<=', 'dt_change', $to])
            ->count();
        return $this->renderAjax('stat_copy',
            [
                'taskAply' => $tasksAply,
                'taskDelay' => $taskDelay,
            ]);

    }
}
