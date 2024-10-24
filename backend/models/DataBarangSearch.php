<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DataBarang;

/**
 * DataBarangSearch represents the model behind the search form of `common\models\DataBarang`.
 */
class DataBarangSearch extends DataBarang
{
    /**
     * {@inheritdoc}
     */
    public $supplier_id;
    
    public function rules()
    {
        return [
            [['id', 'supplier_id', 'jenis_barang_id', 'merek_barang_id', 'harga_barang', 'stok_barang'], 'integer'],
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
    public function search($params)
    {
        $query = DataBarang::find();

        // Create ActiveDataProvider
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pageSize'=>4]
        ]);

        // Load the search parameters
        $this->load($params);

        if (!$this->validate()) {
            // If validation fails, return data provider with no records
            $query->where('0=1');
            return $dataProvider;
        }

        // Adjust the query based on search criteria
        $query->andFilterWhere([
            'id' => $this->id,
            'supplier_id' => $this->supplier_id,
            'jenis_barang_id' => $this->jenis_barang_id,
            'merek_barang_id' => $this->merek_barang_id,
            'harga_barang' => $this->harga_barang,
            'stok_barang' => $this->stok_barang,
        ]);

        $query->andFilterWhere(['like', 'kode_barang', $this->kode_barang])
              ->andFilterWhere(['like', 'nama_barang', $this->nama_barang])
              ->andFilterWhere(['like', 'deskripsi', $this->deskripsi]);

        return $dataProvider;
    }
}
