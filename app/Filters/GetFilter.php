<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class GetFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if($request->getMethod() != 'get'){
      $response = \Config\Services::response();
      $response->setStatusCode(403);
      $response->setBody("HTTP 403 Acceso Prohibido");
      return $response;
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {

  }
}