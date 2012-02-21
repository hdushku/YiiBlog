<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	<div class="span-19">
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
	<div class="span-5 last">
		<div id="sidebar">
            <?php $this->widget('WCategory'); ?>
            <?php $this->widget('WTagCloud');?>
            <div id="recentcomments" class="dsq-widget"><h2 class="dsq-widget-title">Последние комментарии</h2><script type="text/javascript" src="http://belyakov.disqus.com/recent_comments_widget.js?num_items=5&hide_avatars=1&avatar_size=32&excerpt_length=200"></script></div>
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                    'title'=>'Управление',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items'=>$this->menu,
                'htmlOptions'=>array('class'=>'operations'),
            ));
            $this->endWidget();

            //$this->widget('WTwitterList');

            $this->widget('WEmailSubscribe');
            ?>
            <p><a href="http://feeds.feedburner.com/belyakov/mknk"><img src="http://feeds.feedburner.com/~fc/belyakov/mknk?bg=B7D6E7&amp;fg=444444&amp;anim=1" height="26" width="88" style="border:0" alt="" /></a></p>
		</div><!-- sidebar -->
	</div>
</div>
<?php $this->endContent(); ?>