<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "detail_pemesanan_admin".
 *
 * @property int $id
 * @property int $data_barang_id
 * @property int $harga
 * @property int $jumlah
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property DataBarang $dataBarang
 */
class DetailPemesananAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'detail_pemesanan_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_barang_id', 'harga', 'jumlah'], 'required'],
            [['data_barang_id', 'harga', 'jumlah'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['data_barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataBarang::class, 'targetAttribute' => ['data_barang_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'data_barang_id' => 'Data Barang ID',
            'harga' => 'Harga',
            'jumlah' => 'Jumlah',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[DataBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataBarang()
    {
        return $this->hasOne(DataBarang::class, ['id' => 'data_barang_id']);
    }
}
