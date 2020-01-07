<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "collections".
 *
 * @property int $id
 * @property string $name
 * @property string $portada
 * @property string $date
 */
class Collections extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'collections';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'date'], 'required'],
            [['date'], 'safe'],
            [['name', 'portada'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Nombre',
            'portada' => 'Portada',
            'date' => 'Fecha',
        ];
    }
}
