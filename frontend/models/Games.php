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
            [['name', 'resumen', 'category_id', 'platform_id', 'portada_out', 'portada_in', 'imagenes', 'links', 'date'], 'required'],
            [['resumen', 'imagenes', 'links'], 'string'],
            [['category_id, platform_id'], 'integer'],
            [['date'], 'safe'],
            [['name'], 'string', 'max' => 150],
            [['portada_out', 'portada_in'], 'string', 'max' => 100],
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
