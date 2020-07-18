<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users_roles}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%roles}}`
 */
class m200717_110354_create_users_roles_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users_roles}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'role_id' => $this->integer(),
        ]);

        $this->insert('users_roles',array(
          'id'      =>1,
          'user_id' =>1,
          'role_id' => 1,
        ));

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-users_roles-user_id}}',
            '{{%users_roles}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-users_roles-user_id}}',
            '{{%users_roles}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `role_id`
        $this->createIndex(
            '{{%idx-users_roles-role_id}}',
            '{{%users_roles}}',
            'role_id'
        );

        // add foreign key for table `{{%roles}}`
        $this->addForeignKey(
            '{{%fk-users_roles-role_id}}',
            '{{%users_roles}}',
            'role_id',
            '{{%roles}}',
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
            '{{%fk-users_roles-user_id}}',
            '{{%users_roles}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-users_roles-user_id}}',
            '{{%users_roles}}'
        );

        // drops foreign key for table `{{%roles}}`
        $this->dropForeignKey(
            '{{%fk-users_roles-role_id}}',
            '{{%users_roles}}'
        );

        // drops index for column `role_id`
        $this->dropIndex(
            '{{%idx-users_roles-role_id}}',
            '{{%users_roles}}'
        );

        $this->dropTable('{{%users_roles}}');
    }
}
