<?php

Yii::import('zii.widgets.CPortlet');

class WCategory extends CPortlet {
    public $title = 'Рубрики';
    
    public function renderContent() {
        $tags=array(
            'Yii' => 'yii',
            'PHP' => 'php',
            'Книги' => 'книги',
        );
        echo CHtml::openTag('ul', array('class'=>'operations'));
        foreach($tags as $k=>$v) {
            $link=CHtml::link(CHtml::encode($k), array('/post/index','tag'=>$v));
            echo CHtml::tag('li', array(), $link);
        }
        echo CHtml::closeTag('ul');
    }
    
}
