<?php
/**
 * Created by PhpStorm.
 * User: bartek
 * Date: 01.09.18
 * Time: 21:15
 */

class Pages extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if(isLoggedIn()) {
            redirect('posts');
        }

        $data = [
            'title' => 'SharePosts',
            'description' => 'Simple social network built on the MichaelMVC PHP Framework'
        ];

        $this->view('pages/index', $data);
    }

    public function about()
    {
        $data = [
            'title' => 'About Us',
            'description' => 'App to share posts with other users'
        ];

        $this->view('pages/about', $data);
    }
}