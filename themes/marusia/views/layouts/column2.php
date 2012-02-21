<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
	
	<div class="span-5 last">
		<div id="sidebar">
                <div id="mainmenu">
                    <?php $this->widget('zii.widgets.CMenu',array(
                        'items'=>array(
                            array('label'=>'Главная', 'url'=>array('/post/index')),
                            array('label'=>'Обо мне', 'url'=>array('/page/view', 'url'=>'obo-mne')),
                            array('label'=>'Контакты', 'url'=>array('/site/contact')),
                            array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
                            array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
                        ),
                    )); ?>
                </div> 
                <?php $this->widget('WTagCloud');?>
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>
    
        <div class="span-19">
                <?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>
		<div id="content">
			<?php echo $content; ?>
		</div><!-- content -->
	</div>
</div>
<?php $this->endContent(); ?>