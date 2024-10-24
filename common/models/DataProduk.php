<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_produk".
 *
 * @property int $id
 * @property int $user_id
 * @property int $jenis_barang_id
 * @property int $merek_barang_id
 * @property string $kode_barang
 * @property string $nama_barang
 * @property string|null $deskripsi
 * @property string|null $foto_barang
 * @property int $harga_barang
 * @property int $stok_barang
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property JenisBarang $jenisBarang
 * @property MerekBarang $merekBarang
 * @property User $user
 */
class DataProduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'data_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'jenis_barang_id', 'merek_barang_id', 'kode_barang', 'nama_barang', 'harga_barang', 'stok_barang'], 'required'],
            [['user_id',  'harga_barang', 'stok_barang', 'merek_barang_id',], 'integer'],
            [['deskripsi', 'jenis_barang_id'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['kode_barang', 'nama_barang'], 'string', 'max' => 255],

            // [['jenis_barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBarang::class, 'targetAttribute' => ['jenis_barang_id' => 'id']],

            [['merek_barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => MerekProduk::class, 'targetAttribute' => ['merek_barang_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],

            [['foto_barang'], 'safe'],
            [['foto_barang'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'update'],

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
            'jenis_barang_id' => 'Jenis Produk',
            'merek_barang_id' => 'Merek Produk',
            'kode_barang' => 'Kode Produk',
            'nama_barang' => 'Nama Produk',
            'deskripsi' => 'Deskripsi',
            'foto_barang' => 'Foto Produk',
            'harga_barang' => 'Harga Produk',
            'stok_barang' => 'Stok Produk',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public static function generateKodeProduk()
    {
        $count = self::find()->count(); // Hitung jumlah pembayaran yang ada
        $nextNumber = $count + 1; // Hitung nomor berikutnya
        return 'PRD-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Format 'CP-001', 'CP-002', dst.
    }
    
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }
    public function getMerekProduk()
    {
        return $this->hasOne(MerekProduk::class, ['id' => 'merek_barang_id']);
    }
    public function getPemesananKonsumens()
    {
        return $this->hasMany(PemesananKonsumen::class, ['data_barang_id' => 'id']);
    }
}
