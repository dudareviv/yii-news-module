<?php
/** @var $this Controller */
/** @var $model Post */

$this->pageTitle = "Добавить запись";

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    $this->pageTitle,
);
?>

    <h1><?= $this->pageTitle ?></h1>

<?php echo $this->renderPartial('_form', array('model' => $model)); ?>