<?php

/**
 * This is the model class for table "{{post}}".
 *
 * The followings are the available columns in table '{{post}}':
 * @property string $id
 * @property string $title
 * @property string $text
 * @property string $tags
 * @property integer $status
 * @property string $pageTitle
 * @property string $pageKeywords
 * @property string $pageDescription
 * @property string $createTime
 * @property string $updateTime
 */
class Post extends MyActiveRecord {
    const STATUS_DRAFT=1;
    const STATUS_PUBLISHED=2;
    const STATUS_ARCHIVED=3;

    private $_oldTags;

    /**
     * Returns the static model of the specified AR class.
     * @return Post the static model class
     */
    public static function model($className=__CLASS__) {
        return parent::model($className);
    }

    /**
     * @return string the associated database table name
     */
    public function tableName() {
        return '{{post}}';
    }

    /**
     * @return array validation rules for model attributes.
     */
    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return array(
            array('title, text, status', 'required'),
            array('status', 'in', 'range' => array(1, 2, 3)),
            array('title', 'length', 'max' => 128),
            array('url', 'length', 'max' => 128),
            array('anonceText', 'safe'),
            array('tags', 'match', 'pattern' => '/^[\w\sА-Яа-я,]+$/u', 'message' => 'Теги могут быть только буквами.'),
            //array('tags', 'normalizeTags'),
            array('pageTitle, pageKeywords, pageDescription', 'length', 'max' => 250),
            // The following rule is used by search().
            // Please remove those attributes that should not be searched.
            array('id, title, text, tags, status, pageTitle, pageKeywords, pageDescription, createTime, updateTime, url', 'safe', 'on' => 'search'),
        );
    }

    /**
     * @return array relational rules.
     */
    public function relations() {
        // NOTE: you may need to adjust the relation name and the related
        // class name for the relations automatically generated below.
        return array(
        );
    }

    /**
     * @return array customized attribute labels (name=>label)
     */
    public function attributeLabels() {
        return array(
            'id' => 'ID',
            'title' => 'Название',
            'text' => 'Текст',
            'url' => 'Url',
            'tags' => 'Теги',
            'status' => 'Статус',
            'pageTitle' => 'Page Title',
            'pageKeywords' => 'Page Keywords',
            'pageDescription' => 'Page Description',
            'createTime' => 'Времся создания',
            'updateTime' => 'Последнее обновление',
            'anonceText' => 'Текст анонса',
        );
    }

    /**
     * Normalizes the user-entered tags.
     */
    public function normalizeTags($attribute, $params) {
        $this->tags = Tag::array2string(array_unique(Tag::string2array($this->tags)));
    }

    /**
     * This is invoked before the record is saved.
     * @return boolean whether the record should be saved.
     */
    protected function beforeSave() {
        if (parent::beforeSave()) {
            if ($this->isNewRecord) {
                $this->createTime = $this->updateTime = time();
                $this->url = $this->translit($this->title);
            } else
                $this->updateTime = time();
            return true;
        }
        else
            return false;
    }

    /**
     * This is invoked after the record is saved.
     */
    protected function afterSave() {
        parent::afterSave();
        Tag::model()->updateFrequency($this->_oldTags, $this->tags);
    }

    /**
     * This is invoked after the record is deleted.
     */
    protected function afterDelete() {
        parent::afterDelete();
        Tag::model()->updateFrequency($this->tags, '');
    }

    /**
     * This is invoked when a record is populated with data from a find() call.
     */
    protected function afterFind() {
        parent::afterFind();
        $this->_oldTags = $this->tags;
    }

    /**
     * Return posts status
     */
    public function getState($id) {
        $st = $this->model()->findByPk($id);
        switch ($st->status) {
            case 1:
                return 'Черновик';
                break;
            case 2:
                return 'Опубликовано';
                break;
            case 3:
                return 'В архиве';
                break;
        }
    }

    /**
     * Return statuses type
     */
    public function getStatuses() {
        return array(
            1 => 'Черновик',
            2 => 'Опубликовано',
            3 => 'В архиве'
        );
    }

    /**
     * @return array a list of links that point to the post list filtered by every tag of this post
     */
    public function getTagLinks() {
        $links = array();
        foreach (Tag::string2array($this->tags) as $tag)
            $links[] = CHtml::link(CHtml::encode($tag), array('post/index', 'tag' => $tag));
        return $links;
    }

    /**
     * Retrieves a list of models based on the current search/filter conditions.
     * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
     */
    public function search() {
        // Warning: Please modify the following code to remove attributes that
        // should not be searched.

        $criteria = new CDbCriteria;

        $criteria->compare('title', $this->title, true);

        $criteria->compare('status', $this->status);

        return new CActiveDataProvider('Post', array(
                    'criteria' => $criteria,
                    'sort' => array(
                        'defaultOrder' => 'status, updateTime DESC',
                    ),
                ));
    }

}