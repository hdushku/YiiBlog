<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="ru" />
    <?php if (!empty($this->pageKeywords) && isset($this->pageDescription)) { ?>
        <meta name="description" content="<?php echo $this->pageDescription; ?>" />
        <meta name="keywords" content="<?php echo $this->pageKeywords; ?>" />
    <?php } else { ?>
        <meta name="description" content="Беляков Юрий, веб-разработка, yii framework, drupal, joomla, freelance" />
        <meta name="keywords" content="Беляков Юрий, веб-разработка, yii framework, drupal, joomla" />
    <?php } ?>

    <meta name="author" content="Беляков" />
    <meta name="Resource-type" content="Document" />
    <meta http-equiv="imagetoolbar" content="no" />
    <meta name="distribution" content="global" />
    <meta http-equiv="Content-language" content="ru" />
    <meta http-equiv="Content-Style-Type" content="text/css" />
    <meta name="copyright" content="belyakov.su" />
    <title><?php echo CHtml::encode($this->pageTitle); ?></title>

    <!-- blueprint CSS framework -->
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
    <!--[if lt IE 8]>
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />    
    
    <?php
    $cs = Yii::app()->clientScript;
    $cs->registerCssFile(Yii::app()->theme->baseUrl . '/css/shCoreDefault.css');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/shCore.js');
    //$cs->registerScriptFile(Yii::app()->baseUrl . '/js/shBrushJScript.js');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/shBrushPhp.js');
    //$cs->registerScriptFile(Yii::app()->baseUrl . '/js/shBrushSql.js');
    $cs->registerScriptFile(Yii::app()->baseUrl . '/js/shBrushCss.js');
    ?>
    <script type="text/javascript">
	SyntaxHighlighter.defaults['toolbar'] = false;
	SyntaxHighlighter.all();
	</script>
	
	<script type="text/javascript">
          var _gaq = _gaq || [];
          _gaq.push(['_setAccount', 'UA-21037189-1']);
          _gaq.push(['_trackPageview']);

          (function() {
            var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
            ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
            var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
          })();

    </script>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::link(Yii::app()->name, '/') . ' - ' . Yii::app()->params['slogan']; ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('WTopMenu'); ?>
	</div><!-- mainmenu -->
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by <a href="http://belyakov.su">belyakov.su</a>.<br/>
        <div class="right">
            <ul>
                <li><a href="http://www.facebook.com/urij.belakov" target="_blank"><img src="../images/social/facebook.png" alt="Facebook"></a></li>
                <li><a href="https://plus.google.com/102126238630864027928/" target="_blank"><img src="../images/social/google-plus.png" alt="Google +"></a></li>
                <li><a href="http://twitter.com/#!/BelyakovYuri" target="_blank"><img src="../images/social/twitter.png" alt="Twitter"></a></li>
                <li><a href="http://vkontakte.ru/id7812342" target="_blank"><img src="../images/social/vk_2.png" alt="Вконтакте"></a></li>
            </ul>
        </div>
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>