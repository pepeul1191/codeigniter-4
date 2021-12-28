<?php

function stylesheetsAccess($constants){
  $stylesheets = [];
  switch ($_ENV['CI_ENVIRONMENT']) {
    case 'development':
      $stylesheets = [
        $constants->{'staticURL'} . 'build/bundle.error',
      ];
      break;
    case 'production':
      $stylesheets = [
        $constants->{'staticURL'} . 'build/bundle.error',
      ];
      break;
    default:
      break;
  }
  return $stylesheets;
}