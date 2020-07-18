<?php

namespace backend\models;

use Yii;
use backend\models\Users;
use backend\models\Storage;


/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string|null $name Название филиал
 * @property int|null $type Тип филиал
 *
 * @property Users[] $users
 */
class Companies extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type'], 'default', 'value' => null],
            [['type'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название компания',
            'type' => 'Тип компания',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::className(), ['company_id' => 'id']);
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            $this->type = 2;
        }

        return parent::beforeSave($insert);
    }

    public static function getType()
    {
        return [
            1 => 'Центральный офис',
            2 => 'Региональный',
        ];
    }

    public function getTypeDescription()
    {
        switch ($this->type) {
            case 1: return "Центральный офис";
            case 2: return "Региональный";
            default: return "Неизвестно";
        }
    }

     public function afterSave($insert, $changedAttributes)
    {
        if ($insert) {
            $command = Yii::$app->db->createCommand();
            $user = new Users();
            $user->fio = '{ФИО}';
            $user->login = 'admin'.$this->id;
            $user->password = 'admin'.$this->id;
            $user->status = 1;
            $user->role_id = 2;
            $user->company_id = $this->id;
            $user->save();
            $command->update('users',['company_id'=>$this->id],['id'=>$user->id])->execute();

            $storage = new Storage();
            $storage->name = '{Название склад}';
            $storage->company_id = $this->id;
            $storage->adress = '{Адресс}';
            $storage->save();
            $command->update('storage',['company_id'=>$this->id],['id'=>$storage->id])->execute();
        } 
        else 
        {
            //Yii::$app->session->setFlash('success', 'Запись обновлена');
        }
        parent::afterSave($insert, $changedAttributes);
    }
}
