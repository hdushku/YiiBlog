<?php
if(Yii::app()->user->isGuest)
    $this->redirect('/site/login');

$this->pageTitle=Yii::app()->name . ' - Управление записями';
$this->breadcrumbs=array(
	'Управление записями',
);

$this->layout = 'column1';
?>

<h1>Управление записями</h1>

<?php echo CHtml::link('Добавить запись', array('create')); ?>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'post-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'title',
		'url',
        array(
            'name'=>'status',
            'value'=>'Post::model()->getState($data->id)',
            //'filter'=>'Post::model()->getStatuses()',
        ),
		array(
            'name'=>'createTime',
            'value'=>'date("d.m.y в H:i", $data->createTime)'
        ),
		array(
			'class'=>'CButtonColumn',
            'updateButtonUrl' => 'Yii::app()->controller->createUrl("update",array("url"=>$data->url))',
            'viewButtonUrl' => 'Yii::app()->controller->createUrl("view",array("url"=>$data->url))',
            'deleteButtonUrl' => 'Yii::app()->controller->createUrl("delete",array("url"=>$data->url))',
		),
	),
)); ?>
