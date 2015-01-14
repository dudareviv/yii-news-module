<?php
/* @var $this CategoryController */
/* @var $dataProvider CActiveDataProvider */

$this->pageTitle = "Категории";

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    $this->pageTitle,
);
?>

<h1><?= $this->pageTitle ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
)); ?>
