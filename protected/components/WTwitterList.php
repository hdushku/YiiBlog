<?php

Yii::import('zii.widgets.CPortlet');

class WTwitterList extends CPortlet
{
	public $title='Twitter';
    private $_userName = 'BelyakovYuri';
	public $maxTwitts=4;
    public $htmlOptions=array('class'=>'twitterList');

	protected function renderContent()
	{
		$twitts = simplexml_load_file('http://twitter.com/statuses/user_timeline/'.$this->_userName.'.rss');
        $count = 4;
        for($i=0; $i<$count; $i++){
            echo $twitts->channel->item[$i]->title.'<br />';
            echo '<a href="'.$twitts->channel->item[$i]->link.'" target="_blank">Twitter</a>';
            echo ' '.date('d.m.y',strtotime($twitts->channel->item[$i]->pubDate)).'<br /><br />';
        }
	}
}