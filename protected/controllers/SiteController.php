<?php

class SiteController extends Controller
{
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
//			'page'=>array(
//				'class'=>'CViewAction',
//			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		// renders the view file 'protected/views/site/index.php'
		// using the default layout 'protected/views/layouts/main.php'
		$this->render('index');
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
	    if($error=Yii::app()->errorHandler->error)
	    {
	    	if(Yii::app()->request->isAjaxRequest)
	    		echo $error['message'];
	    	else
	        	$this->render('error', $error);
	    }
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$headers="From: {$model->email}\r\nReply-To: {$model->email}";
				mail(Yii::app()->params['adminEmail'],$model->subject,$model->body . "\n\nName: {$model->name}\nSubject:{$model->subject}\nE-mail: {$model->email}",$headers);
				Yii::app()->user->setFlash('contact','Спасибо за сообщение! Я обязательно Вам отвечу!');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

    // Генерируем sitemap.xml
    public function actionSitemap() {
        $pages = Page::model()->findAll('id != 3');
        $posts = Post::model()->findAll('status=2 ORDER BY createTime DESC');

        $xml = new DOMDocument('1.0', 'utf-8');
        $urlset = $xml->appendChild($xml->createElement('urlset'));
        $urlset->setAttribute('xmlns:xsi','http://www.w3.org/2001/XMLSchema-instance');
        $urlset->setAttribute('xsi:schemaLocation','http://www.sitemaps.org/schemas/sitemap/0.9 http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd');
        $urlset->setAttribute('xmlns','http://www.sitemaps.org/schemas/sitemap/0.9');

        foreach($pages as $page) {
            $lastmod_value = date('Y-m-d', $page->createTime);
            $url = $urlset->appendChild($xml->createElement('url'));
            $loc = $url->appendChild($xml->createElement('loc'));
            $lastmod = $url->appendChild($xml->createElement('lastmod'));
            $changefreq = $url->appendChild($xml->createElement('changefreq'));
            $priority = $url->appendChild($xml->createElement('priority'));
            $loc->appendChild($xml->createTextNode('http://belyakov.su/page/'.$page->url));
            $lastmod->appendChild($xml->createTextNode($lastmod_value));
            $changefreq->appendChild($xml->createTextNode('monthly'));
            $priority->appendChild($xml->createTextNode('0.5'));
        }
        foreach($posts as $post) {
            $lastmod_value = date('Y-m-d', $post->createTime);
            $url = $urlset->appendChild($xml->createElement('url'));
            $loc = $url->appendChild($xml->createElement('loc'));
            $lastmod = $url->appendChild($xml->createElement('lastmod'));
            $changefreq = $url->appendChild($xml->createElement('changefreq'));
            $priority = $url->appendChild($xml->createElement('priority'));
            $loc->appendChild($xml->createTextNode('http://belyakov.su/content/'.$post->url));
            $lastmod->appendChild($xml->createTextNode($lastmod_value));
            $changefreq->appendChild($xml->createTextNode('monthly'));
            $priority->appendChild($xml->createTextNode('0.5'));
        }

        $xml->formatOutput = true;
        $xml->save($_SERVER['DOCUMENT_ROOT'].'/assets/sitemap.xml');
    }

    // Генерируем rss.xml
    public function actionRss() {
        $posts = Post::model()->findAll('status=2 ORDER BY createTime DESC LIMIT 10');

        $xml = new DOMDocument('1.0', 'utf-8');
        $rss = $xml->appendChild($xml->createElement('rss'));
        $rss->setAttribute('version', '2.0');
        $channel = $rss->appendChild($xml->createElement('channel'));
        $title = $channel->appendChild($xml->createElement('title'));
        $title->appendChild($xml->createTextNode('Блог о веб-разработке'));
        $link = $channel->appendChild($xml->createElement('link'));
        $link->appendChild($xml->createTextNode('http://belyakov.su/rss.xml'));
        $description = $channel->appendChild($xml->createElement('description'));
        $description->appendChild($xml->createTextNode('Yii framework, Drupal, Wordpress, блог о веб-разработке'));
        $language = $channel->appendChild($xml->createElement('language'));
        $language->appendChild($xml->createTextNode('ru'));

        foreach($posts as $post) {
            $item = $channel->appendChild($xml->createElement('item'));
            $title = $item->appendChild($xml->createElement('title'));
            $title->appendChild($xml->createTextNode($post->title));
            $guid = $item->appendChild($xml->createElement('guid'));
            $guid->appendChild($xml->createTextNode('http://belyakov.su/content/'.$post->url));
            $link = $item->appendChild($xml->createElement('link'));
            $link->appendChild($xml->createTextNode('http://belyakov.su/content/'.$post->url));
            $description = $item->appendChild($xml->createElement('description'));
            $description->appendChild($xml->createTextNode($post->text));
        }

        $xml->formatOutput = true;
        $xml->save($_SERVER['DOCUMENT_ROOT'].'/assets/rss.xml');
    }

	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new LoginForm;

		// if it is ajax validation request
		if(isset($_POST['ajax']) && $_POST['ajax']==='login-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if(isset($_POST['LoginForm']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}
}
