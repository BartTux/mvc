<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 02.09.18
 * Time: 09:54
 */

class Post extends Database
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }
}