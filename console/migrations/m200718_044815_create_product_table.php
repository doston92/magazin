<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%storage}}`
 * - `{{%categories}}`
 * - `{{%sub_categories}}`
 */
class m200718_044815_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наимование"),
            'storage_id' => $this->integer()->comment("Склад"),
            'category_id' => $this->integer()->comment("Категория"),
            'sub_category_id' => $this->integer()->comment("Суб категория"),
            'code' => $this->string(255)->comment("Код"),
        ]);

        // creates index for column `storage_id`
        $this->createIndex(
            '{{%idx-product-storage_id}}',
            '{{%product}}',
            'storage_id'
        );

        // add foreign key for table `{{%storage}}`
        $this->addForeignKey(
            '{{%fk-product-storage_id}}',
            '{{%product}}',
            'storage_id',
            '{{%storage}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}',
            'category_id'
        );

        // add foreign key for table `{{%categories}}`
        $this->addForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );

        // creates index for column `sub_category_id`
        $this->createIndex(
            '{{%idx-product-sub_category_id}}',
            '{{%product}}',
            'sub_category_id'
        );

        // add foreign key for table `{{%sub_categories}}`
        $this->addForeignKey(
            '{{%fk-product-sub_category_id}}',
            '{{%product}}',
            'sub_category_id',
            '{{%sub_categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%storage}}`
        $this->dropForeignKey(
            '{{%fk-product-storage_id}}',
            '{{%product}}'
        );

        // drops index for column `storage_id`
        $this->dropIndex(
            '{{%idx-product-storage_id}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%sub_categories}}`
        $this->dropForeignKey(
            '{{%fk-product-sub_category_id}}',
            '{{%product}}'
        );

        // drops index for column `sub_category_id`
        $this->dropIndex(
            '{{%idx-product-sub_category_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product}}');
    }
}
