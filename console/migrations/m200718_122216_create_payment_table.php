<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%payment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%orders}}`
 * - `{{%companies}}`
 */
class m200718_122216_create_payment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%payment}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->comment("Заказчик"),
            'summa' => $this->float()->comment("Сумма"),
            'payed_at' => $this->datetime()->comment("Дата оплата"),
            'company_id' => $this->integer()->comment("Компания"),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-payment-order_id}}',
            '{{%payment}}',
            'order_id'
        );

        // add foreign key for table `{{%orders}}`
        $this->addForeignKey(
            '{{%fk-payment-order_id}}',
            '{{%payment}}',
            'order_id',
            '{{%orders}}',
            'id',
            'CASCADE'
        );

        // creates index for column `company_id`
        $this->createIndex(
            '{{%idx-payment-company_id}}',
            '{{%payment}}',
            'company_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-payment-company_id}}',
            '{{%payment}}',
            'company_id',
            '{{%companies}}',
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
            '{{%fk-payment-order_id}}',
            '{{%payment}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-payment-order_id}}',
            '{{%payment}}'
        );

        // drops foreign key for table `{{%companies}}`
        $this->dropForeignKey(
            '{{%fk-payment-company_id}}',
            '{{%payment}}'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            '{{%idx-payment-company_id}}',
            '{{%payment}}'
        );

        $this->dropTable('{{%payment}}');
    }
}
