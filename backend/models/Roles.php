<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "roles".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $color
 *
 * @property UsersRoles[] $usersRoles
 */
class Roles extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'roles';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'color'], 'string', 'max' => 255],
            [['name' , 'color'] , 'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наимование',
            'color' => 'Цвет',
        ];
    }

    /**
     * Gets query for [[UsersRoles]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsersRoles()
    {
        return $this->hasMany(UsersRoles::className(), ['role_id' => 'id']);
    }

    public static function getRolesList()
    {   
        $roles = Roles::find()->where(['not in' , 'id' , 1])->all();
        return ArrayHelper::map($roles, 'id', 'name');
    }
}
