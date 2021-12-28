<?php

function stylesheetsHome($constants){
  $stylesheets = [];
  switch ($_ENV['CI_ENVIRONMENT']) {
    case 'development':
      $stylesheets = [
        $constants->{'staticURL'} . 'build/bundle.app',
      ];
      break;
    case 'production':
      $stylesheets = [
        $constants->{'staticURL'} . 'build/bundle.app',
      ];
      break;
    default:
      break;
  }
  return $stylesheets;
}

function javascriptsHome($constants){
  $javascripts = [];
  switch ($_ENV['CI_ENVIRONMENT']) {
    case 'development':
      $javascripts = [
        $constants->{'staticURL'} . 'vendor/bootstrap/bootstrap.bundle.min',
        $constants->{'staticURL'} . 'build/bundle.app',
      ];
      break;
    case 'production':
      $javascripts = [
        $constants->{'staticURL'} . 'vendor/bootstrap/bootstrap.bundle.min',
        $constants->{'staticURL'} . 'build/bundle.app.min',
      ];
      break;
    default:
      break;
  }
  return $javascripts;
}