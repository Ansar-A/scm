<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pembayarans".
 *
 * @property int $id
 * @property int $pemesanan_admin_id
 * @property string $kode_pembayaran
 * @property string $metode_pembayaran
 * @property int $total
 * @property string $tanggal
 * @property string|null $status
 * @property string $gambar
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property PemesananAdmin $pemesananAdmin
 */
class Pembayarans extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayarans';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pemesanan_admin_id', 'kode_pembayaran',  'tanggal', 'gambar'], 'required'],
            [['pemesanan_admin_id'], 'integer'],
            [['tanggal', 'created_at', 'updated_at', 'stok_brg'], 'safe'],
            [['kode_pembayaran'], 'string', 'max' => 255],
            [['pemesanan_admin_id'], 'exist', 'skipOnError' => true, 'targetClass' => PemesananAdmin::class, 'targetAttribute' => ['pemesanan_admin_id' => 'id']],

            [['gambar'], 'safe'],
            [['gambar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'update'],
            
            [['status_brg'], 'default', 'value' => 'Validasi'],
            [['status_brg'], 'in', 'range' => ['Validasi', 'Pengantaran', 'Selesai']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pemesanan_admin_id' => 'Pemesanan Admin ID',
           
            'kode_pembayaran' => 'Kode Pembayaran',
            
            'tanggal' => 'Tanggal',
            'status_brg' => 'Status Barang',
            'gambar' => 'Gambar',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PemesananAdmin]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemesananAdmin()
    {
        return $this->hasOne(PemesananAdmin::class, ['id' => 'pemesanan_admin_id']);
    }
    public static function generateKodePembayaran()
    {
        $count = self::find()->count(); // Hitung jumlah pembayaran yang ada
        $nextNumber = $count + 1; // Hitung nomor berikutnya
        return 'CP-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Format 'CP-001', 'CP-002', dst.
    }

}
