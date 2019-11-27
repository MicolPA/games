<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $name
 * @property string $resumen
 * @property int $category_id
 * @property int $platform_id
 * @property string $portada_out
 * @property string $portada_in
 * @property string $imagenes
 * @property string $links
 * @property string $date
 */
class Games extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'games';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'platform_id'], 'required'],
            [['resumen', 'imagenes', 'links'], 'string'],
            [['category_id', 'platform_id'], 'integer'],
            [['date'], 'safe'],
            [['name', 'portada_out', 'portada_in'], 'string', 'max' => 255],
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
            'resumen' => 'Resumen',
            'category_id' => 'Category ID',
            'platform_id' => 'Platform ID',
            'portada_out' => 'Portada Out',
            'portada_in' => 'Portada In',
            'imagenes' => 'Imagenes',
            'links' => 'Links',
            'date' => 'Date',
        ];
    }
}
