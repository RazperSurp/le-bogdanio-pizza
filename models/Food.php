<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "food".
 *
 * @property int $id
 * @property int $type_id
 * @property int $storage_id
 * @property int $supplier_id
 * @property string $name
 * @property float $price
 * @property int $count
 * @property int $weight В граммах
 * @property int $expires
 * @property int $created_at
 * @property int $updated_at
 * @property bool|null $deleted
 *
 * @property CatalogFood[] $catalogFoods
 * @property Storage $storage
 * @property Supplier $supplier
 * @property FoodType $type
 */
class Food extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'food';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'storage_id', 'supplier_id', 'name', 'price', 'count', 'weight', 'expires', 'created_at', 'updated_at'], 'required'],
            [['type_id', 'storage_id', 'supplier_id', 'count', 'weight', 'expires', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['type_id', 'storage_id', 'supplier_id', 'count', 'weight', 'expires', 'created_at', 'updated_at'], 'integer'],
            [['price'], 'number'],
            [['deleted'], 'boolean'],
            [['name'], 'string', 'max' => 64],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => FoodType::class, 'targetAttribute' => ['type_id' => 'id']],
            [['storage_id'], 'exist', 'skipOnError' => true, 'targetClass' => Storage::class, 'targetAttribute' => ['storage_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Supplier::class, 'targetAttribute' => ['supplier_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'storage_id' => 'Storage ID',
            'supplier_id' => 'Supplier ID',
            'name' => 'Name',
            'price' => 'Price',
            'count' => 'Count',
            'weight' => 'Weight',
            'expires' => 'Expires',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[CatalogFoods]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogFoods()
    {
        return $this->hasMany(CatalogFood::class, ['food_id' => 'id']);
    }

    /**
     * Gets query for [[Storage]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStorage()
    {
        return $this->hasOne(Storage::class, ['id' => 'storage_id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Supplier::class, ['id' => 'supplier_id']);
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(FoodType::class, ['id' => 'type_id']);
    }
}
