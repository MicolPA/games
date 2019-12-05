<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "requests".
 *
 * @property int $id
 * @property string $name
 * @property string $platform
 * @property string $email
 * @property int $status
 * @property string $statusDescription
 * @property string $date
 */
class Requests extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requests';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'platform', 'email', 'status', 'statusDescription', 'date'], 'required'],
            [['status'], 'integer'],
            [['date'], 'safe'],
            [['name', 'platform', 'email', 'statusDescription'], 'string', 'max' => 255],
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
            'platform' => 'Platform',
            'email' => 'Email',
            'status' => 'Status',
            'statusDescription' => 'Status Description',
            'date' => 'Date',
        ];
    }
}
