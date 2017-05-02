<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property integer $roll_no
 * @property string $name
 * @property string $branch
 * @property string $contact
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Cart[] $carts
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['roll_no', 'name', 'branch', 'contact', 'auth_key', 'password_hash', 'email', 'created_at', 'updated_at'], 'required'],
            [['roll_no', 'status', 'created_at', 'updated_at'], 'integer'],
            [['name'], 'string', 'max' => 45],
            [['branch'], 'string', 'max' => 20],
            [['contact'], 'string', 'max' => 10],
            [['auth_key'], 'string', 'max' => 32],
            [['password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['email'], 'unique'],
            [['roll_no'], 'unique'],
            [['roll_no', 'email'], 'unique', 'targetAttribute' => ['roll_no', 'email'], 'message' => 'The combination of Roll No and Email has already been taken.'],
            [['contact'], 'unique'],
            [['password_reset_token'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'roll_no' => 'Roll No',
            'name' => 'Name',
            'branch' => 'Branch',
            'contact' => 'Contact',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCarts()
    {
        return $this->hasMany(Cart::className(), ['roll_no' => 'roll_no']);
    }

    /**
     * @inheritdoc
     * @return UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserQuery(get_called_class());
    }
}
