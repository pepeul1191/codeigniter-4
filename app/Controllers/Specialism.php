<?php

namespace App\Controllers;

use CodeIgniter\HTTP\IncomingRequest;

class Specialism extends BaseController
{
  public function list()
  {
    // data
    $resp = [];
    $status = 200;
    // logic
    try {
      $rs = \Model::factory('App\\Models\\SpeciailismModel', 'classroom')
        ->find_array();
      $resp = json_encode($rs);
    }catch (\Exception $e) {
      $status = 500;
      $resp = json_encode(['ups', $e->getMessage()]);
    }
    // resp
    return $this->response->setStatusCode($status)->setBody($resp);
  }

  public function save()
  {
    // data
    $resp = [];
    $status = 200;
    $request = service('request');
    $payload = json_decode(file_get_contents('php://input'), true);
    $createdIds = [];
    $news = $payload['news'];
		$edits = $payload['edits'];
    $deletes = $payload['deletes'];
    // logic
    \ORM::get_db('classroom')->beginTransaction();
    try {
      // news
      if(count($news) > 0){
				foreach ($news as &$new) {
				  $n = \Model::factory('App\\Models\\SpeciailismModel', 'classroom')->create();
					$n->name = $new['name'];
					$n->save();
				  $temp = [];
				  $temp['tempId'] = $new['id'];
	        $temp['newId'] = $n->id;
	        array_push($createdIds, array(
            'tmp' => $new['id'],
            'id' => $n->id,
          ));
				}
      }
      // edits
      if(count($edits) > 0){
				foreach ($edits as &$edit) {
          $e = \Model::factory('App\\Models\\SpeciailismModel', 'classroom')->find_one($edit['id']);
					$e->name = $edit['name'];
					$e->save();
        }
      }
      // deletes
      if(count($deletes) > 0){
				foreach ($deletes as &$delete) {
			    $d = \Model::factory('App\\Models\\SpeciailismModel', 'classroom')->find_one($delete['id']);
			    $d->delete();
				}
      }
      // commit
      \ORM::get_db('classroom')->commit();
      // response data
      $resp = json_encode($createdIds);
    }catch (\Exception $e) {
      $status = 500;
      $resp = json_encode(['ups', $e->getMessage()]);
    }
    // resp
    return $this->response->setStatusCode($status)->setBody($resp);
  }
}
