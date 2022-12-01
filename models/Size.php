<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "size".
 *
 * @property int $id
 * @property string $name
 * @property int $d
 * @property int $created_at
 * @property int $updated_at
 * @property bool|null $deleted
 *
 * @property Catalog[] $catalogs
 */
class Size extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'size';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'd', 'created_at', 'updated_at'], 'required'],
            [['d', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['d', 'created_at', 'updated_at'], 'integer'],
            [['deleted'], 'boolean'],
            [['name'], 'string', 'max' => 24],
            [['d'], 'unique'],
            [['name'], 'unique'],
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
            'd' => 'D',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[Catalogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCatalogs()
    {
        return $this->hasMany(Catalog::class, ['size_id' => 'id']);
    }
}
