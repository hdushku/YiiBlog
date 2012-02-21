<?php
if(Yii::app()->user->isGuest)
    $this->redirect('/site/login');

$this->pageTitle=Yii::app()->name . ' - Создание страницы';
$this->breadcrumbs=array(
	'Добавление страницы',
);

$this->menu=array(
	array('label'=>'Управление страницами', 'url'=>array('admin')),
);
?>

<h1>Добавление страницы</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>