<?php
/**
 * Created with love by TXTUP.
 * Date: 14.01.15
 * Time: 18:02
 *
 * @copyright Copyright (c) 2015 "TXTUP OOO" Ltd.
 * @link http://txtup.ru
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('zii.widgets.CPortlet');

/**
 * Some awesome description about class
 *
 * @author Dudarev Ilya <ilya@txtup.ru>
 */
class CategoriesList extends CPortlet
{
    public $title = 'Категории';

    protected function renderContent()
    {
        $dates = [];

        $categories = Category::model()->findAll();

        $items = [];

        foreach ($categories as $category) {
            $items[] = ['label' => "{$category->name} ({$category->postsCount})", 'url' => $category->url];
        }

        $this->widget('zii.widgets.CMenu', ['items' => $items]);
    }
} 