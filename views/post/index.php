<?php
/** @var  $this Controller */
/** @var $dataProvider CArrayDataProvider */

Yii::import('news.helpers.Months');
Yii::import('news.helpers.Shortify');

$params = $this->actionParams;

$title = 'Новости';

if (isset($params['month'])) {
    $title .= ' за ' . Months::$names[intval($params['month'])];

    if (isset($params['year']))
        $title .= ' ' . $params['year'] . ' года';

} elseif (isset($params['year']))
    $title .= ' за ' . $params['year'] . ' год';


$this->pageTitle = $title;

$this->breadcrumbs = array(
    $this->pageTitle,
);
?>

<h1><?= $this->pageTitle ?></h1>

<?php $this->widget('zii.widgets.CListView', array(
    'dataProvider' => $dataProvider,
    'itemView' => '_view',
    'template' => "{items}\n{pager}",
)); ?>
