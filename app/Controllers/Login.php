<?php

namespace App\Controllers;

class Login extends BaseController
{
  public function index()
  {
    $this->session->set('csrfKey', $this->constants->{'csrfKey'});
    $this->session->set('csrfValue', $this->constants->{'csrfValue'});
    $status = 200;
    helper('Helpers\login');
    $locals = [
      'title' => 'Inicio',
      'href' => '/login',
      'constants' => $this->constants,
      'session' => $this->session,
      'stylesheets' => stylesheetsLogin($this->constants),
      'javascripts' => javascriptsLogin($this->constants),
    ];
    $this->response->setStatusCode($status);
    return view('login', $locals);
  }

  public function access()
  {
    $user = $this->request->getPost('user');
    $password = $this->request->getPost('password');
    
  }

  public function demo()
  {
    echo 'demo';
  }
}
