<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%storage}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%companies}}`
 */
class m200718_044128_create_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%storage}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Називания"),
            'adress' => $this->text()->comment("Адрес"),
            'company_id' => $this->integer()->comment("Компания"),
        ]);

        $this->insert('storage',array(
          'id'   =>1,
          'name' =>'Центиралный склад',
          'adress' =>'',
          'company_id' =>1,
        ));

        // creates index for column `company_id`
        $this->createIndex(
            '{{%idx-storage-company_id}}',
            '{{%storage}}',
            'company_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-storage-company_id}}',
            '{{%storage}}',
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
        // drops foreign key for table `{{%companies}}`
        $this->dropForeignKey(
            '{{%fk-storage-company_id}}',
            '{{%storage}}'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            '{{%idx-storage-company_id}}',
            '{{%storage}}'
        );

        $this->dropTable('{{%storage}}');
    }
}
