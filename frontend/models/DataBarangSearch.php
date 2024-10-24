<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\DataBarang;
use Yii;
/**
 * DataBarangSearch represents the model behind the search form of `common\models\DataBarang`.
 */
class DataBarangSearch extends DataBarang
{
    public $globalSearch;
   
    public function rules()
    {
        return [
            [['id', 'supplier_id', 'jenis_barang_id', 'merek_barang_id', 'harga_barang', 'stok_barang'], 'integer'],
            [['kode_barang', 'nama_barang', 'deskripsi', 'foto_barang', 'created_at', 'updated_at', 'globalSearch'], 'safe'],
            [['foto_barang'], 'safe'],
            [['foto_barang'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'update'],
            
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
        $query = DataBarang::find()->where(['data_barang.supplier_id'=>Yii::$app->user->identity->id]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination'=>['pageSize'=>5]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }
        // Apply filtering conditions for multiple columns
        $query->andFilterWhere([
            // 'id' => $this->id,
            // 'supplier_id' => $this->supplier_id,
            // 'jenis_barang_id' => $this->jenis_barang_id,
            // 'merek_barang_id' => $this->merek_barang_id,
            // 'kode_barang' => $this->kode_barang,
            // 'stok_barang' => $this->kode_barang,
        ]);

        // Apply global search conditions
         $query->joinWith(['jenisBarang']);
        $query->andFilterWhere(['or',
            ['like', 'jenis_barang.nama', $this->globalSearch],
            ['like', 'data_barang.nama_barang', $this->globalSearch],
            ['like', 'data_barang.stok_barang', $this->globalSearch],
            ['like', 'data_barang.kode_barang', $this->globalSearch],
            ['like', 'data_barang.harga_barang', $this->globalSearch],
       
         
        ]);

        return $dataProvider;
    }
}
