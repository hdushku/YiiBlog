<div class="post">
	<div class="title">
        <h1><?php echo CHtml::link(CHtml::encode($data->title), array('post/view', 'url'=>$data->url)); ?></h1>
	</div>
	<div class="content">
        <?php echo $data->anonceText; ?>
        <div class="clear"></div>
        <span class="more"><?php echo CHtml::link('Читать дальше &rarr;', array('post/view', 'url'=>$data->url)); ?></span>
    </div><br />
	<div class="nav">
        <b>Теги:</b>
        <?php echo implode(', ', $data->tagLinks); ?>
	</div>
    <div class="author">
        <?php echo date('d.m.y',$data->createTime); ?>
    </div><br />
    <div class="clearfix">&nbsp;</div>
    <hr />
</div>
