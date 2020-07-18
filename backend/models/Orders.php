<?php

namespace backend\models;

use Yii;
use yii\helpers\ArrayHelper;
use backend\models\Storage;
use backend\models\ProductPrice;
use backend\models\Product;
use backend\models\Categories;
use backend\models\SubCategories;
use backend\models\OrderInfo;
use backend\models\Payment;

/**
 * This is the model class for table "orders".
 *
 * @property int $id
 * @property int|null $user_id Клиен
 * @property int|null $storage_id Склад
 * @property string|null $ordered_at Дата заказа
 * @property int|null $status Статус
 * @property float|null $price Цена
 *
 * @property OrderInfo[] $orderInfos
 * @property Storage $storage
 * @property Users $user
 */
class Orders extends \yii\db\ActiveRecord
{   

    /**
     * {@inheritdoc}
     */
    public $product_id;
    public $count;
    const STATUS_PAID_WAITING = 1;
    const STATUS_PAID = 2;
    public static function tableName()
    {
        return 'orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'storage_id', 'status', 'product_id', 'count'], 'integer'],
            [['ordered_at'], 'safe'],
            [['price'], 'number'],
            [['storage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Storage::className(), 'targetAttribute' => ['storage_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'Клиен',
            'storage_id' => 'Склад',
            'ordered_at' => 'Дата заказа',
            'status' => 'Статус',
            'price' => 'Цена',
            'product_id' => 'Тоар',
            'count' => 'Количество',

        ];
    }

    public function setOrderSave()
    {   

        $user = Yii::$app->user->identity;
        $product = Product::find()
                ->with(['productPrices'])
                ->join('left join' ,'product_price','product_price.product_id = '.$this->product_id)
                ->one();
        $this->user_id = $user->id;
        $this->storage_id = $product->storage_id;
        $this->price = $product->productPrices[0]->price * $this->count;
        $this->ordered_at = date('Y-m-d H:i');
        $this->status = 1;
        $this->save();

        $orderInfo = new OrderInfo();
        $orderInfo->order_id = $this->id;
        $orderInfo->product_id = $this->product_id;
        $orderInfo->quantity = $this->count;
        $orderInfo->save();
    }

    public function getProductList()
    {   
        $id = self::getStorageOwn();
        $product = Product::find()->where(['storage_id' => $id ])->all();
        return ArrayHelper::map($product, 'id', 'name'); 
    }

    public static function getStorageOwn()
    {
        $user = Yii::$app->user->identity;
        $storage = Storage::find()->where(['company_id' => $user->company_id])->one();
        return $storage->id;
    }

    public static function checkOreder()
    {
        $user = Yii::$app->user->identity;
        $storage = Storage::find()->where(['company_id' => $user->company_id])->one();
        $orders = Orders::find()->where(['storage_id' => $storage->id , 'user_id' => $user->id , 'status' =>1])->one();
        if($orders == null) return true; else return false;
    }
    /**
     * Gets query for [[OrderInfos]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderInfos()
    {
        return $this->hasMany(OrderInfo::className(), ['order_id' => 'id']);
    }

    /**
     * Gets query for [[Storage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStorage()
    {
        return $this->hasOne(Storage::className(), ['id' => 'storage_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::className(), ['id' => 'user_id']);
    }

    public function setPayment()
    {
        $payment = Payment::find()->where(['order_id' => $this->id])->one();
        if($this->status == 2 && $payment == null){
            $payment = new Payment();
            $payment->order_id = $this->id;
            $payment->summa = $this->price;
            $payment->payed_at = date('Y-m-d H:i');
            $payment->save();
        }
        if($this->status == 2 && $payment != null)
        {
            $payment->order_id = $this->id;
            $payment->summa = $this->price;
            $payment->payed_at = date('Y-m-d H:i');
            $payment->save();
        }
        if($this->status == 1 && $payment != null) $payment->delete();
    }
}
