<?php

namespace Config;

use CodeIgniter\Config\BaseConfig;

class MyConfig extends BaseConfig
{
  public $siteName  = 'My Great Site';
  public $siteEmail = 'webmaster@example.com';
  function __construct() {
    parent::__construct();
    $this->siteName = 'XD';
  }
}