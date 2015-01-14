<?php
/** @var $this Controller */
?>

<?php $this->beginContent('application.views.layouts.main'); ?>
    <div class="container">
        <div class="span-6 last">
            <div id="sidebar">
                <?php
                if (!Yii::app()->user->isGuest) {
                    $this->widget('NewsMenu', [
                        'title' => 'Новости',
                        'menu' => [
                            ['label' => 'Записи', 'items' => [
                                ['label' => 'Смотреть все', 'url' => ['/news/post']],
                                ['label' => 'Админка', 'url' => ['/news/post/admin']],
                                ['label' => 'Добавить', 'url' => ['/news/post/create']]
                            ]],
                            ['label' => 'Категории', 'items' => [
                                ['label' => 'Смотреть все', 'url' => ['/news/category']],
                                ['label' => 'Админка', 'url' => ['/news/category/admin']],
                                ['label' => 'Добавить', 'url' => ['/news/category/create']]
                            ]],
                        ]
                    ]);
                }

                $this->widget('DatesList');

                $this->widget('CategoriesList');
                ?>
            </div>
            <!-- sidebar -->
        </div>
        <div class="span-18">
            <div id="content">
                <?php echo $content; ?>
            </div>
            <!-- content -->
        </div>
    </div>
<?php $this->endContent(); ?>