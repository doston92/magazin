<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%orders}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%storage}}`
 */
class m200718_091251_create_orders_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%orders}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->comment("Клиен"),
            'storage_id' => $this->integer()->comment("Склад"),
            'ordered_at' => $this->datetime()->comment("Дата заказа"),
            'status' => $this->integer()->comment("Статус"),
            'price' => $this->float()->comment("Цена"),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-orders-user_id}}',
            '{{%orders}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-orders-user_id}}',
            '{{%orders}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `storage_id`
        $this->createIndex(
            '{{%idx-orders-storage_id}}',
            '{{%orders}}',
            'storage_id'
        );

        // add foreign key for table `{{%storage}}`
        $this->addForeignKey(
            '{{%fk-orders-storage_id}}',
            '{{%orders}}',
            'storage_id',
            '{{%storage}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%users}}`
        $this->dropForeignKey(
            '{{%fk-orders-user_id}}',
            '{{%orders}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-orders-user_id}}',
            '{{%orders}}'
        );

        // drops foreign key for table `{{%storage}}`
        $this->dropForeignKey(
            '{{%fk-orders-storage_id}}',
            '{{%orders}}'
        );

        // drops index for column `storage_id`
        $this->dropIndex(
            '{{%idx-orders-storage_id}}',
            '{{%orders}}'
        );

        $this->dropTable('{{%orders}}');
    }
}
