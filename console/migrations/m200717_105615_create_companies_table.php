<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%companies}}`.
 */
class m200717_105615_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('companies', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Название филиал"),
            'type' => $this->integer()->comment("Тип филиал"),
        ]);
        
        $this->insert('companies',array(
            'id' => '1',
            'name' => 'Центральный офис',
            'type'=>1,
        ));

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('companies');
    }
}
