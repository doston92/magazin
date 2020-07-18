<?php

namespace backend\models;


use Yii;
use yii\helpers\ArrayHelper;
use backend\models\UsersRoles;
use backend\models\Roles;
/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $fio
 * @property string $login
 * @property string $password
 * @property int $type
 */
class Users extends \yii\db\ActiveRecord
{
    const USER_STATUS_ACTIVE    = 1;
    const USER_STATUS_IN_ACTIVE = 2;
    const USER_STATUS_BLOCKED   = 3; 
    const USER_STATUS_DELETED   = 4;
    const GENERAL_ADMIN = 1;


    public $new_password;
    public $image;
    public $role_id;
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status','company_id','role_id'] ,'integer'],
            [['fio', 'login', 'password','phone','email', 'balans', 'date_cr','avatar'], 'string', 'max' => 255],
            [['fio', 'login', 'password', 'status','role_id'], 'required'],
            [['login'],  'unique'],
            [['email'],  'email'],
            [['date_cr','image' ,'new_password'], 'safe'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'fio' => 'ФИО',
            'login' => 'Логин',
            'password' => 'Пароль',
            'new_password' => 'Новый пароль',
            'status' => 'Статус',
            'phone' => 'Телефон',
            'email' => 'Email',
            'balans' => 'Баланс',
            'date_cr' => 'Дата создания',
            'avatar' => 'Фото',
            'image' => 'Фото',
            'company_id' => 'Компания',
            'role_id' => 'Должность'
        ];
    }

    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {   
            $user = Yii::$app->user->identity;
            $this->password = Yii::$app->security->generatePasswordHash($this->password);
            $this->date_cr = date('Y-m-d H:i');
            $this->company_id = $user->company_id;
        }

        if($this->new_password != null) $this->password = Yii::$app->security->generatePasswordHash($this->new_password);
        return parent::beforeSave($insert);
    }

     public function afterSave($insert, $changedAttributes)
    {
        if($insert){
            $roles = new UsersRoles();
            $roles->user_id = $this->id;
            $roles->role_id = $this->role_id;
            $roles->save();
        } 
        parent::afterSave($insert, $changedAttributes);
    }

    /**
     * @return bool
     */

    public function beforeDelete()
    {
        return parent::beforeDelete();
    }

    public static function getStatus()
    {
        return ArrayHelper::map([
            ['id' => self::USER_STATUS_ACTIVE, 'name' => 'Активный'],
            ['id' => self::USER_STATUS_IN_ACTIVE, 'name' => 'Не активен'],
            ['id' => self::USER_STATUS_BLOCKED, 'name' => 'Блокированный'],
            ['id' => self::USER_STATUS_DELETED, 'name' => 'Удален'],
        ], 'id', 'name');
    }

    public function getStatusDescription()
    {
        switch ($this->status) {
            case 1: return "Активный";
            case 2: return "Не активен";
            case 3: return "Блокированный";
            case 4: return "Удален";
            default: return "Неизвестно";
        }
    }

    public function getRole()
    {
        return (new \yii\db\Query())
            ->select(['*'])
            ->from('users_roles')
            ->where(['user_id' => $this->id])
            ->one()['role_id'];
    }

    public function getRoleName()
    {   
        return (new \yii\db\Query())
            ->select(['*'])
            ->from('users_roles')
            ->join('inner join' ,'roles','roles.id = users_roles.role_id')
            ->where(['user_id' => $this->id])->one();
    }


    public function uploadAvatar()
    {   
        $fileName = "";
        $fileName = $this->id . '-' . Yii::$app->security->generateRandomString() . '.' . $this->image->extension;
        if(!empty($this->image))
        {   
            if(file_exists('uploads/avatars/'.$this->avatar) && $this->avatar != null)
            {
                unlink('uploads/avatars/'.$this->avatar);
            }

            $this->image->saveAs('uploads/avatars/'.$fileName);
            Yii::$app->db->createCommand()->update('users', ['avatar' => $fileName], [ 'id' => $this->id ])->execute();
        }
    }

    public  function getAvatar()
    {
        if (!file_exists('uploads/avatars/'.$this->avatar) || $this->avatar == '') {
            $path = 'http://' . $_SERVER['SERVER_NAME'].'/admin/img/nouser.png';
        } else {
            $path = 'http://' . $_SERVER['SERVER_NAME'].'/admin/uploads/avatars/'.$this->avatar;
        }
        return $path;
    }
    
}
