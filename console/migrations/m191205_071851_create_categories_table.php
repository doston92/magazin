<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%categories}}`.
 */
class m191205_071851_create_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
        ]);

        $this->insert('categories',array(
          'id'   =>1,
          'name' =>'Oziq-Ovqat',
        ));

        $this->insert('categories',array(
          'id'   =>2,
          'name' =>'Sabzavotlar',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%categories}}');
    }
}
