<?php

namespace consumen\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\BarangKeluar;

/**
 * BarangKeluarSearch represents the model behind the search form of `common\models\BarangKeluar`.
 */
class BarangKeluarSearch extends BarangKeluar
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'konsumen_id', 'barang_masuk_id', 'jumlah'], 'integer'],
            [['kode_barang', 'tanggal_keluar', 'status', 'created_at', 'updated_at'], 'safe'],
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
        $query = BarangKeluar::find();

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
            'konsumen_id' => $this->konsumen_id,
            'barang_masuk_id' => $this->barang_masuk_id,
            'tanggal_keluar' => $this->tanggal_keluar,
            'jumlah' => $this->jumlah,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
