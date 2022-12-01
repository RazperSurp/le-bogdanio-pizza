<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property int $id
 * @property string $login
 * @property string $password
 * @property string $lastname
 * @property string $firstname
 * @property string $phone
 * @property string $email
 * @property string $address
 * @property int|null $points
 * @property int $created_at
 * @property int $updated_at
 * @property bool|null $deleted
 *
 * @property UserTrades[] $userTrades
 */
class Users extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['login', 'password', 'lastname', 'firstname', 'phone', 'email', 'address', 'created_at', 'updated_at'], 'required'],
            [['password'], 'string'],
            [['points', 'created_at', 'updated_at'], 'default', 'value' => null],
            [['points', 'created_at', 'updated_at'], 'integer'],
            [['deleted'], 'boolean'],
            [['login'], 'string', 'max' => 32],
            [['lastname', 'firstname', 'email', 'address'], 'string', 'max' => 124],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'unique'],
            [['login'], 'unique'],
            [['phone'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Login',
            'password' => 'Password',
            'lastname' => 'Lastname',
            'firstname' => 'Firstname',
            'phone' => 'Phone',
            'email' => 'Email',
            'address' => 'Address',
            'points' => 'Points',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'deleted' => 'Deleted',
        ];
    }

    /**
     * Gets query for [[UserTrades]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUserTrades()
    {
        return $this->hasMany(UserTrades::class, ['user_id' => 'id']);
    }
}
