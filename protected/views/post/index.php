<?php
if(isset($_GET['tag']))
	$this->pageTitle=Yii::app()->name. ' - ' . $_GET['tag'] . ' - Беляков Юрий, веб-разработка, yii framework, drupal, joomla';
else
	$this->pageTitle=Yii::app()->name. ' - Беляков Юрий, веб-разработка, yii framework, drupal, joomla';

if(!Yii::app()->user->isGuest) {
    $this->menu=array(
        array('label'=>'Добавить  запись', 'url'=>array('post/create')),
        array('label'=>'Управление записями', 'url'=>array('post/admin')),
        array('label'=>'Управление страницами', 'url'=>array('page/admin')),
        array('label'=>'Оплата ЖКХ', 'url'=>array('/jkh')),
    );
}
?>

<?php if(!empty($_GET['tag'])): ?>
<h1>Записи с тегом: <i><?php echo CHtml::encode($_GET['tag']); ?></i></h1>
<?php endif; ?>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'id' => 'postList',
	'itemView'=>'_view',
	'template'=>"{items}\n{pager}",
        'pager' => array(
            'header' => '',
        ),
)); ?>