<?php

namespace App\Controllers;

class User extends BaseController
{
  public function info()
  {
    $status = 200;
    $resp = json_encode([
      'user' => $this->session->get('user'),
      'name' => $this->session->get('name'),
      'img' => $this->session->get('img'),
    ]);
    return $this->response->setStatusCode($status)->setBody($resp);
  }
}
