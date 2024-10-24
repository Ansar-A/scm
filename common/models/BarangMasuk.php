<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang_masuk".
 *
 * @property int $id
 * @property int $user_id
 * @property int $data_barang_id
 * @property string $kode_barang
 * @property string $tanggal_masuk
 * @property int $jumlah
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property BarangKeluar[] $barangKeluars
 * @property DataBarang $dataBarang
 * @property PemesananKonsumen[] $pemesananKonsumens
 * @property User $user
 */
class BarangMasuk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang_masuk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'data_barang_id', 'kode_barang', 'tanggal_masuk', 'jumlah'], 'required'],
            [['user_id', 'data_barang_id', 'jumlah'], 'integer'],
            [['tanggal_masuk', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['kode_barang'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'user_id' => 'User ID',
            'data_barang_id' => 'Data Barang ID',
            'kode_barang' => 'Kode Barang',
            'tanggal_masuk' => 'Tanggal Masuk',
            'jumlah' => 'Jumlah',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[BarangKeluars]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangKeluars()
    {
        return $this->hasMany(BarangKeluar::class, ['barang_masuk_id' => 'id']);
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

    /**
     * Gets query for [[PemesananKonsumens]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemesananKonsumens()
    {
        return $this->hasMany(PemesananKonsumen::class, ['barang_masuk_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
}
