<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%size}}`.
 */
class m221129_143109_create_size_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%size}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(24)->notNull()->unique(),
            'd' => $this->integer()->notNull()->unique(),
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
        $this->dropTable('{{%size}}');
    }
}
