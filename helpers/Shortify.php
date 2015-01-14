<?php
/**
 * Created with love by TXTUP.
 * Date: 14.01.15
 * Time: 20:29
 *
 * @copyright Copyright (c) 2015 "TXTUP OOO" Ltd.
 * @link http://txtup.ru
 * @license http://www.opensource.org/licenses/bsd-license.php New BSD License
 */

/**
 * Some awesome description about class
 *
 * @author Dudarev Ilya <ilya@txtup.ru>
 */
class Shortify
{
    public static function process($content, $link = null, $length = 512)
    {
        $html = '';

        if (strlen($content) > $length)
            $html .= substr($content, 0, strrpos($content, ' ', $length - strlen($content))) . '... ';
        else
            $html .= $content;

        if (isset($link))
            $html .= ' ' . $link;

        return $html;
    }

} 