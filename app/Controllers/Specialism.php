<?php

namespace App\Controllers;

class Specialism extends BaseController
{
  public function list()
  {
    $resp = [];
    $status = 200;
    try {
      $rs = \Model::factory('App\\Models\\SpeciailismModel', 'classroom')
        ->find_array();
      $resp = json_encode($rs);
    }catch (Exception $e) {
      $status = 500;
      $resp = json_encode(['ups', $e->getMessage()]);
    }
    return $this->response->setStatusCode($status)->setBody($resp);
  }
}
