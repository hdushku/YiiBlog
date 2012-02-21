<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'page-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>
    
    <fieldset>
        
        <legend>Содержание</legend>
        
        <div class="row">
            <?php echo $form->labelEx($model,'title'); ?>
            <?php echo $form->textField($model,'title',array('size'=>60,'maxlength'=>128)); ?>
            <p class="hint">Не более 128 символов, без спец. символов</p>
            <?php echo $form->error($model,'title'); ?>
        </div>

        <div class="row">
            <?php echo $form->labelEx($model,'text'); ?>
            <?php $this->widget('application.extensions.tinymce.ETinyMce',
                    array('model' => $model, 'attribute' => 'text','editorTemplate'=>'full','language'=>'ru')); ?>
            <?php echo $form->error($model,'text'); ?>
        </div>
        
    </fieldset>

    <fieldset>
        <legend>Meta Tags</legend>
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