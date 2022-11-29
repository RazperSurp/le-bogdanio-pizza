<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%users}}`.
 */
class m221129_142950_create_users_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(32)->notNull()->unique(),
            'password' => $this->text()->notNull(),
            'lastname' => $this->string(124)->notNull(),
            'firstname' => $this->string(124)->notNull(),
            'phone' => $this->string(20)->notNull()->unique(),
            'email' => $this->string(124)->notNull()->unique(),
            'address' => $this->string(124)->notNull(),
            'points' => $this->integer()->defaultValue(0),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%users}}');
    }
}
