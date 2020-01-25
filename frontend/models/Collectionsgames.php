<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "collectionsgames".
 *
 * @property int $id
 * @property int $game_id
 * @property string $game_name
 * @property int $saga_id
 * @property string $orden
 * @property string $date
 *
 * @property Games $game
 * @property Collections $saga
 */
class CollectionsGames extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collections_games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['game_id', 'saga_id', 'date'], 'required'],
            [['game_id', 'saga_id'], 'integer'],
            [['date'], 'safe'],
            [['game_name', 'orden'], 'string', 'max' => 255],
            [['game_id'], 'exist', 'skipOnError' => true, 'targetClass' => Games::className(), 'targetAttribute' => ['game_id' => 'id']],
            [['saga_id'], 'exist', 'skipOnError' => true, 'targetClass' => Collections::className(), 'targetAttribute' => ['saga_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'game_id' => 'Game ID',
            'game_name' => 'Game Name',
            'saga_id' => 'Saga ID',
            'orden' => 'Orden',
            'date' => 'Date',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGame()
    {
        return $this->hasOne(Games::className(), ['id' => 'game_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSaga()
    {
        return $this->hasOne(Collections::className(), ['id' => 'saga_id']);
    }
}
