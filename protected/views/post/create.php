<?php
if(Yii::app()->user->isGuest)
    $this->redirect('/site/login');

$this->pageTitle=Yii::app()->name . ' - Создание записи';
$this->breadcrumbs=array(
	'Добавление записи',
);

$this->menu=array(
	array('label'=>'Управление записями', 'url'=>array('admin')),
);
?>

<h1>Создание записи</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>