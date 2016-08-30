<?php
/**
 * Created by PhpStorm.
 * User: 7
 * Date: 18.08.2016
 * Time: 14:50
 */

namespace frontend\models\user;


class Profile extends \dektrium\user\models\Profile
{
    public function scenarios()
    {
        $scenarios = parent::scenarios();
        // add field to scenarios
        $scenarios['create'][]   = 'limit';
        $scenarios['update'][]   = 'limit';
        $scenarios['register'][] = 'limit';
        $scenarios['create'][]   = 'penalti';
        $scenarios['update'][]   = 'penalti';
        $scenarios['register'][] = 'penalti';
        return $scenarios;
    }

    public function rules()
    {
        $rules = parent::rules();

        $rules['field']   = ['limit', 'integer'];
        $rules['field']   = ['penalti', 'integer'];

        return $rules;
    }
}