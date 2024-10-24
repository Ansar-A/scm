<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "barang_keluar".
 *
 * @property int $id
 * @property int $konsumen_id
 * @property int $barang_masuk_id
 * @property string $kode_barang
 * @property string $tanggal_keluar
 * @property int $jumlah
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property BarangMasuk $barangMasuk
 * @property Konsumens $konsumen
 */
class BarangKeluar extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'barang_keluar';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['konsumen_id', 'barang_masuk_id', 'kode_barang', 'tanggal_keluar', 'jumlah'], 'required'],
            [['konsumen_id', 'barang_masuk_id', 'jumlah'], 'integer'],
            [['tanggal_keluar', 'created_at', 'updated_at'], 'safe'],
            [['status'], 'string'],
            [['kode_barang'], 'string', 'max' => 255],
            [['konsumen_id'], 'exist', 'skipOnError' => true, 'targetClass' => Konsumens::class, 'targetAttribute' => ['konsumen_id' => 'id']],
            [['barang_masuk_id'], 'exist', 'skipOnError' => true, 'targetClass' => BarangMasuk::class, 'targetAttribute' => ['barang_masuk_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'konsumen_id' => 'Konsumen ID',
            'barang_masuk_id' => 'Barang Masuk ID',
            'kode_barang' => 'Kode Barang',
            'tanggal_keluar' => 'Tanggal Keluar',
            'jumlah' => 'Jumlah',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[BarangMasuk]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMasuk()
    {
        return $this->hasOne(BarangMasuk::class, ['id' => 'barang_masuk_id']);
    }

    /**
     * Gets query for [[Konsumen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getKonsumen()
    {
        return $this->hasOne(Konsumens::class, ['id' => 'konsumen_id']);
    }
}
