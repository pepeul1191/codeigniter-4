<?php

namespace App\Controllers;

use CodeIgniter\HTTP\Request;
use CodeIgniter\API\ResponseTrait;

class Error extends BaseController
{
  use ResponseTrait;

  public function __construct()
  {
    // pass
  }

  public function go404()
  {
    if($this->request->getMethod() == 'get'){
      header('Location: ' . '/error/access/404');
      exit();
    }else{
      http_response_code(404);
      echo '404: Recurso no encontrado';
      exit();
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
        break;
      case '505':
        $data = [
          'number' => 505, 
          'message' => 'Acceso restringido',
          'description' => 'Necesita estar logueado.',
          'icon' => 'fa fa-ban'
        ];
        $status = 501;
        break;
      case '8080':
        $data = [
          'number' => 8080, 
          'message' => 'Tiempo de la sesion agotado',
          'description' => 'Vuelva a ingresar al sistema.',
          'icon' => 'fa fa-clock-o'
        ];
        $status = 502;
        break;
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
    // response
    helper('Helpers\error');
    $locals = [
      'title' => 'Error',
      'href' => '/error/access',
      'constants' => $this->constants,
      'number' => $data['number'],
      'message' => $data['message'],
      'description' => $data['description'],
      'icon' => $data['icon'],
      'stylesheets' => stylesheetsAccess($this->constants),
      'javascripts' => [],
    ];
    $this->response->setStatusCode($status);
    return view('404', $locals);
  }
}
