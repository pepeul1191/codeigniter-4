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
    $data = [];
    $status = 404;
    switch ($errorCode) {
      case '404':
        $data = [
          'number' => 404,
          'message' => 'Archivo no encontrado',
          'description' => 'La página que busca no se encuentra en el servidor',
          'icon' => 'fa fa-exclamation-triangle'
        ];
        $status = 404;
        break;
      case '501':
        $data = [
          'number' => 501,
          'message' => 'Página en Contrucción',
          'description' => 'Lamentamos el incoveniente, estamos trabajando en ello.',
          'icon' => 'fa fa-code-fork'
        ];
        $status = 500;
      case '505':
        $data = [
          'number' => 505, 
          'message' => 'Acceso restringido',
          'description' => 'Necesita estar logueado.',
          'icon' => 'fa fa-ban'
        ];
        $status = 501;
      case '8080':
        $data = [
          'number' => 8080, 
          'message' => 'Tiempo de la sesion agotado',
          'description' => 'Vuelva a ingresar al sistema.',
          'icon' => 'fa fa-clock-o'
        ];
        $status = 502;
      default:
        $data = [
          'number' => 404,
          'message' => 'Archivo no encontrado',
          'description' => 'La página que busca no se encuentra en el servidor',
          'icon' => 'fa fa-exclamation-triangle'
        ];
        $status = 404;
        break;
    }
    $locals = [
      'constants' => $this->constants,
      'number' => $data['number'],
      'message' => $data['message'],
      'description' => $data['description'],
      'icon' => $data['icon'],
    ];
    $this->response->setStatusCode(404);
    return view('404', $locals);
  }
}
