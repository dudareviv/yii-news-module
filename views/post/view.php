<?php
/** @var $this Controller */
/** @var $model Post */

$this->pageTitle = CHtml::encode($model->title);

$this->breadcrumbs = array(
    'Новости' => '/news/post/index',
    $this->pageTitle,
);
?>

<div class="post">
    <h1><?= $this->pageTitle; ?></h1>

    <div class="author">
        Опубликовано <?= Yii::app()->dateFormatter->format('d.MM.yyyy', strtotime($model->published_at)); ?> |
        <?= CHtml::link($model->category->name, $model->category->url); ?>
    </div>
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo $model->content;
        $this->endWidget();
        ?>
        <?= CHtml::link('Все новости', ['/news/post/index'], ['class' => 'read-more']) ?>
    </div>
</div>