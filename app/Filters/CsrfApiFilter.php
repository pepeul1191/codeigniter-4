<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CsrfApiFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if($_ENV['CI_CSRF'] == 'true'){
      $session = \Config\Services::session();
      $sessionCsrfKey = $session->{'csrfKey'};
      $sessionCsrfValue = $session->{'csrfValue'};
      $pass = true;
      if($request->header($sessionCsrfKey) != null){
        if(
          $request->header($sessionCsrfKey)->getValue() != $sessionCsrfValue
        ){
          $pass = false;
        }
      }else{
        $pass = false;
      }
      if(!$pass){
        $response = \Config\Services::response();
        $response->setStatusCode(500);
        $response->setBody("HTTP 500 Acceso Prohibido");
        return $response;
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}