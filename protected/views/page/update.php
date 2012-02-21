<?php
$this->pageTitle=Yii::app()->name . ' - Редактирование страницы';
$this->breadcrumbs=array(
	$model->title=>array('view','url'=>$model->url),
	'Редактирование',
);

$this->menu=array(
    array('label'=>'Просмотр', 'url'=>array('view', 'url'=>$model->url)),
	array('label'=>'Добавить страницу', 'url'=>array('create')),
	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Редактирование: <?php echo $model->title; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>