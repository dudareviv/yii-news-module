<?php

Yii::import('zii.widgets.CPortlet');

class NewsMenu extends CPortlet
{
    /**
     * Array of menu items.
     * @var array
     */
    public $menu = [];

    protected function renderContent()
    {
        $this->widget('zii.widgets.CMenu', array(
            'items' => $this->menu,
            'htmlOptions' => array('class' => 'operations'),
        ));
    }
}