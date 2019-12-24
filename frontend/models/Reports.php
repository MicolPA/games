<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property int $id
 * @property string $email
 * @property int $game_id
 * @property string $game_name
 * @property string $error
 * @property int $status
 * @property string $date
 */
class Reports extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_id', 'date'], 'required'],
            [['game_id', 'status'], 'integer'],
            [['date'], 'safe'],
            [['email', 'game_name', 'error'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'game_id' => 'Game ID',
            'game_name' => 'Game Name',
            'error' => 'Error',
            'status' => 'Status',
            'date' => 'Date',
        ];
    }
}
