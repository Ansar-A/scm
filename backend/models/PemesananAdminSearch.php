<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\PemesananAdmin;
use Yii;
/**
 * PemesananAdminSearch represents the model behind the search form of `common\models\PemesananAdmin`.
 */
class PemesananAdminSearch extends PemesananAdmin
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'data_barang_id', 'jumlah', 'total'], 'integer'],
            [['kode_pemesanan', 'waktu_pemesanan', 'status', 'created_at', 'updated_at', 'user_id'], 'safe'],
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
        $akses = Yii::$app->user->identity->id; // ID user yang login
        $query = PemesananAdmin::find()
            ->joinWith(['dataBarang', 'dataBarang.supplier'])  // Join dengan relasi dataBarang dan supplier
            ->where(['pemesanan_admin.user_id' => $akses]); 

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10
            ]
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
            'data_barang_id' => $this->data_barang_id,
            'waktu_pemesanan' => $this->waktu_pemesanan,
            'jumlah' => $this->jumlah,
            'total' => $this->total,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'kode_pemesanan', $this->kode_pemesanan])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
