<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->pageTitle = CHtml::encode($model->name);

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    'Категории' => array('index'),
    $this->pageTitle,
);
?>

<h1><?= $this->pageTitle ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'id',
        'name',
    ),
)); ?>
