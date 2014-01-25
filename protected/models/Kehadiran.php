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
	private $tahun_minggu_select;

	public $matakuliah_nama;
	public $mahasiswa_nama;
	public $mahasiswa_nim;
	public $perkuliahan_tanggal;
	public $perkuliahan_pertemuan;
	public $perkuliahan_mulai;
	public $keterangan;
	public $lama_di_kelas;
	public $bulan_tahun;
	public $bulan;
	public $tahun;
	public $tahun_minggu;
	public $tahun_bulan;
	public $number;

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
				perkuliahan_mulai,
				perkuliahan.mulai,
				bulan_tahun,
				bulan,
				tahun,
				tahun_minggu,
				keterangan,
				lama_di_kelas,
				number,
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
			'bulan_tahun' => 'Bulan Tahun',
			'number' => 'No',
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

		$number_select = '(
				select count(*)
				from tbl_kehadiran
				where tbl_kehadiran.id <= t.id
			)';

		$tahun_minggu_select = '(
				substr(
					"0000" 
					|| (
						strftime("%Y", perkuliahan.tanggal)
						)
					, -4
					,4
					) 
				|| "-" 
				|| (
					substr(
						"00" 
						|| (
							strftime("%W", perkuliahan.tanggal) + (1 - strftime("%W", strftime("%Y", perkuliahan.tanggal) || "-01-04"))
							)
						, -2
						,2
						)
					)
				)
			';

		$tahun_bulan_select = '(
				substr(
					"0000" 
					|| (
						strftime("%Y", perkuliahan.tanggal)
						)
					, -4
					,4
					) 
				|| "-" 
				|| (
					substr(
						"00" 
						|| (
							strftime("%m", perkuliahan.tanggal)
							)
						, -2
						,2
						)
					)
				)
			';

		$keterangan_select = 'case
				when strftime("%s", perkuliahan.mulai) - strftime("%s", t.masuk) >= 0 
					then 
						case 
							when strftime("%s", perkuliahan.mulai) - strftime("%s", t.keluar) > 0 
								then "Datang lebih dulu, Tidak masuk kuliah"
							when strftime("%s", perkuliahan.selesai) - strftime("%s", t.keluar) <= 0 
								then "Masuk tepat waktu, Keluar sesuai jadwal"
						else
							"Masuk tepat waktu, Keluar lebih awal"
						end
				else
					case 
						when strftime("%s", perkuliahan.selesai) - strftime("%s", t.masuk) < 0 
							then "Terlambat masuk, Tidak masuk kuliah"
						when strftime("%s", perkuliahan.selesai) - strftime("%s", t.keluar) >= 0 
							then "Terlambat masuk, Keluar sesuai jadwal"
					else
						"Terlambat masuk, Keluar lebih awal"
					end
				end
			';
//		$lama_di_kelas_select = 't.keluar - perkuliahan.mulai';

		$lama_di_kelas_select = '(
				substr(
					"00" 
					|| ((strftime("%s", t.keluar) - strftime("%s", perkuliahan.mulai)) / 3600)
					, -2
					,2
					)
				)
			|| ":" 
			|| (
				substr(
					"00" 
					|| (((strftime("%s", t.keluar) - strftime("%s", perkuliahan.mulai)) / 60) % 60)
					, -2
					, 2
					)
				)
			';

		$criteria->select = array(
			$number_select . ' as number',
			't.*',
			'strftime("%W", perkuliahan.tanggal) + (1 - strftime("%W", strftime("%Y", perkuliahan.tanggal) || "-01-04")) as minggu',
			'strftime("%Y", perkuliahan.tanggal) as tahun',
			$tahun_minggu_select . ' as tahun_minggu',
			$tahun_bulan_select . ' as tahun_bulan',
			'strftime("%M-%Y", perkuliahan.tanggal) as bulan_tahun',
			'strftime("%m", perkuliahan.tanggal) as bulan',
			$lama_di_kelas_select . ' as lama_di_kelas',
			$keterangan_select . ' as keterangan',
			);
		//$criteria->select = "t.*, (strftime('%W', perkuliahan.tanggal)) minggu";
		//$criteria->select = array('t.*', 'concat(perkuliahan.tanggal, "gad") as minggu');
		//$criteria->select = new CDbExpression('t.*, strftime("%W", perkuliahan.tanggal) + (1 - strftime("%W", strftime("%Y", perkuliahan.tanggal) || "-01-04")) as minggu');

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
		$criteria->compare($keterangan_select, $this->keterangan,true);
		$criteria->compare('bulan',$this->bulan,true);
		$criteria->compare('tahun',$this->tahun,true);
		$criteria->compare($number_select,$this->number,true);
		$criteria->compare($tahun_bulan_select,$this->tahun_bulan,true);

		if(!empty($_POST['bulan_tahun']))
		{
			$time_param = explode('-', $_POST['bulan_tahun']);
			$criteria->condition = 'strftime("%Y", perkuliahan.tanggal) = :tahun and strftime("%m", perkuliahan.tanggal) = :bulan';
			$criteria->params = array(
				':bulan'=>$time_param[0],
				':tahun'=>$time_param[1],
				);
		}

		if(!empty($_POST['tahun_minggu']))
		{
			$time_param = explode('-', $_POST['tahun_minggu']);
			$criteria->condition = $tahun_minggu_select . ' = :tahun_minggu';
			$criteria->params = array(
				':tahun_minggu'=>$_POST['tahun_minggu'],
				);
		}
		$criteria->compare('bulan_tahun', $this->bulan_tahun);
		$criteria->compare($tahun_minggu_select, $this->tahun_minggu, true);
		$criteria->compare($lama_di_kelas_select, $this->lama_di_kelas, true);

		$sort = new CSort;
		$sort->attributes = array(
			'*',
			'mahasiswa.nim'=>array(),
			'mahasiswa.nama'=>array(),
			'lama_di_kelas'=>array(),
			'tahun_minggu'=>array(),
			'keterangan'=>array(),
			'number'=>array(),
			);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
			'sort'=>$sort,
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

		$toleransi = Yii::app()->params['toleransiKeterlambatan'] * 60;
/*
		$mulai = DateTime::createFromFormat('H:i', $this->perkuliahan->mulai);
		$selesai = DateTime::createFromFormat('H:i', $this->perkuliahan->selesai);
		$masuk = DateTime::createFromFormat('H:i', $this->masuk);
		$keluar = DateTime::createFromFormat('H:i', $this->keluar);
		//$tanggal = DateTime::createFromFormat('Y-m-d', $this->perkuliahan->tanggal);
		$this->bulan_tahun = $tanggal->format('m-Y');
*/
		parent::afterFind();
	}
}
