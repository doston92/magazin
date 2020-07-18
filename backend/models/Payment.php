<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "payment".
 *
 * @property int $id
 * @property int|null $order_id Заказчик
 * @property float|null $summa Сумма
 * @property string|null $payed_at Дата оплата
 * @property int|null $company_id Компания
 *
 * @property Companies $company
 * @property Orders $order
 */
class Payment extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'payment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'company_id'], 'integer'],
            [['summa'], 'number'],
            [['payed_at'], 'safe'],
            [['company_id'], 'exist', 'skipOnError' => true, 'targetClass' => Companies::className(), 'targetAttribute' => ['company_id' => 'id']],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Заказчик',
            'summa' => 'Сумма',
            'payed_at' => 'Дата оплата',
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
     * Gets query for [[Company]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCompany()
    {
        return $this->hasOne(Companies::className(), ['id' => 'company_id']);
    }

    /**
     * Gets query for [[Order]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrder()
    {
        return $this->hasOne(Orders::className(), ['id' => 'order_id']);
    }
}
