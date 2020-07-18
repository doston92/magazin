<?php

namespace backend\models;

use Yii;


/**
 * This is the model class for table "storage".
 *
 * @property int $id
 * @property string|null $name Називания
 * @property string|null $adress Адрес
 * @property int|null $company_id Компания
 *
 * @property Product[] $products
 * @property Companies $company
 */
class Storage extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'storage';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['adress'], 'string'],
            [['company_id'], 'default', 'value' => null],
            [['company_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['name' , 'adress'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Називания',
            'adress' => 'Адрес',
            'company_id' => 'Компания',
        ];
    }

    public function beforeSave($insert)
    {
        if ($this->isNewRecord)
        {   
            $user = Yii::$app->user->identity;
            $this->company_id = $user->company_id;
        }

        return parent::beforeSave($insert);
    }

    /**
     * Gets query for [[Products]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::className(), ['storage_id' => 'id']);
    }

    /**
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }
}
