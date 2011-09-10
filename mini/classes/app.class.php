<?php

/**
 * App Class
 *
 * PHP 5
 *
 * Mini : A very easy php framework. For small applications.  (http://mini.hgbrasil.com)
 * Copyright 2011, Hugo Demiglio
 *
 * @copyright     Copyright 2011, Hugo Demiglio
 * @link          http://mini.hgbrasil.com (Mini)
 */

class App {
  
/**
 * Packeges included
 *
 * @var array
 * @access public
 */
  var $packages = array();
  
/**
 * Get configure instance
 *
 * @return instance
 * @access public
 */
  function &getInstance() {
    static $instance = array();
    if (!$instance) {
      $instance[0] = new Configure();
    }
    return $instance[0];
  }
  
/**
 * Import file to application (in construction)
 *
 * @return boolean
 * @access public
 */
  function import($package, $component){
    $_this =& Configure::getInstance();
    
    $types = array(
      'plugin' => realpath('./mini/plugins'),
      'helper' => realpath('./mini/helpers'),
    );
    
    if(isset($types[strtolower($package)])){
      $file = $types[strtolower($package)].'/'.strtolower($component).'.'.strtolower($package).'.php';
      
      if(file_exists($file)) {
        include $file;
        $_this->packages[] = ucfirst($component).'.'.strtolower($package);
        return true;
      }
      else echo '<strong>Mini: Package error</strong> | Missing file ('.$file.')';
      
    }
    
    return false;
  }

/**
 * Return all packeges included
 *
 * @return array
 * @access public
 */
  function return_packages(){
    $_this =& Configure::getInstance();
    
    if(count($_this->packages) > 0) return $_this->packages;
    else return array();
  }
  
}

?>