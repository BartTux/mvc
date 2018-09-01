<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 01.09.18
 * Time: 20:46
 */

class Core
{
    protected $currentController = 'Pages';
    protected $currentMethod = 'index';
    protected $params = [];

    public function __construct()
    {
        $this->getUrl();
    }

    public function getUrl()
    {
        echo $_GET['url'];
    }
}