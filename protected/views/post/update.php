<?php
$this->pageTitle=Yii::app()->name . ' - Редактирование записи';
$this->breadcrumbs=array(
	$model->title=>array('view','url'=>$model->url),
	'Редактирование',
);

$this->menu=array(
    array('label'=>'Просмотр', 'url'=>array('view', 'url'=>$model->url)),
	array('label'=>'Добавить запись', 'url'=>array('create')),
	array('label'=>'Управление записями', 'url'=>array('admin')),
);
?>

<h1>Редактирование: <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>