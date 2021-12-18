<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    var_dump(new \Config\App());exit();
    return view('welcome_message');
  }

  public function demo()
  {
    echo 'demo';
  }
}
