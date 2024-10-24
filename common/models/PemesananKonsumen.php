<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan_konsumen".
 *
 * @property int $id
 * @property int $konsumen_id
 * @property int $barang_masuk_id
 * @property string|null $nama_barang
 * @property string|null $harga_barang
 * @property string|null $kode_pemesanan
 * @property string $waktu_pemesanan
 * @property int $jumlah
 * @property int $total
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property BarangMasuk $barangMasuk
 * @property Konsumens $konsumen
 * @property PembayaranKonsumen[] $pembayaranKonsumens
 */
class PemesananKonsumen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemesanan_konsumen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [[ 'barang_masuk_id', 'waktu_pemesanan', 'jumlah', 'total', 'metode'], 'required'],
            [['barang_masuk_id', 'jumlah', 'total'], 'integer'],
            [['waktu_pemesanan', 'created_at', 'updated_at', 'metode'], 'safe'],
            [['status'], 'string'],
            [[ 'kode_pemesanan'], 'string', 'max' => 255],
            
            [['barang_masuk_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataProduk::class, 'targetAttribute' => ['barang_masuk_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
           
            'barang_masuk_id' => 'Barang Masuk ID',
            
           
            'kode_pemesanan' => 'Kode Pemesanan',
            'waktu_pemesanan' => 'Waktu Pemesanan',
            'jumlah' => 'Jumlah',
            'total' => 'Total',
            'metode' => 'Metode Pembayaran',
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
    public function getDataProduk()
    {
        return $this->hasOne(DataProduk::class, ['id' => 'barang_masuk_id']);
    }

    public function getPembayaranKonsumens()
    {
        return $this->hasMany(PembayaranKonsumen::class, ['pemesanan_konsumen_id' => 'id']);
    }
    public static function generateKodePemesanan()
    {
        $prefix = 'BRG-'; // Prefix kode
        $lastOrder = self::find()->orderBy(['id' => SORT_DESC])->one(); // Ambil pemesanan terakhir

        if ($lastOrder !== null) {
            // Ambil nomor terakhir dari kode pemesanan terakhir
            $lastNumber = (int)str_replace($prefix, '', $lastOrder->kode_pemesanan);
            $newNumber = $lastNumber + 1;
        } else {
            // Jika belum ada pemesanan, mulai dari 1
            $newNumber = 1;
        }

        // Format angka menjadi 3 digit (contoh: 001, 002, 003, dst.)
        return $prefix . str_pad($newNumber, 3, '0', STR_PAD_LEFT);
    }
}
