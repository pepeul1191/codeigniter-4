<?php 

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class BeforeAllFilter implements FilterInterface
{
  public function before(RequestInterface $request, $arguments = null)
  {
    // Do something here
    echo 'XD';
  }

  public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
  {
    // Do something here
  }
}