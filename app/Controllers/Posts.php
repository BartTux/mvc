<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 15.10.18
 * Time: 12:02
 */

class Posts extends Controller
{
    public function index()
    {
        $data = [];

        $this->view('posts/index', $data);
    }
}