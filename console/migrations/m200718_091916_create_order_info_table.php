<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_info}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%product}}`
 */
class m200718_091916_create_order_info_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_info}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->comment("Заказ"),
            'product_id' => $this->integer()->comment("Товар"),
            'quantity' => $this->integer()->comment("Количество"),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_info-order_id}}',
            '{{%order_info}}',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-order_info-order_id}}',
            '{{%order_info}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );

        // creates index for column `product_id`
        $this->createIndex(
            '{{%idx-order_info-product_id}}',
            '{{%order_info}}',
            'product_id'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-order_info-product_id}}',
            '{{%order_info}}',
            'product_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%orders}}`
        $this->dropForeignKey(
            '{{%fk-order_info-order_id}}',
            '{{%order_info}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_info-order_id}}',
            '{{%order_info}}'
        );

        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-order_info-product_id}}',
            '{{%order_info}}'
        );

        // drops index for column `product_id`
        $this->dropIndex(
            '{{%idx-order_info-product_id}}',
            '{{%order_info}}'
        );

        $this->dropTable('{{%order_info}}');
    }
}
