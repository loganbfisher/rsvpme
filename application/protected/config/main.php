<?php

// uncomment the following to define a path alias
// Yii::setPathOfAlias('local','path/to/local-folder');
// This is the main Web application configuration. Any writable
// CWebApplication properties can be configured here.
return array(
    'basePath' => dirname(__FILE__) . DIRECTORY_SEPARATOR . '..',
    'name' => 'evitepad.com',
    // preloading 'log' component
    'preload' => array('log'),
    // autoloading model and component classes
    'import' => array(
        'application.models.*',
        'application.components.*',
        'application.modules.user.models.*',
        'application.modules.user.components.*',
        'application.helpers.*',
    ),

    'modules' => array(
        'user'=>array(
            # encrypting method (php hash function)
            'hash' => 'md5',

            # send activation email
            'sendActivationMail' => true,

            # allow access for non-activated users
            'loginNotActiv' => false,

            # activate user on registration (only sendActivationMail = false)
            'activeAfterRegister' => false,

            # automatically login from registration
            'autoLogin' => true,

            # registration path
            'registrationUrl' => array('/user/registration'),

            # recovery password path
            'recoveryUrl' => array('/user/recovery'),

            # login form path
            'loginUrl' => array('/user/login'),

            # page after login
            'returnUrl' => array('/user/profile'),

            # page after logout
            'returnLogoutUrl' => array('/user/login'),
        ),
        'gii' => array(
            'class' => 'system.gii.GiiModule',
            'password' => 'red285977',
        // If removed, Gii defaults to localhost only. Edit carefully to taste.
        //'ipFilters'=>array('127.0.0.1','::1'),
        ),
    ),
    // application components
    'components' => array(
        'user'=>array(
            // enable cookie-based authentication
            'class' => 'WebUser',
            'allowAutoLogin'=>true,
            'loginUrl' => array('/user/login'),
        ),
        'urlManager'=>array(
                  'urlFormat'=>'path',
                  'showScriptName'=>false,
                  'rules'=>array(
                          'users/<username:\w+>/addAsFriend'=>'user_friend/create',
                          'friend/<username:\w+>/delete'=>'user_friend/delete',
                          'users/<username:\w+>/friends'=>'user_friend/index',
                          'users/<username:\w+>/edit'=>'users/update',
                          'users/<username:\w+>'=>'users/view',
                          'users/<username:\w+>/findfriends'=>'users/index',
                          '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                          '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                          '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
                  ),
          ),

        'db' => array(
            'connectionString' => 'mysql:host=127.0.0.1;dbname=rsvpme',
            'username' => 'root',
            'password' => '',
            'emulatePrepare' => true, // needed by some MySQL installations
            'charset' => 'utf8',
        ),
        'errorHandler' => array(
            // use 'site/error' action to display errors
            'errorAction' => 'site/error',
        ),
        'log' => array(
            'class' => 'CLogRouter',
            'routes' => array(
                array(
                    'class' => 'CFileLogRoute',
                    'levels' => 'error, warning',


                ),
            // uncomment the following to show log messages on web pages
            /*
              array(
              'class'=>'CWebLogRoute',
              ),
             */
            ),
        ),

    ),

    // application-level parameters that can be accessed
    // using Yii::app()->params['paramName']
    'params' => array(
        // this is used in contact page
        'adminEmail' => 'loganbfisher@gmail.com',
    ),
);