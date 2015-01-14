<?php
/** @var $this Controller */
/** @var $model Post */

$this->pageTitle = "Редактирование записи";

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    $model->title => $model->url,
    $this->pageTitle,
);
?>

    <h1><?= $this->pageTitle ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>