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
        $url = $this->getUrl();

        if (file_exists('../app/Controllers/' . ucfirst($url[0]) . '.php')) {
            $this->currentController = ucfirst($url[0]);
            unset($url[0]);
        }

        require_once '../app/Controllers/' . $this->currentController . '.php';
        $this->currentController = new $this->currentController();
    }

    public function getUrl()
    {
        if (isset($_GET['url'])) {
            $url = rtrim($_GET['url'], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode('/', $url);
            return $url;
        }
    }
}