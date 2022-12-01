<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_trades".
 *
 * @property int $id
 * @property int $user_id
 * @property int $catalog_id
 * @property int $created_at
 * @property int $updated_at
 * @property bool|null $deleted
 *
 * @property Catalog $catalog
 * @property Users $user
 */
class UserTrades extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user_trades';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'catalog_id', 'created_at', 'updated_at'], 'required'],
            [['user_id', 'catalog_id', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['user_id', 'catalog_id', 'created_at', 'updated_at'], 'integer'],
            [['deleted'], 'boolean'],
            [['catalog_id'], 'exist', 'skipOnError' => true, 'targetClass' => Catalog::class, 'targetAttribute' => ['catalog_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'catalog_id' => 'Catalog ID',
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
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
