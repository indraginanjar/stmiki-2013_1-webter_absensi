<?php

/**
 * This is the model class for table "tbl_kehadiran".
 *
 * The followings are the available columns in table 'tbl_kehadiran':
 * @property integer $id
 * @property integer $perkuliahan_id
 * @property integer $mahasiswa_id
 * @property string $masuk
 * @property string $keluar
 *
 * The followings are the available model relations:
 * @property Mahasiswa $mahasiswa
 * @property Perkuliahan $perkuliahan
 */
class Kehadiran extends CActiveRecord
{
	public $matakuliah_nama;
	public $mahasiswa_nama;
	public $mahasiswa_nim;
	public $perkuliahan_tanggal;
	public $perkuliahan_pertemuan;
	public $perkuliahan_mulai;
	public $keterangan;
	public $lama_di_kelas;

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_kehadiran';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perkuliahan_id, mahasiswa_id, masuk, keluar', 'required'),
			array('perkuliahan_id, mahasiswa_id', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, perkuliahan_id, mahasiswa_id, masuk, keluar,
				matakuliah_nama,
				mahasiswa_nama,
				mahasiswa_nim,
				perkuliahan_tanggal,
				perkuliahan_pertemuan,
				perkuliahan_mulai
				',
				'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'mahasiswa' => array(self::BELONGS_TO, 'Mahasiswa', 'mahasiswa_id'),
			'perkuliahan' => array(self::BELONGS_TO, 'Perkuliahan', 'perkuliahan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'perkuliahan_id' => 'Perkuliahan',
			'perkuliahan.matakuliah.nama' => 'Matakuliah',
			'perkuliahan.pertemuan' => 'Pertemuan',
			'perkuliahan_pertemuan' => 'Pertemuan',
			'perkuliahan_tanggal' => 'Tanggal',
			'mahasiswa_id' => 'Mahasiswa',
			'mahasiswa_nama' => 'Nama Mahasiswa',
			'mahasiswa.nim' => 'NIM',
			'mahasiswa_nim' => 'NIM',
			'masuk' => 'Masuk',
			'keluar' => 'Keluar',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->with = array(
			'perkuliahan'=>array(),
			'perkuliahan.matakuliah'=>array(),
			'mahasiswa'=>array(),
			);

		$criteria->compare('id',$this->id, true);
		$criteria->compare('perkuliahan_id',$this->perkuliahan_id, true);
		$criteria->compare('perkuliahan.pertemuan',$this->perkuliahan_pertemuan, true);
		$criteria->compare('perkuliahan.tanggal',$this->perkuliahan_tanggal, true);
		$criteria->compare('perkuliahan.mulai',$this->perkuliahan_mulai, true);
		$criteria->compare('perkuliahan.matakuliah.nama',$this->matakuliah_nama, true);
		$criteria->compare('mahasiswa_id',$this->mahasiswa_id, true);
		$criteria->compare('mahasiswa.nama',$this->mahasiswa_nama, true);
		$criteria->compare('mahasiswa.nim',$this->mahasiswa_nim, true);
		$criteria->compare('masuk',$this->masuk,true);
		$criteria->compare('keluar',$this->keluar,true);
		$criteria->compare('keterangan',$this->keterangan,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Kehadiran the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	protected function afterFind()
	{
		parent::afterFind();

		$toleransi = Yii::app()->params['toleransiKeterlambatan'] * 60;

		$mulai = DateTime::createFromFormat('H:i', $this->perkuliahan->mulai);
		$selesai = DateTime::createFromFormat('H:i', $this->perkuliahan->selesai);
		$masuk = DateTime::createFromFormat('H:i', $this->masuk);
		$keluar = DateTime::createFromFormat('H:i', $this->keluar);

		$keterangan = array();
		$diff = strtotime($this->perkuliahan->mulai) - strtotime($this->masuk);
		if($diff > 0 - $toleransi) {
			$keterangan[] = "Masuk Tepat Waktu";
		}
		else
		{
			$keterangan[] = "Terlambat";
		}
		$diff = strtotime($this->perkuliahan->selesai) - strtotime($this->keluar);
		if($diff > 0)
		{
			$keterangan[] = "Keluar Sesuai Jadwal";
		}
		else
		{
			$keterangan[] = "Keluar Lebih dulu";
		}
		$this->keterangan = implode(', ', $keterangan);

		//$this->lama_di_kelas = gmdate('H:i', strtotime($this->perkuliahan->selesai) -  strtotime($this->masuk));
		$this->lama_di_kelas = $selesai->diff($masuk)->format('%H:%I');
	}
}
