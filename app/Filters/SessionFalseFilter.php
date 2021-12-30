<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class SessionFalseFilter implements FilterInterface
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
      if($pass){
        header('Location: ' . '/');
        exit();
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}