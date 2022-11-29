<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_trades}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%users}}`
 * - `{{%catalog}}`
 */
class m221129_143211_create_user_trades_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_trades}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'catalog_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-user_trades-user_id}}',
            '{{%user_trades}}',
            'user_id'
        );

        // add foreign key for table `{{%users}}`
        $this->addForeignKey(
            '{{%fk-user_trades-user_id}}',
            '{{%user_trades}}',
            'user_id',
            '{{%users}}',
            'id',
            'CASCADE'
        );

        // creates index for column `catalog_id`
        $this->createIndex(
            '{{%idx-user_trades-catalog_id}}',
            '{{%user_trades}}',
            'catalog_id'
        );

        // add foreign key for table `{{%catalog}}`
        $this->addForeignKey(
            '{{%fk-user_trades-catalog_id}}',
            '{{%user_trades}}',
            'catalog_id',
            '{{%catalog}}',
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
            '{{%fk-user_trades-user_id}}',
            '{{%user_trades}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-user_trades-user_id}}',
            '{{%user_trades}}'
        );

        // drops foreign key for table `{{%catalog}}`
        $this->dropForeignKey(
            '{{%fk-user_trades-catalog_id}}',
            '{{%user_trades}}'
        );

        // drops index for column `catalog_id`
        $this->dropIndex(
            '{{%idx-user_trades-catalog_id}}',
            '{{%user_trades}}'
        );

        $this->dropTable('{{%user_trades}}');
    }
}
