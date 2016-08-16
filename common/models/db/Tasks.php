<?php

namespace common\models\db;

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
 */
class Tasks extends \yii\db\ActiveRecord
{
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
            [['status'], 'integer'],
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
        ];
    }
}
