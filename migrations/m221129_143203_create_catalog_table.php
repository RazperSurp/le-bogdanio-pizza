<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catalog}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%size}}`
 */
class m221129_143203_create_catalog_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catalog}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(124)->notNull()->unique(),
            'discount' => $this->integer()->defaultValue(0),
            'size_id' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);

        // creates index for column `size_id`
        $this->createIndex(
            '{{%idx-catalog-size_id}}',
            '{{%catalog}}',
            'size_id'
        );

        // add foreign key for table `{{%size}}`
        $this->addForeignKey(
            '{{%fk-catalog-size_id}}',
            '{{%catalog}}',
            'size_id',
            '{{%size}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%size}}`
        $this->dropForeignKey(
            '{{%fk-catalog-size_id}}',
            '{{%catalog}}'
        );

        // drops index for column `size_id`
        $this->dropIndex(
            '{{%idx-catalog-size_id}}',
            '{{%catalog}}'
        );

        $this->dropTable('{{%catalog}}');
    }
}
