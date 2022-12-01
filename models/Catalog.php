<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "catalog".
 *
 * @property int $id
 * @property string $name
 * @property int|null $discount
 * @property int $size_id
 * @property int $created_at
 * @property int $updated_at
 * @property bool|null $deleted
 *
 * @property CatalogFood[] $catalogFoods
 * @property Size $size
 * @property UserTrades[] $userTrades
 */
class Catalog extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'catalog';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'size_id', 'created_at', 'updated_at'], 'required'],
            [['discount', 'size_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['discount', 'size_id', 'created_at', 'updated_at'], 'integer'],
            [['deleted'], 'boolean'],
            [['name'], 'string', 'max' => 124],
            [['name'], 'unique'],
            [['size_id'], 'exist', 'skipOnError' => true, 'targetClass' => Size::class, 'targetAttribute' => ['size_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'discount' => 'Discount',
            'size_id' => 'Size ID',
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
        return $this->hasMany(CatalogFood::class, ['catalog_id' => 'id']);
    }

    /**
     * Gets query for [[Size]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSize()
    {
        return $this->hasOne(Size::class, ['id' => 'size_id']);
    }

    /**
     * Gets query for [[UserTrades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTrades()
    {
        return $this->hasMany(UserTrades::class, ['catalog_id' => 'id']);
    }
}
