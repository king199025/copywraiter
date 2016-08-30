<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 19.08.2016
 * Time: 13:10
 */

namespace common\classes;




use common\models\db\Tasks;
use dektrium\user\models\Profile;

class TascsUser
{
    public static function GetLimitUserTasks(){
        $limit = Profile::find()->where(['user_id' => \Yii::$app->user->id])->one()->limit;
        $tasks = Tasks::find()
            ->where(['user_id' => \Yii::$app->user->id])
            ->andWhere(['!=', 'status', 4])
            ->count();
        if($tasks < $limit){
            return true;
        }
        else{
            return false;
        }



    }

}