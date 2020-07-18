<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%sub_categories}}`.
 */
class m191205_071858_create_sub_categories_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%sub_categories}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
            'category_id' => $this->integer(),
        ]);

        $this->insert('sub_categories',array(
          'id'   =>1,
          'name' =>'Osh',
          'category_id' =>1,

        ));

        $this->insert('sub_categories',array(
          'id'   =>2,
          'name' =>'Shurva',
          'category_id' =>1,

        ));

        $this->insert('sub_categories',array(
          'id'   =>3,
          'name' =>'Kartoshka',
          'category_id' =>2,

        ));

        $this->insert('sub_categories',array(
          'id'   =>4,
          'name' =>'Piyoz',
          'category_id' =>2,

        ));
          // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-sub_categories-category_id}}',
            '{{%sub_categories}}',
            'category_id'
        );

        // add foreign key for table `{{%categories}}`
        $this->addForeignKey(
            '{{%fk-sub_categories-category_id}}',
            '{{%sub_categories}}',
            'category_id',
            '{{%categories}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%categories}}`
        $this->dropForeignKey(
            '{{%fk-sub_categories-category_id}}',
            '{{%sub_categories}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-sub_categories-category_id}}',
            '{{%sub_categories}}'
        );

        $this->dropTable('{{%sub_categories}}');
    }
}
