<?php

namespace App\Controllers;

class Home extends BaseController
{
  public function index()
  {
    // var_dump($this->constants);
    $status = 200;
    helper('Helpers\home');
    $locals = [
      'title' => 'Inicio',
      'href' => '/',
      'constants' => $this->constants,
      'stylesheets' => stylesheetsHome($this->constants),
      'javascripts' => javascriptsHome($this->constants),
    ];
    $this->response->setStatusCode($status);
    return view('home', $locals);
  }

  public function demo()
  {
    echo 'demo';
  }

  public function user()
  {
    $status = 200;
    $locals = [
      'title' => 'Inicio',
      'href' => '/login',
      'constants' => $this->constants,
      'session' => $this->session,
    ];
    $this->response->setStatusCode($status);
    return view('user', $locals);
  }
}
