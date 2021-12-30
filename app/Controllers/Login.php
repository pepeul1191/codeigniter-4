<?php

namespace App\Controllers;

use  App\Libraries\RandomLib;

class Login extends BaseController
{
  public function index()
  {
    $status = 200;
    // if error
    $error = $this->request->getVar('error');
    if(isset($error)){
      $status = 500;
    }
    // session
    $this->session->set('csrfKey', $this->constants->{'csrfKey'});
    $this->session->set('csrfValue', $this->constants->{'csrfValue'});
    // response
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
    if($user == 'admin' && $password == '123'){
      $this->session->set('csrfKey', \App\Libraries\RandomLib::stringNumber(20));
      $this->session->set('csrfValue', \App\Libraries\RandomLib::stringNumber(30));
      $this->session->set('status', 'active');
      $this->session->set('user', $user);
      $this->session->set('name', 'Pepe Valdivia');
      $this->session->set('img', $this->constants->{'staticURL'} . 'assets/img/default-user.png');
      $this->session->set('time', date('Y-m-d H:i:s'));
      header('Location: ' . '/');
      exit();
    }else{
      header('Location: ' . '/' . $this->request->getPath() . '?error=user-pass-mismatch');
      exit();
    }
  }

  public function demo()
  {
    echo 'demo';
  }

  public function logout()
  {
    $this->session->destroy();
    header('Location: ' . '/login');
    exit();
  }
}
