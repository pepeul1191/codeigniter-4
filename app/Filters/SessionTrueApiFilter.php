<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SessionTrueApiFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if($_ENV['CI_CSRF'] == 'true'){
      $session = \Config\Services::session();
      $status = $session->{'status'};
      $pass = true;
      if($status != null){
        if($status != 'active'){
          $pass = false;
        }
      }else{
        $pass = false;
      }
      if(!$pass){
        $response = \Config\Services::response();
        $response->setStatusCode(500);
        $response->setBody("HTTP 500 Acceso Prohibido - No se encuentra logeado");
        return $response;
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}