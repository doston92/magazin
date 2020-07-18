<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%companies}}`
 */
class m200717_105812_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'fio' => $this->string(255)->comment("ФИО"),
            'login' => $this->string(255)->comment("Логин"),
            'avatar' => $this->string(255)->comment("Фото"),
            'password' => $this->string(255)->comment("Пароль"),
            'phone' => $this->string(255)->comment("Телефон"),
            'status' => $this->integer()->comment("Статус"),
            'email' => $this->string(255)->comment("Эмаил"),
            'balans' => $this->float()->comment("Баланс"),
            'date_cr' =>$this->datetime()->comment("Дата создания"),
            'company_id' => $this->integer(),
        ]);

        $this->insert('users',array(
          'id'=>1,
          'fio'=>'А.Ю Олимов',
          'status'=>1,
          'date_cr'=>date('Y-m-d H:i:s'),
          'login'=>'admin',
          'password' => Yii::$app->security->generatePasswordHash('admin'),
          'company_id' => 1,
        ));

        // creates index for column `company_id`
        $this->createIndex(
            '{{%idx-users-company_id}}',
            '{{%users}}',
            'company_id'
        );

        // add foreign key for table `{{%companies}}`
        $this->addForeignKey(
            '{{%fk-users-company_id}}',
            '{{%users}}',
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
            '{{%fk-users-company_id}}',
            '{{%users}}'
        );

        // drops index for column `company_id`
        $this->dropIndex(
            '{{%idx-users-company_id}}',
            '{{%users}}'
        );

        $this->dropTable('{{%users}}');
    }
}
