<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%catalog_food}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%catalog}}`
 * - `{{%food}}`
 */
class m221129_143249_create_catalog_food_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%catalog_food}}', [
            'id' => $this->primaryKey(),
            'catalog_id' => $this->integer()->notNull(),
            'food_id' => $this->integer()->notNull(),
            'weight' => $this->integer()->notNull()->comment('В граммах'),
            'count' => $this->integer()->notNull(),
            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
            'deleted' => $this->boolean()->defaultValue(false),
        ]);

        // creates index for column `catalog_id`
        $this->createIndex(
            '{{%idx-catalog_food-catalog_id}}',
            '{{%catalog_food}}',
            'catalog_id'
        );

        // add foreign key for table `{{%catalog}}`
        $this->addForeignKey(
            '{{%fk-catalog_food-catalog_id}}',
            '{{%catalog_food}}',
            'catalog_id',
            '{{%catalog}}',
            'id',
            'CASCADE'
        );

        // creates index for column `food_id`
        $this->createIndex(
            '{{%idx-catalog_food-food_id}}',
            '{{%catalog_food}}',
            'food_id'
        );

        // add foreign key for table `{{%food}}`
        $this->addForeignKey(
            '{{%fk-catalog_food-food_id}}',
            '{{%catalog_food}}',
            'food_id',
            '{{%food}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%catalog}}`
        $this->dropForeignKey(
            '{{%fk-catalog_food-catalog_id}}',
            '{{%catalog_food}}'
        );

        // drops index for column `catalog_id`
        $this->dropIndex(
            '{{%idx-catalog_food-catalog_id}}',
            '{{%catalog_food}}'
        );

        // drops foreign key for table `{{%food}}`
        $this->dropForeignKey(
            '{{%fk-catalog_food-food_id}}',
            '{{%catalog_food}}'
        );

        // drops index for column `food_id`
        $this->dropIndex(
            '{{%idx-catalog_food-food_id}}',
            '{{%catalog_food}}'
        );

        $this->dropTable('{{%catalog_food}}');
    }
}
