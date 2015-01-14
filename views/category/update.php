<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->pageTitle = "Обновить";

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    'Категории' => array('index'),
    CHtml::encode($model->name) => $model->url,
    $this->pageTitle,
);
?>

    <h1><?= $this->pageTitle ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>