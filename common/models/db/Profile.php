<?php

namespace common\models\db;

use Yii;

/**
 * This is the model class for table "profile".
 *
 * @property integer $user_id
 * @property string $name
 * @property string $public_email
 * @property string $gravatar_email
 * @property string $gravatar_id
 * @property string $location
 * @property string $website
 * @property string $bio
 * @property string $timezone
 * @property integer $limit
 * @property integer $penalti
 *
 * @property User $user
 */
class Profile extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'profile';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id'], 'required'],
            [['user_id', 'limit', 'penalti'], 'integer'],
            [['bio'], 'string'],
            [['name', 'public_email', 'gravatar_email', 'location', 'website'], 'string', 'max' => 255],
            [['gravatar_id'], 'string', 'max' => 32],
            [['timezone'], 'string', 'max' => 40],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'user_id' => Yii::t('tasks', 'User ID'),
            'name' => Yii::t('tasks', 'Name'),
            'public_email' => Yii::t('tasks', 'Public Email'),
            'gravatar_email' => Yii::t('tasks', 'Gravatar Email'),
            'gravatar_id' => Yii::t('tasks', 'Gravatar ID'),
            'location' => Yii::t('tasks', 'Location'),
            'website' => Yii::t('tasks', 'Website'),
            'bio' => Yii::t('tasks', 'Bio'),
            'timezone' => Yii::t('tasks', 'Timezone'),
            'limit' => Yii::t('tasks', 'Limit'),
            'penalti' => Yii::t('tasks', 'Penalti'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
