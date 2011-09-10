<?php

function __($key){
  $locale_path = realpath('./configuration/locales/');
  if(Configure::read('Mini.locale')){
    $locale = Configure::read('Mini.locale');
    if(file_exists($locale_path.'/'.$locale.'.php')){
      include $locale_path.'/'.$locale.'.php';
      if(isset($locale_data[$key])) return $locale_data[$key];
    }
  }
  return $key;
}

?>