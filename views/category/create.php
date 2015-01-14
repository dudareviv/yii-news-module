<?php
/* @var $this CategoryController */
/* @var $model Category */

$this->pageTitle = "Добавить категорию";

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    'Категории' => array('index'),
    $this->pageTitle,
);
?>

    <h1><?= $this->pageTitle ?></h1>

<?php $this->renderPartial('_form', array('model' => $model)); ?>