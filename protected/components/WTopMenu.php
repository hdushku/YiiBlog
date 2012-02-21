<?php

class WTopMenu extends CWidget {
    
    public function init() {
        $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Главная', 'url'=>array('/post/index')),
				array('label'=>'Обо мне', 'url'=>array('/page/view', 'url'=>'obo-mne')),
				array('label'=>'Книги', 'url'=>array('/page/view', 'url'=>'knigi')),
				array('label'=>'Контакты', 'url'=>array('/site/contact')),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		));
    }
    
}