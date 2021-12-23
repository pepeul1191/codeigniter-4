<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\API\ResponseTrait;

class Error extends BaseController
{
  use ResponseTrait;

  public function go404()
  {
    if($this->request->getMethod() == 'get'){
      header('Location: ' . '/error/access/404');
      exit();
    }else{
      $this->response->setStatusCode(404);
      echo '404: Recurso no encontrado';
    }
  }

  public function access($errorCode)
  {
    $this->response->setStatusCode(404);
    return view('404');
  }
}
