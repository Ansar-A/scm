<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pembayaran_konsumen".
 *
 * @property int $id
 * @property int $pemesanan_konsumen_id
 * @property string $nama
 * @property string $kode_pembayaran
 * @property string $metode_pembayaran
 * @property int $total
 * @property string $tanggal
 * @property string $gambar
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property PemesananKonsumen $pemesananKonsumen
 */
class PembayaranKonsumen extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pembayaran_konsumen';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pemesanan_konsumen_id',  'kode_pembayaran',  'tanggal', 'gambar'], 'required'],
            [['pemesanan_konsumen_id'], 'integer'],
            [['status_brg'], 'string'],
            [['tanggal', 'created_at', 'updated_at'], 'safe'],
            [['kode_pembayaran'], 'string', 'max' => 255],

            [['gambar'], 'safe'],
            [['gambar'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'update'],

            [['pemesanan_konsumen_id'], 'exist', 'skipOnError' => true, 'targetClass' => PemesananKonsumen::class, 'targetAttribute' => ['pemesanan_konsumen_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pemesanan_konsumen_id' => 'Pemesanan Konsumen ID',
            'kode_pembayaran' => 'Kode Pembayaran',
            'tanggal' => 'Tanggal',
            'gambar' => 'Gambar',
            'status_brg' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[PemesananKonsumen]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemesananKonsumen()
    {
        return $this->hasOne(PemesananKonsumen::class, ['id' => 'pemesanan_konsumen_id']);
    }
    public static function generateKodePembayaran()
    {
        $count = self::find()->count(); // Hitung jumlah pembayaran yang ada
        $nextNumber = $count + 1; // Hitung nomor berikutnya
        return 'CP-' . str_pad($nextNumber, 3, '0', STR_PAD_LEFT); // Format 'CP-001', 'CP-002', dst.
    }
}
