<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 02.09.18
 * Time: 00:33
 */

class Controller
{
    public function model(string $model = '')
    {
        require_once '../app/Models/' . $model . '.php';
        return new $model();
    }

    public function view(string $view = '', array $data = [])
    {
        if (file_exists('../app/Views/' . $view . '.php')) {
            require_once '../app/Views/' . $view . '.php';
        } else {
            die('View does not exist');
        }
    }
}