<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');

// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'belyakov.su',
    'language' => 'ru',
    'defaultController' =>'PostController',

	// preloading 'log' component
	'preload'=>array('log'),

	// autoloading model and component classes
	'import'=>array(
		'application.models.*',
		'application.components.*',
	),

	'modules'=>array(
                'jkh',
		// uncomment the following to enable the Gii tool
		/*'gii'=>array(
			'class'=>'system.gii.GiiModule',
			'password'=>'',
		 	// If removed, Gii defaults to localhost only. Edit carefully to taste.
			'ipFilters'=>array('127.0.0.1','::1'),
		),*/
	),

    'controllerMap'=>array(
        'sitemap'=>array(
            'class'=>'ext.sitemapgenerator.SGController',
            'config'=>array(
                'sitemap.xml'=>array(
                    'aliases'=>array(
                        'application.controllers',
                    ),
                ),
            ),
        ),
    ),

	// application components
	'components'=>array(
		'user'=>array(
			// enable cookie-based authentication
			'allowAutoLogin'=>true,
		),
		// uncomment the following to enable URLs in path-format
		'urlManager'=>array(
			'urlFormat'=>'path',
            'showScriptName' => false,
			'rules'=>array(
                            '/' => 'post/index',
                            // Page
                            'page/<url>'=>'page/view',              
                            'page/update/<url>' => 'page/update',
                            //Post
                            'content/<url>'=>'post/view',
                            'post/update/<url>'=>'post/update',
                            'kontakti' => 'site/contact',
            //				'<controller:\w+>/<id:\d+>'=>'<controller>/view',
            //				'<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
            //				'<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            //                '<url:\w+>'=>'page/view',
            //                'page/update/<url:\w+>'=>'page/update'
                            //'<url:\w+>' => 'pages/view',
			),
		),
		// uncomment the following to use a MySQL database
		
		'db'=>array(
			'connectionString' => 'mysql:host',
			'emulatePrepare' => true,
			'username' => '',
			'password' => '',
			'charset' => 'utf8',
            'tablePrefix' => 'blg_',
		),
		
		'errorHandler'=>array(
			// use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
		'log'=>array(
			'class'=>'CLogRouter',
			'routes'=>array(
				array(
					'class'=>'CFileLogRoute',
					'levels'=>'error, warning',
				),
				// uncomment the following to show log messages on web pages
//				array(
//					'class'=>'CWebLogRoute',
//				),
				
			),
		),
	),

	// application-level parameters that can be accessed
	// using Yii::app()->params['paramName']
	'params'=>array(
		// this is used in contact page
		'adminEmail'=>'belyakov.u@gmail.com',
                'postsPerPage'=>10,
                'author' => 'Беляков Юрий',
                'slogan' => 'Блог о веб-разработке'
	),
);