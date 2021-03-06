<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "games".
 *
 * @property int $id
 * @property string $name
 * @property string $resumen
 * @property string $size
 * @property int $category_id
 * @property int $category_id2
 * @property int $requirements_id
 * @property int $requirementsType_id
 * @property string $portada_out
 * @property string $portada_in
 * @property string $imagenes
 * @property string $links
 * @property int $platform_id
 * @property string $date
 *
 * @property Category $category
 * @property Platform $platform
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
            [['name'], 'required'],
            [['resumen', 'imagenes', 'links', 'size'], 'string'],
            [['category_id','category_id2', 'platform_id', 'requirements_id', 'requirementsType_id'], 'integer'],
            [['date'], 'safe'],
            [['name', 'portada_out', 'portada_in'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::className(), 'targetAttribute' => ['category_id' => 'id']],
            [['platform_id'], 'exist', 'skipOnError' => true, 'targetClass' => Platform::className(), 'targetAttribute' => ['platform_id' => 'id']],
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
            'resumen' => 'Resumen',
            'category_id' => 'Category ID',
            'category_id' => 'Category ID 2',
            'requirements_id' => 'Requirements ID',
            'requirementsType_id' => 'RequirementsType ID',
            'portada_out' => 'Portada Out',
            'portada_in' => 'Portada In',
            'imagenes' => 'Imagenes',
            'links' => 'Links',
            'platform_id' => 'Platform ID',
            'date' => 'Date',
            'size' => 'Peso',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id']);
    }
    public function getCategory2()
    {
        return $this->hasOne(Category::className(), ['id' => 'category_id2']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPlatform()
    {
        return $this->hasOne(Platform::className(), ['id' => 'platform_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirements()
    {
        return $this->hasOne(Requirements::className(), ['id' => 'requirements_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRequirementsType()
    {
        return $this->hasOne(RequirementsType::className(), ['id' => 'requirementsType_id']);
    }

}
