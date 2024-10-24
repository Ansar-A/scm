<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "data_barang".
 *
 * @property int $id
 * @property int $supplier_id
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
 * @property BarangMasuk[] $barangMasuks
 * @property DetailPemesananAdmin[] $detailPemesananAdmins
 * @property JenisBarang $jenisBarang
 * @property MerekBarang $merekBarang
 * @property PemesananAdmin[] $pemesananAdmins
 * @property Suppliers $supplier
 */
class DataBarang extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return 'data_barang';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['supplier_id', 'jenis_barang_id', 'merek_barang_id', 'kode_barang', 'nama_barang', 'harga_barang', 'stok_barang'], 'required'],
            [['supplier_id', 'jenis_barang_id', 'merek_barang_id', 'stok_barang'], 'integer'],
            [['deskripsi'], 'string'],
            [['created_at', 'updated_at', 'harga_barang'], 'safe'],
            [['kode_barang', 'nama_barang'], 'string', 'max' => 255],
            [['jenis_barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => JenisBarang::class, 'targetAttribute' => ['jenis_barang_id' => 'id']],
            [['merek_barang_id'], 'exist', 'skipOnError' => true, 'targetClass' => MerekBarang::class, 'targetAttribute' => ['merek_barang_id' => 'id']],
            [['supplier_id'], 'exist', 'skipOnError' => true, 'targetClass' => Suppliers::class, 'targetAttribute' => ['supplier_id' => 'id']],

            [['foto_barang'], 'safe'],
            [['foto_barang'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'on' => 'update'],

           
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            $filePath = 'uploads/' . $this->excelFile->baseName . '.' . $this->excelFile->extension;
            return $this->excelFile->saveAs($filePath); // Save the uploaded file
        }
        return false;
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'supplier_id' => 'Supplier ID',
            'jenis_barang_id' => 'Jenis Barang ID',
            'merek_barang_id' => 'Merek Barang ID',
            'kode_barang' => 'Kode Barang',
            'nama_barang' => 'Nama Barang',
            'deskripsi' => 'Deskripsi',
            'foto_barang' => 'Foto Barang',
            'harga_barang' => 'Harga Barang',
            'stok_barang' => 'Stok Barang',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[BarangMasuks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getBarangMasuks()
    {
        return $this->hasMany(BarangMasuk::class, ['data_barang_id' => 'id']);
    }

    /**
     * Gets query for [[DetailPemesananAdmins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDetailPemesananAdmins()
    {
        return $this->hasMany(DetailPemesananAdmin::class, ['data_barang_id' => 'id']);
    }

    /**
     * Gets query for [[JenisBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getJenisBarang()
    {
        return $this->hasOne(JenisBarang::class, ['id' => 'jenis_barang_id']);
    }

    /**
     * Gets query for [[MerekBarang]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getMerekBarang()
    {
        return $this->hasOne(MerekBarang::class, ['id' => 'merek_barang_id']);
    }

    /**
     * Gets query for [[PemesananAdmins]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getPemesananAdmins()
    {
        return $this->hasMany(PemesananAdmin::class, ['data_barang_id' => 'id']);
    }

    /**
     * Gets query for [[Supplier]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSupplier()
    {
        return $this->hasOne(Suppliers::class, ['id' => 'supplier_id']);
    }
}
