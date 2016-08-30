<?php
/**
 * Created by PhpStorm.
 * User: Офис
 * Date: 15.08.2016
 * Time: 14:08
 */

namespace frontend\modules\tasks\models;


use yii\db\ActiveRecord;

class Tasks extends \common\models\db\Tasks
{
    public function behaviors()
    {
        return [
            'timestamp' => [
                'class' => 'yii\behaviors\TimestampBehavior',
                'attributes' => [
                    ActiveRecord::EVENT_BEFORE_INSERT => ['dt_add', 'dt_update'],
                    ActiveRecord::EVENT_BEFORE_UPDATE => ['dt_update'],
                ],
            ],

        ];
    }
}