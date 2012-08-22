<?php

/**
 * This is the model class for table "posts".
 *
 * The followings are the available columns in table 'posts':
 * @property string $id_post
 * @property string $title
 * @property string $content
 * @property integer $status
 * @property string $imagen
 *
 * The followings are the available model relations:
 * @property Archivos $imagen0
 */
class Post extends CActiveRecord
{
	public $image; //solo no tiene tipo de dato....
	/**
	 * Returns the static model of the specified AR class.
	 * @param string $className active record class name.
	 * @return Post the static model class
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
		return 'posts';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title, content', 'required'),
			array('status', 'numerical', 'integerOnly'=>true),
			array('title', 'length', 'max'=>150),
			array('imagen', 'length', 'max'=>20),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id_post, title, content, status, imagen', 'safe', 'on'=>'search'),
			array('image', 'file', 'types'=>'jpg, gif, png'),
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
			'imagen0' => array(self::BELONGS_TO, 'Archivos', 'imagen'),
		);
	}
	
	public function getImage(){
		$id_imagen = $this->imagen;
		$imagen = Archivo::model()->find('id_archivo=:id_imagen', array(':id_imagen'=>$id_imagen));
		$this->image = imagecreatefromstring(base64_decode($imagen->archivo));
		return $imagen;
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id_post' => 'id',
			'title' => 'Titulo del Post',
			'content' => 'Contenido',
			'status' => 'Estado de Publicacion',
			'imagen' => 'Imagen',
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

		$criteria->compare('id_post',$this->id_post,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('content',$this->content,true);
		$criteria->compare('status',$this->status);
		$criteria->compare('imagen',$this->imagen,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	
	
	public function beforeSave(){
		if($file=CUploadedFile::getInstance($this,'image')){
			$archivo = new Archivo();
			$archivo->nombre = $file->name;
			$archivo->tipo = $file->type;
			$archivo->size = $file->size;
			$archivo->archivo = file_get_contents($file->tempName);
			$archivo->save();
			$this->imagen = $archivo->id_archivo;
        }
		return parent::beforeSave();
	}
}