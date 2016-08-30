<?php

namespace common\models\db;

use common\models\User;
use Yii;

/**
 * This is the model class for table "tasks".
 *
 * @property integer $id
 * @property string $title
 * @property string $link
 * @property string $koment_moder
 * @property string $vihod_text
 * @property integer $status
 * @property integer $user_id
 * @property integer $dt_add
 * @property integer $dt_update
 * @property integer $draft
 * @property integer $dt_change
 */
class Tasks extends \yii\db\ActiveRecord
{

    /**
     * Normalize AR after cloning.
     */
    public function __clone()
    {
        /*$this->primaryKey = null;*/
        /*$this->oldPrimaryKey = null;*/
        $this->id = null;
        //$this->user_id = null;
        $this->isNewRecord = true;
    }
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tasks';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['title', 'link', 'status'], 'required'],
            [['koment_moder', 'vihod_text'], 'string'],
            [['status', 'user_id', 'dt_add', 'dt_update', 'draft', 'dt_change'], 'integer'],
            [['title', 'link'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('tasks', 'ID'),
            'title' => Yii::t('tasks', 'Title'),
            'link' => Yii::t('tasks', 'Link'),
            'koment_moder' => Yii::t('tasks', 'Koment Moder'),
            'vihod_text' => Yii::t('tasks', 'Vihod Text'),
            'status' => Yii::t('tasks', 'Status'),
            'user_id' => Yii::t('tasks', 'User ID'),
            'dt_add' => Yii::t('tasks', 'Dt Add'),
            'dt_update' => Yii::t('tasks', 'Dt Update'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getstatus_tasks()
    {
        return $this->hasOne(StatusTasks::className(), ['id' => 'status']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getuser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
