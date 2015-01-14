<?php
/** @var $this Controller */
/** @var $model Post */

$this->pageTitle = "Админка записей";

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    $this->pageTitle,
);
?>
<h1><?= $this->pageTitle ?></h1>

<p>
    You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
    or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
    'dataProvider' => $model->search(),
    'filter' => $model,
    'columns' => array(
        array(
            'name' => 'title',
            'type' => 'raw',
            'value' => 'CHtml::link(CHtml::encode($data->title), $data->url)'
        ),
        array(
            'name' => 'published_at',
            'type' => 'datetime',
            'filter' => false,
        ),
        array(
            'class' => 'CButtonColumn',
        ),
    ),
)); ?>
