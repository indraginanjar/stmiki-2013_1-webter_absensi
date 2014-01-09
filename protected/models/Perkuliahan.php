<?php

/**
 * This is the model class for table "tbl_perkuliahan".
 *
 * The followings are the available columns in table 'tbl_perkuliahan':
 * @property integer $id
 * @property integer $matakuliah_id
 * @property integer $pertemuan
 * @property string $tanggal
 * @property string $mulai
 * @property string $selesai
 *
 * The followings are the available model relations:
 * @property Matakuliah $matakuliah
 * @property Kehadiran[] $kehadirans
 */
class Perkuliahan extends CActiveRecord
{
	public $matakuliah_nama;
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tbl_perkuliahan';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('matakuliah_id, pertemuan, tanggal, mulai, selesai', 'required'),
			array('matakuliah_id, pertemuan', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, matakuliah_id, pertemuan, tanggal, mulai, selesai, matakuliah_nama', 'safe', 'on'=>'search'),
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
			'matakuliah' => array(self::BELONGS_TO, 'Matakuliah', 'matakuliah_id'),
			'kehadirans' => array(self::HAS_MANY, 'Kehadiran', 'perkuliahan_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'matakuliah_id' => 'Matakuliah',
			'matakuliah_nama' => 'Nama Matakuliah',
			'pertemuan' => 'Pertemuan',
			'tanggal' => 'Tanggal',
			'mulai' => 'Mulai',
			'selesai' => 'Selesai',
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

		$criteria->compare('id',$this->id);
		$criteria->compare('matakuliah_id',$this->matakuliah_id);
		$criteria->compare('matakuliah.nama',$this->matakuliah_nama,true);
		$criteria->compare('pertemuan',$this->pertemuan);
		$criteria->compare('tanggal',$this->tanggal,true);
		$criteria->compare('mulai',$this->mulai,true);
		$criteria->compare('selesai',$this->selesai,true);

		$criteria->with = array(
			'matakuliah'=>array(),
			);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Perkuliahan the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
