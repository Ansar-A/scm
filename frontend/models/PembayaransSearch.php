<?php

namespace frontend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pembayarans;

/**
 * PembayaransSearch represents the model behind the search form of `common\models\Pembayarans`.
 */
class PembayaransSearch extends Pembayarans
{
    public $globalSearch;
    public function rules()
    {
        return [
            [['id', 'pemesanan_admin_id'], 'integer'],
            [['kode_pembayaran', 'tanggal',  'gambar', 'created_at', 'updated_at','globalSearch'], 'safe'],
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
        $query = Pembayarans::find();

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
        // $query->andFilterWhere([
        //     'id' => $this->id,
        //     'pemesanan_admin_id' => $this->pemesanan_admin_id,
            
        //     'tanggal' => $this->tanggal,
        //     'created_at' => $this->created_at,
        //     'updated_at' => $this->updated_at,
        // ]);

        $query->andFilterWhere(['or',
            ['like', 'kode_pembayaran', $this->globalSearch],
            ['like', 'status_brg', $this->globalSearch]
        ]);
           

        return $dataProvider;
    }
}