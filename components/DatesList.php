<?php
/**
 * Created with love by TXTUP.
 * Date: 14.01.15
 * Time: 18:02
 *
 * @copyright Copyright (c) 2015 "TXTUP OOO" Ltd.
 * @link http://txtup.ru
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

Yii::import('zii.widgets.CPortlet');
Yii::import('news.helpers.Months');

/**
 * Some awesome description about class
 *
 * @author Dudarev Ilya <ilya@txtup.ru>
 */
class DatesList extends CPortlet
{
    public $title = 'Архив новостей';

    protected function renderContent()
    {
        $dates = [];
        $query = Yii::app()->db->createCommand()
            ->select("COUNT(*) count, published_at, YEAR(published_at) year, MONTH(published_at) month")
            ->from('tbl_news_post')
            ->group(['year', 'month'])
            ->order('published_at DESC')
            ->queryAll();

        foreach ($query as $row) {
            $dates[$row['year']][$row['month']] = $row['count'];
        }

        $items = [];

        foreach ($dates as $year => $months) {
            $subitems = [];
            foreach ($months as $month => $count) {
                $subitems[] = ['label' => Months::$names[$month] . "($count)", 'url' => $this->getUrl($year, $month)];
            }
            $items[] = ['label' => $year, 'url' => $this->getUrl($year), 'items' => $subitems];
        }

        $this->widget('zii.widgets.CMenu', ['items' => $items]);
    }

    protected function getUrl($year, $month = null)
    {
        $params = [];
        $params['year'] = $year;

        if (isset($month))
            $params['month'] = sprintf('%02d', $month);

        return Yii::app()->createUrl('/news/post/index', $params);
    }
} 