<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pemesanan_admin".
 *
 * @property int $id
 * @property int $supplier_id
 * @property int $data_barang_id
 * @property string|null $kode_pemesanan
 * @property string $waktu_pemesanan
 * @property int|null $jumlah
 * @property int $total
 * @property string|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property DataBarang $dataBarang
 * @property Pembayarans[] $pembayarans
 * @property Suppliers $supplier
 */
class PemesananAdmin extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'pemesanan_admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['data_barang_id', 'waktu_pemesanan', 'total', 'metode'], 'required'],
            [['data_barang_id', 'jumlah', 'total'], 'integer'],
            [['waktu_pemesanan', 'created_at', 'updated_at', 'user_id'], 'safe'],
            [['status'], 'string'],
            [['metode'], 'safe'],
            [['kode_pemesanan'], 'string', 'max' => 255],
            
            [['data_barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => DataBarang::class, 'targetAttribute' => ['data_barang_id' => 'id']],

            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
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
            'kode_pemesanan' => 'Kode Pemesanan',
            'waktu_pemesanan' => 'Waktu Pemesanan',
            'jumlah' => 'Jumlah',
            'total' => 'Total',
            'status' => 'Status',
            'user_id' => 'User',
            'metode' => 'Metode Pembayaran',
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

    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[Pembayarans]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPembayarans()
    {
        return $this->hasMany(Pembayarans::class, ['pemesanan_admin_id' => 'id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
   

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
