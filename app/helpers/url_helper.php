<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 02.09.18
 * Time: 16:09
 */

function redirect(string $page)
{
    header('Location: ' . URL_ROOT . '/' . $page);
}