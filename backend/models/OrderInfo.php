<?php

namespace backend\models;

use Yii;
use backend\models\ProductPrice;
use backend\models\Product;
use yii\helpers\ArrayHelper;
/**
 * This is the model class for table "order_info".
 *
 * @property int $id
 * @property int|null $order_id Заказ
 * @property int|null $product_id Товар
 * @property int|null $quantity Количество
 *
 * @property Orders $order
 * @property Product $product
 */
class OrderInfo extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order_info';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'quantity'], 'integer'],
            [['order_id'], 'exist', 'skipOnError' => true, 'targetClass' => Orders::className(), 'targetAttribute' => ['order_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Заказ',
            'product_id' => 'Товар',
            'quantity' => 'Количество',
        ];
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

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function summaProduct()
    {
        $price = ProductPrice::findOne($this->product_id);
        return $price->price*$this->quantity;
    }

    public function getProductList()
    {   
        $id = Orders::getStorageOwn();
        $product = Product::find()->where(['storage_id' => $id ])->all();
        return ArrayHelper::map($product, 'id', 'name'); 
    }
}
