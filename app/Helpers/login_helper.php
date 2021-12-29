<?php

function stylesheetsLogin($constants){
  $stylesheets = [];
  switch ($_ENV['CI_ENVIRONMENT']) {
    case 'development':
      $stylesheets = [
        $constants->{'staticURL'} . 'build/bundle.login',
      ];
      break;
    case 'production':
      $stylesheets = [
        $constants->{'staticURL'} . 'build/bundle.login',
      ];
      break;
    default:
      break;
  }
  return $stylesheets;
}

function javascriptsLogin($constants){
  $javascripts = [];
  switch ($_ENV['CI_ENVIRONMENT']) {
    case 'development':
      $javascripts = [
        $constants->{'staticURL'} . 'vendor/bootstrap/bootstrap.bundle.min',
        $constants->{'staticURL'} . 'build/bundle.login',
      ];
      break;
    case 'production':
      $javascripts = [
        $constants->{'staticURL'} . 'vendor/bootstrap/bootstrap.bundle.min',
        $constants->{'staticURL'} . 'build/bundle.login.min',
      ];
      break;
    default:
      break;
  }
  return $javascripts;
}