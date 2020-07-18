<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%currency}}`.
 */
class m200718_025532_create_currency_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%currency}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
        ]);

        $this->insert('currency',array(
          'id'   =>1,
          'name' =>'Сум',
        ));

        $this->insert('currency',array(
          'id'   =>2,
          'name' =>'Рубл',
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%currency}}');
    }
}
