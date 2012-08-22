<?php

/**
 * This is the model class for table "users".
 *
 * The followings are the available columns in table 'users':
 * @property string $id_usuario
 * @property string $username
 * @property string $password
 * @property string $nombre
 * @property string $mail
 * @property string $fono_contacto
 * @property integer $rol
 */
class Users extends CActiveRecord
{
	public function beforeSave() {
		$this->password = $this->hashPassword($this->password);
		return true;
	 }
	 
	 public function validatePassword($password){
		return $this->hashPassword($password) === $this->password;
	 }

	 public function hashPassword($password){
		return sha1($password);
	 }

	/*
	 -------------------------------------------------------------------------------------------------------------
	*/


	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Users the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'users';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('username, password', 'required'),
			array('rol', 'numerical', 'integerOnly'=>true),
			array('username, nombre, mail', 'length', 'max'=>50),
			array('password', 'length', 'max'=>40),
			array('fono_contacto', 'length', 'max'=>15),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_usuario, username, password, nombre, mail, fono_contacto, rol', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_usuario' => 'Id Usuario',
			'username' => 'Username',
			'password' => 'Password',
			'nombre' => 'Nombre',
			'mail' => 'Mail',
			'fono_contacto' => 'Fono Contacto',
			'rol' => 'Rol',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id_usuario',$this->id_usuario,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('password',$this->password,true);
		$criteria->compare('nombre',$this->nombre,true);
		$criteria->compare('mail',$this->mail,true);
		$criteria->compare('fono_contacto',$this->fono_contacto,true);
		$criteria->compare('rol',$this->rol);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}