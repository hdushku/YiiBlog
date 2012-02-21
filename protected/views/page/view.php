<?php
// Setup title, meta keywords and meta description
if(!empty($model->pageTitle))
    $this->pageTitle = $model->pageTitle . ' - Беляков Юрий, веб-разработка, yii framework, drupal, joomla';
else 
    $this->pageTitle=Yii::app()->name . ' - ' . $model->title . ' - Беляков Юрий, веб-разработка, yii framework, drupal, joomla';

if(!empty($model->pageKeywords))
    $this->pageKeywords = $model->pageKeywords;

if(!empty($model->pageDescription))
    $this->pageDescription = $model->pageDescription;

$this->breadcrumbs=array(
	$model->title,
);

if(!Yii::app()->user->isGuest) {
    $this->menu=array(
        array('label'=>'Редактировать', 'url'=>array('update', 'url'=>$model->url)),
    );
}
?>

<h1><?php echo $model->title; ?></h1>

<?php echo $model->text; ?>
