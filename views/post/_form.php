<?php
/** @var $form CActiveForm */
/** @var $model Post */
?>

<div class="form">

    <?php $form = $this->beginWidget('CActiveForm'); ?>

    <p class="note">Fields with <span class="required">*</span> are required.</p>

    <?php echo CHtml::errorSummary($model); ?>

    <div class="row">
        <?php echo $form->labelEx($model, 'title'); ?>
        <?php echo $form->textField($model, 'title', array('size' => 80, 'maxlength' => 128)); ?>
        <?php echo $form->error($model, 'title'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'category_id'); ?>
        <?php echo $form->dropDownList($model, 'category_id', CHtml::listData(Category::model()->findAll(), 'id', 'name'), ['prompt'=>'-- Выбрать категорию --']) ?>
        <?php echo $form->error($model, 'category_id'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'content'); ?>
        <?php echo CHtml::activeTextArea($model, 'content', array('rows' => 10, 'cols' => 70)); ?>
        <p class="hint">You may use <a target="_blank" href="http://daringfireball.net/projects/markdown/syntax">Markdown
                syntax</a>.</p>
        <?php echo $form->error($model, 'content'); ?>
    </div>

    <div class="row">
        <?php echo $form->labelEx($model, 'published_at'); ?>
        <?php
        $this->widget('zii.widgets.jui.CJuiDatePicker', array(
            'model' => $model,
            'attribute' => 'published_at',
            // additional javascript options for the date picker plugin
            'options' => array(
                'showAnim' => 'fold',
                'dateFormat' => 'yy-mm-dd',
            ),
            'htmlOptions' => array(
                'style' => 'height:20px;'
            ),
        ));
        ?>
        <?php echo $form->error($model, 'published_at'); ?>
    </div>

    <div class="row buttons">
        <?php echo CHtml::submitButton($model->isNewRecord ? 'Создать' : 'Save'); ?>
    </div>

    <?php $this->endWidget(); ?>

</div><!-- form -->