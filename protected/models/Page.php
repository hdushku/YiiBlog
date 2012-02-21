<?php

/**
 * This is the model class for table "{{page}}".
 *
 * The followings are the available columns in table '{{page}}':
 * @property string $id
 * @property string $title
 * @property string $url
 * @property string $text
 * @property string $pageTitle
 * @property string $pageKeywords
 */
class Page extends MyActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Page the static model class
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
		return '{{page}}';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('title', 'required'),
			array('title', 'length', 'max'=>128),
			array('pageTitle, pageKeywords, pageDescription', 'length', 'max'=>250),
			array('text, url', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, title, url, text, pageTitle, pageKeywords, pageDescription, createTime, updateTime', 'safe', 'on'=>'search'),
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
			'id' => 'ID',
			'title' => 'Название',
			'url' => 'Url',
			'text' => 'Текст',
			'pageTitle' => 'Page Title',
			'pageKeywords' => 'Page Keywords',
            'pageDescription' => 'Page Description',
            'createTime' => 'Время создания',
            'updateTime' => 'Последнее обновление'
		);
	}
    
    /**
     * Set up URL attribute
     */
    public function beforeSave() {
        if(parent::beforeSave()) {
            $this->url = $this->translit($this->title);
            if($this->isNewRecord)
                $this->createTime = time();
            else
                $this->updateTime = time();
            return true;
        } else
            return false;
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

		$criteria->compare('id',$this->id,true);
		$criteria->compare('title',$this->title,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('text',$this->text,true);
		$criteria->compare('pageTitle',$this->pageTitle,true);
		$criteria->compare('pageKeywords',$this->pageKeywords,true);
        $criteria->compare('pageDescription',$this->pageDescription,true);
        $criteria->compare('createTime',$this->createTime,true);
        $criteria->compare('updateTime',$this->updateTime,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}