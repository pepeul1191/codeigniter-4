<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class CsrfFormFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    if($_ENV['CI_CSRF'] == 'true'){
      $session = \Config\Services::session();
      $constants = new \Config\App();
      if(
        $constants->{'csrfKey'} != $session->{'csrfKey'} 
        || 
        $constants->{'csrfValue'} != $session->{'csrfValue'}
      ){
        http_response_code(500);
        header('Location: ' . '/' . $request->getPath() . '?error=csrf-mismatch');
        exit();
      }
    }
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}