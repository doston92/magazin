<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%roles}}`.
 */
class m200717_105509_create_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%roles}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255)->comment("Наименование"),
            'color' => $this->string(255)->comment("Цветь"),
        ]);

        $this->insert('roles',array(
          'id'   =>1,
          'name' =>'Главный администратор',
          'color'=> '#33cc33',
        ));

        $this->insert('roles',array(
          'id'   =>2,
          'name' =>'Администратор',
          'color'=> '#e6e600',
        ));

        $this->insert('roles',array(
          'id'   =>3,
          'name' =>'Модератор',
          'color'=> '#8080ff',
        ));

        $this->insert('roles',array(
          'id'   =>4,
          'name' =>'Пользователь',
          'color'=> '#ff8080',
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%roles}}');
    }
}
