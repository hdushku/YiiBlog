<?php
if(Yii::app()->user->isGuest)
    $this->redirect('/site/login');

$this->pageTitle=Yii::app()->name . ' - Управление страницами';
$this->breadcrumbs=array(
	'Управление страницами',
);

$this->layout = 'column1';
?>

<h1>Управление страницами</h1>

<?php echo CHtml::link('Добавить страницу', array('create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'page-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
        'url',
        array('header'=>'Время создания', 'value'=>'date("d.m.y", $data->createTime)'),
        array('header'=>'Последнее обновление', 'value'=>'($data->updateTime) ? date("d.m.y", $data->updateTime) : ""'),
		array(
			'class'=>'CButtonColumn',
            'updateButtonUrl' => 'Yii::app()->controller->createUrl("update",array("url"=>$data->url))',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("view",array("url"=>$data->url))',
            'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete",array("url"=>$data->url))',
		),
	),
)); ?>
