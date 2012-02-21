<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'post-form',
	'enableAjaxValidation'=>false,
        'htmlOptions' => array(
            'enctype'=>'multipart/form-data',
        ),
)); ?>

	<?php echo $form->errorSummary($model); ?>
        <fieldset>

            <legend>Анонс</legend>
            <div class="row">
                <?php echo $form->labelEx($model,'anonceText'); ?>
                <?php $this->widget('application.extensions.tinymce.ETinyMce',
                            array('model' => $model, 'attribute' => 'anonceText','editorTemplate'=>'custom','language'=>'ru', 'height' => '200px')); ?>
                <?php echo $form->error($model,'anonceText'); ?>
            </div>

        </fieldset>
    
        <fieldset>
        
        <legend>Содержание</legend>

        <div class="row clearfix">
            <div class="span-10 left">
                <?php echo $form->labelEx($model,'title'); ?>
                <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
                <?php echo $form->error($model,'title'); ?>
            </div>
            <div>
                <?php echo $form->labelEx($model,'status'); ?>
                <?php echo $form->dropDownList($model, 'status', array('2' => 'Опубликовано', '1'=> 'Черновик', '3' => 'В архив')); ?>
                <?php echo $form->error($model,'status'); ?>
            </div>
        </div>
		
		<div class="row">
            <?php echo $form->labelEx($model, 'url'); ?>
            <?php echo $form->textField($model, 'url', array('size'=>60,'maxlength'=>128)); ?>
            <?php echo $form->error($model, 'url'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'text'); ?>
            <?php $this->widget('application.extensions.tinymce.ETinyMce',
                        array('model' => $model, 'attribute' => 'text','editorTemplate'=>'full','language'=>'ru')); ?>
            <?php echo $form->error($model,'text'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'tags'); ?>
            <?php $this->widget('CAutoComplete', array(
                'model'=>$model,
                'attribute'=>'tags',
                'url'=>array('suggestTags'),
                'multiple'=>true,
                'htmlOptions'=>array('size'=>50),
            )); ?>
            <p class="hint">Разделяйте теги запятыми.</p>
            <?php echo $form->error($model,'tags'); ?>
        </div>
        
    </fieldset>
    
    <fieldset>
        
        <legend>Meta tags</legend>
        <p class="hint">Можно не заполнять</p>

        <div class="row">
            <?php echo $form->labelEx($model,'pageTitle'); ?>
            <?php echo $form->textField($model,'pageTitle',array('size'=>60,'maxlength'=>250)); ?>
            <?php echo $form->error($model,'pageTitle'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'pageKeywords'); ?>
            <?php echo $form->textField($model,'pageKeywords',array('size'=>60,'maxlength'=>250)); ?>
            <?php echo $form->error($model,'pageKeywords'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'pageDescription'); ?>
            <?php echo $form->textField($model,'pageDescription',array('size'=>60,'maxlength'=>250)); ?>
            <?php echo $form->error($model,'pageDescription'); ?>
        </div>
        
    </fieldset>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->