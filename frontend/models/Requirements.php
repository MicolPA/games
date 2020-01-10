<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "requirements".
 *
 * @property int $id
 * @property string $sistemaOperativo
 * @property string $procesador
 * @property string $memoria
 * @property string $graficos
 * @property string $directX
 * @property string $discoDuro
 * @property string $otros
 *
 * @property Games[] $games
 */
class Requirements extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'requirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['sistemaOperativo', 'procesador', 'memoria', 'graficos', 'directX', 'discoDuro', 'otros'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sistemaOperativo' => 'Sistema Operativo',
            'procesador' => 'Procesador',
            'memoria' => 'Memoria',
            'graficos' => 'Graficos',
            'directX' => 'Direct X',
            'discoDuro' => 'Disco Duro',
            'otros' => 'Comentario',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getGames()
    {
        return $this->hasMany(Games::className(), ['requirements_id' => 'id']);
    }
}
