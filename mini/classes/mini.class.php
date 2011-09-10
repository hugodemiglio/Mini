<?php

/**
 * Mini Class
 *
 * PHP 5
 *
 * Mini : A very easy php framework. For small applications.  (http://mini.hgbrasil.com)
 * Copyright 2011, Hugo Demiglio
 *
 * @copyright     Copyright 2011, Hugo Demiglio
 * @link          http://mini.hgbrasil.com (Mini)
 */

$mini = new Mini();

class Mini {
  
/**
 * Instance for Configure Class
 *
 * @var object
 * @access public
 */
  var $Configure = null;
  
/**
 * Instance for Database Class
 *
 * @var object
 * @access public
 */
  var $Database = null;
  
/**
 * Instance for Request Class
 *
 * @var object
 * @access public
 */
  var $Request = null;
  
/**
 * Instance for Session Class
 *
 * @var object
 * @access public
 */
  var $Session = null;
  
/**
 * Instance for TarTable Class
 *
 * @var object
 * @access public
 */
  var $TarTable = null;
  
/**
 * Construct class
 *
 * @return void
 * @access public
 */
  function __construct(){    
    $this->Configure = Configure::return_data();
    $this->Database = new Database;
    $this->Request = new Request;
    $this->Session = new Session;
    $this->TarTable = new TarTable;
    
    $this->check_salt();
  }

/**
 * Validate salt configuration
 *
 * @return boolean
 * @access public
 */
  function check_salt(){
    if(Configure::read('Mini.security_salt')){
      $salt = Configure::read('Mini.security_salt');
      if(strlen($salt) != 62 OR $salt == $this->Database->salt) echo __('salt_invalid');
      else {
        $this->Database->salt = $salt;
        return true;
      }
    } else {
      echo __('salt_not_found');
    }
    return false;
  }
  
}

?>