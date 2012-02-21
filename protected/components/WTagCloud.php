<?php

Yii::import('zii.widgets.CPortlet');

class WTagCloud extends CPortlet
{
	public $title='Облако тегов';
	public $maxTags=20;
        public $htmlOptions=array('class'=>'tagCloud');

	protected function renderContent()
	{
		$tags=Tag::model()->findTagWeights($this->maxTags);

		foreach($tags as $tag=>$weight)
		{
			$link=CHtml::link(CHtml::encode($tag), array('/post/index','tag'=>$tag));
			echo CHtml::tag('span', array(
				'class'=>'tag',
				'style'=>"font-size:{$weight}pt",
			), $link)."\n";
		}
	}
}