<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog_food".
 *
 * @property int $id
 * @property int $catalog_id
 * @property int $food_id
 * @property int $weight В граммах
 * @property int $count
 * @property int $created_at
 * @property int $updated_at
 * @property bool|null $deleted
 *
 * @property Catalog $catalog
 * @property Food $food
 */
class CatalogFood extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog_food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['catalog_id', 'food_id', 'weight', 'count', 'created_at', 'updated_at'], 'required'],
            [['catalog_id', 'food_id', 'weight', 'count', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['catalog_id', 'food_id', 'weight', 'count', 'created_at', 'updated_at'], 'integer'],
            [['deleted'], 'boolean'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::class, 'targetAttribute' => ['catalog_id' => 'id']],
            [['food_id'], 'exist', 'skipOnError' => true, 'targetClass' => Food::class, 'targetAttribute' => ['food_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'catalog_id' => 'Catalog ID',
            'food_id' => 'Food ID',
            'weight' => 'Weight',
            'count' => 'Count',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[Catalog]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalog()
    {
        return $this->hasOne(Catalog::class, ['id' => 'catalog_id']);
    }

    /**
     * Gets query for [[Food]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getFood()
    {
        return $this->hasOne(Food::class, ['id' => 'food_id']);
    }
}
