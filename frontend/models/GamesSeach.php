<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Games;

/**
 * GamesSeach represents the model behind the search form of `frontend\models\Games`.
 */
class GamesSeach extends Games
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'category_id'], 'integer'],
            [['name', 'resumen', 'portada_out', 'portada_in', 'imagenes', 'links', 'date'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Games::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'date' => $this->date,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'resumen', $this->resumen])
            ->andFilterWhere(['like', 'portada_out', $this->portada_out])
            ->andFilterWhere(['like', 'portada_in', $this->portada_in])
            ->andFilterWhere(['like', 'imagenes', $this->imagenes])
            ->andFilterWhere(['like', 'links', $this->links]);

        return $dataProvider;
    }
}
