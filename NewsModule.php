<?php

/**
 * Надо добавить модуль в конфиг
 * ...
 * 'modules' => array(
 *     'news',
 * ),
 * ...
 *
 * По желанию, можно добавить правила для роутера:
 * ...
 * 'rules' => array(
 *     'news/<year:\d{4}>/<month:\d{2}>' => 'news/post/index',
 *     'news/<year:\d{4}>' => 'news/post/index',
 *     'news/category-<category:\d+>' => 'news/post/index',
 *     ...
 * )
 * ...
 */
class NewsModule extends CWebModule
{
    public $defaultController = 'post';

    public function init()
    {
        // this method is called when the module is being created
        // you may place code here to customize the module or the application

        // import the module-level models and components
        $this->setImport(array(
            'news.models.*',
            'news.components.*',
            'news.helpers.*',
        ));
    }

    public function beforeControllerAction($controller, $action)
    {
        if (parent::beforeControllerAction($controller, $action)) {
            // this method is called before any module controller action is performed
            // you may place customized code here
            return true;
        } else
            return false;
    }
}


