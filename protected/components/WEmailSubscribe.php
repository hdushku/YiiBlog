<?php

Yii::import('zii.widgets.CPortlet');

class WEmailSubscribe extends CPortlet
{
	public $title='Rss';

	protected function renderContent()
	{ ?>
    <form style="border:1px solid #ccc;padding:3px;text-align:center;" action="http://feedburner.google.com/fb/a/mailverify" method="post" target="popupwindow" onsubmit="window.open('http://feedburner.google.com/fb/a/mailverify?uri=belyakov/mknk', 'popupwindow', 'scrollbars=yes,width=550,height=520');return true"><p>Подпишитесь на обновление</p><p><input type="text" style="width:140px" name="email"/></p><input type="hidden" value="belyakov/mknk" name="uri"/><input type="hidden" name="loc" value="ru_RU"/><input type="submit" value="Подписаться" /></form>
<?php }
}