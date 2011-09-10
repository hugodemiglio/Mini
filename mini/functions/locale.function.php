<?php

function __($key){
  $locale_path = realpath('./configuration/locales/');
  if(Configure::read('Mini.locale')){
    $locale = Configure::read('Mini.locale');
    if(file_exists($locale_path.'/'.$locale.'.yml')){
      $locale_data = sfYaml::load($locale_path.'/'.$locale.'.yml');
      if(isset($locale_data[$locale][$key])) return $locale_data[$locale][$key];
    } else {
      die('<strong>Mini: Fatal error</strong> | Missing locale file "'.$locale.'.yml".');
    }
  }
  return $key;
}

?>