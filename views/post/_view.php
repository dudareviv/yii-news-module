<?php
/** @var $this Controller */
/** @var $data Post */
?>

<div class="post">
    <div class="title">
        <?= CHtml::link(CHtml::encode($data->title), $data->url) ?>
    </div>
    <div class="author">
        Опубликовано <?= Yii::app()->dateFormatter->format('d.MM.yyyy', strtotime($data->published_at)); ?> |
        <?= CHtml::link($data->category->name, $data->category->url); ?>
    </div>
    <div class="content">
        <?php
        $this->beginWidget('CMarkdown', array('purifyOutput' => true));
        echo Shortify::process($data->content, CHtml::link('Читать далее', $data->url, ['class' => 'read-more']), 256);
        $this->endWidget();
        ?>
    </div>
</div>
