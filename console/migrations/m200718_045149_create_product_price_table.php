<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product_price}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 * - `{{%currency}}`
 */
class m200718_045149_create_product_price_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product_price}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->comment("Товар"),
            'price' => $this->float()->comment("Цена"),
            'currency_id' => $this->integer()->comment("Валюта"),
        ]);

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-product_price-product_id}}',
            '{{%product_price}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-product_price-product_id}}',
            '{{%product_price}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `currency_id`
        $this->createIndex(
            '{{%idx-product_price-currency_id}}',
            '{{%product_price}}',
            'currency_id'
        );

        // add foreign key for table `{{%currency}}`
        $this->addForeignKey(
            '{{%fk-product_price-currency_id}}',
            '{{%product_price}}',
            'currency_id',
            '{{%currency}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-product_price-product_id}}',
            '{{%product_price}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-product_price-product_id}}',
            '{{%product_price}}'
        );

        // drops foreign key for table `{{%currency}}`
        $this->dropForeignKey(
            '{{%fk-product_price-currency_id}}',
            '{{%product_price}}'
        );

        // drops index for column `currency_id`
        $this->dropIndex(
            '{{%idx-product_price-currency_id}}',
            '{{%product_price}}'
        );

        $this->dropTable('{{%product_price}}');
    }
}
