<?php

namespace backend\models;

use Yii;
use backend\models\SubCategories;
use yii\data\ActiveDataProvider;

/**
 * This is the model class for table "categories".
 *
 * @property int $id
 * @property string|null $name Наименование
 *
 * @property Groups[] $groups
 */
class Categories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 255],
            [['name'],'required'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование',
        ];
    }

    public function getSubCategoryList()
    {
        $query = SubCategories::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => false,
        ]);

        $query->andFilterWhere(['category_id' => $this->id]);
        return $dataProvider;
    }
}
