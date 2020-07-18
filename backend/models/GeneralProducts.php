<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\helpers\ArrayHelper;
use backend\models\Storage;
use backend\models\ProductPrice;
use backend\models\Product;
use backend\models\Categories;
use backend\models\SubCategories;
use backend\models\Currency;



class GeneralProducts extends Model
{
    public $name;
    public $storage_id;
    public $category_id;
    public $sub_category_id;
    public $code;
    public $product_id;
    public $price;
    public $currency_id;


    public function rules()
    {
        return [
            [[  'storage_id',  'category_id',  'sub_category_id',  'product_id',  'currency_id' ], 'integer'],
            [[ 'storage_id' ,'category_id', 'sub_category_id', 'currency_id','price','name',], 'required'],
            [['price'], 'number'],
            [['name', 'code'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Називания',
            'storage_id' => 'Склад',
            'category_id' => 'Категория',
            'sub_category_id' => 'Суб категория',
            'code' => 'Код',
            'product_id' => 'Товар',
            'price' => 'Цена',
            'currency_id' => 'Валюта',

        ];
    }

    public function setSaveModel($id = null)
    {   
        $product = Product::find()->where(['id' => $id])->one();
        if($product == null)  $product = new Product();
            $product->name = $this->name;
            $product->storage_id = $this->storage_id;
            $product->category_id = $this->category_id;
            $product->sub_category_id = $this->sub_category_id;
            $product->code = $this->code;
            $product->save();

        $productPrice = ProductPrice::find()->where(['product_id' => $product->id])->one();
        if($productPrice == null)$productPrice = new ProductPrice();
            $productPrice->price = $this->price;
            $productPrice->product_id = $product->id;
            $productPrice->currency_id = $this->currency_id;
            $productPrice->save();
        return true;
    }

    public function getProduct($id)
    {       

        $product = Product::find()->where(['id' => $id])->one();
            
        if($product != null) {
            $this->name = $product->name;
            $this->storage_id = $product->storage_id;
            $this->category_id = $product->category_id;
            $this->sub_category_id = $product->sub_category_id;
            $this->code = $product->code;

            $productPrice = ProductPrice::find()->where(['product_id' => $product->id])->one();
            $this->price = $productPrice->price;
            $this->product_id = $productPrice->product_id;
            $this->currency_id = $productPrice->currency_id;
        }
    }

    public function getCategoryList()
    {
        $category = Categories::find()->all();
        return ArrayHelper::map($category, 'id', 'name'); 
    }

    public function getSubategoryid($id)
    {
        return ArrayHelper::map(SubCategories::find()->where(['category_id' => $id])->all(), 'id', 'name');
    }

    public function getStorageList()
    {
        $user = Yii::$app->user->identity;
        $storage = Storage::find()->where(['company_id' => $user->company_id])->all();
        return ArrayHelper::map($storage, 'id', 'name'); 
    }

    public function getStorage()
    {
        $user = Yii::$app->user->identity;
        return Storage::find()->where(['company_id' => $user->company_id])->one()->id;
    }

    public function getCurrencyList()
    {
        $currency = Currency::find()->all();
        return ArrayHelper::map($currency, 'id', 'name'); 
    }

}
