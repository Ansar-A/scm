<?php

namespace consumen\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DataProduk;

/**
 * DataProdukSearch represents the model behind the search form of `common\models\DataProduk`.
 */
class DataProdukSearch extends DataProduk
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'user_id', 'jenis_barang_id', 'merek_barang_id', 'harga_barang', 'stok_barang'], 'integer'],
            [['kode_barang', 'nama_barang', 'deskripsi', 'foto_barang', 'created_at', 'updated_at'], 'safe'],
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
    public function search($params, $userId = null)
    {
        // $query = DataProduk::find();
        $query = DataProduk::find();

        // Filter by user_id if a user is selected
        if ($userId) {
            $query->andWhere(['user_id' => $userId]);
        }

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
            'user_id' => $this->user_id,
            'jenis_barang_id' => $this->jenis_barang_id,
            'merek_barang_id' => $this->merek_barang_id,
            'harga_barang' => $this->harga_barang,
            'stok_barang' => $this->stok_barang,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
            ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
            ->andFilterWhere(['like', 'deskripsi', $this->deskripsi])
            ->andFilterWhere(['like', 'foto_barang', $this->foto_barang]);

        return $dataProvider;
    }
}
