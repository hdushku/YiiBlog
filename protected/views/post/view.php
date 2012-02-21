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
<div class="anonce clearfix">
    <?php echo $model->anonceText; ?>
</div>
<?php echo $model->text; ?>
<br />
<b>Теги:</b> <?php echo implode(', ', $model->tagLinks); ?><br />
<b>Дата:</b> <?php echo date('d.m.y',$model->createTime);?>
<?php $this->widget('application.extensions.WSocialButton', array('style'=>'standard'));?>
<hr />
    <?php $this->widget('WRelatedPost', array('tags' => $model->tags)); ?>
<hr />
<div id="disqus_thread"></div>
<script type="text/javascript">
    /* * * CONFIGURATION VARIABLES: EDIT BEFORE PASTING INTO YOUR WEBPAGE * * */
    var disqus_shortname = 'belyakov'; // required: replace example with your forum shortname

    // The following are highly recommended additional parameters. Remove the slashes in front to use.
    // var disqus_identifier = 'unique_dynamic_id_1234';
    // var disqus_url = 'http://example.com/permalink-to-page.html';

    /* * * DON'T EDIT BELOW THIS LINE * * */
    (function() {
        var dsq = document.createElement('script'); dsq.type = 'text/javascript'; dsq.async = true;
        dsq.src = 'http://' + disqus_shortname + '.disqus.com/embed.js';
        (document.getElementsByTagName('head')[0] || document.getElementsByTagName('body')[0]).appendChild(dsq);
    })();
</script>
<noscript>Please enable JavaScript to view the <a href="http://disqus.com/?ref_noscript">comments powered by Disqus.</a></noscript>
<a href="http://disqus.com" class="dsq-brlink">blog comments powered by <span class="logo-disqus">Disqus</span></a>