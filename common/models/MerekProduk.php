<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "merek_produk".
 *
 * @property int $id
 * @property string $merek
 *
 * @property DataProduk[] $dataProduks
 */
class MerekProduk extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'merek_produk';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['merek'], 'required'],
            [['merek'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'merek' => 'Merek',
        ];
    }

    /**
     * Gets query for [[DataProduks]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDataProduks()
    {
        return $this->hasMany(DataProduk::class, ['merek_barang_id' => 'id']);
    }
}
