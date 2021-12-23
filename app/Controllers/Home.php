<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // var_dump($this->constants);
        return view('welcome_message');
    }

    public function demo()
    {
        echo 'demo';
    }
}
