<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%food}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%food_type}}`
 * - `{{%storage}}`
 * - `{{%supplier}}`
 */
class m221129_143243_create_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%food}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->notNull(),
            'storage_id' => $this->integer()->notNull(),
            'supplier_id' => $this->integer()->notNull(),
            'name' => $this->string(64)->notNull(),
            'price' => $this->float()->notNull(),
            'count' => $this->integer()->notNull(),
            'weight' => $this->integer()->notNull()->comment('В граммах'),
            'expires' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);

        // creates index for column `type_id`
        $this->createIndex(
            '{{%idx-food-type_id}}',
            '{{%food}}',
            'type_id'
        );

        // add foreign key for table `{{%food_type}}`
        $this->addForeignKey(
            '{{%fk-food-type_id}}',
            '{{%food}}',
            'type_id',
            '{{%food_type}}',
            'id',
            'CASCADE'
        );

        // creates index for column `storage_id`
        $this->createIndex(
            '{{%idx-food-storage_id}}',
            '{{%food}}',
            'storage_id'
        );

        // add foreign key for table `{{%storage}}`
        $this->addForeignKey(
            '{{%fk-food-storage_id}}',
            '{{%food}}',
            'storage_id',
            '{{%storage}}',
            'id',
            'CASCADE'
        );

        // creates index for column `supplier_id`
        $this->createIndex(
            '{{%idx-food-supplier_id}}',
            '{{%food}}',
            'supplier_id'
        );

        // add foreign key for table `{{%supplier}}`
        $this->addForeignKey(
            '{{%fk-food-supplier_id}}',
            '{{%food}}',
            'supplier_id',
            '{{%supplier}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%food_type}}`
        $this->dropForeignKey(
            '{{%fk-food-type_id}}',
            '{{%food}}'
        );

        // drops index for column `type_id`
        $this->dropIndex(
            '{{%idx-food-type_id}}',
            '{{%food}}'
        );

        // drops foreign key for table `{{%storage}}`
        $this->dropForeignKey(
            '{{%fk-food-storage_id}}',
            '{{%food}}'
        );

        // drops index for column `storage_id`
        $this->dropIndex(
            '{{%idx-food-storage_id}}',
            '{{%food}}'
        );

        // drops foreign key for table `{{%supplier}}`
        $this->dropForeignKey(
            '{{%fk-food-supplier_id}}',
            '{{%food}}'
        );

        // drops index for column `supplier_id`
        $this->dropIndex(
            '{{%idx-food-supplier_id}}',
            '{{%food}}'
        );

        $this->dropTable('{{%food}}');
    }
}
