<?php

/**
 * Session Class
 *
 * PHP 5
 *
 * Mini : A very easy php framework. For small applications.  (http://mini.hgbrasil.com)
 * Copyright 2011, Hugo Demiglio
 *
 * @copyright     Copyright 2011, Hugo Demiglio
 * @link          http://mini.hgbrasil.com (Mini)
 */

class Session {
  
/**
 * Database configuration
 *
 * @var array
 * @access public
 */
  var $session = null;
  
/**
 * Construct class
 *
 * @return void
 * @access public
 */
  function __construct(){
    $this->session = $_SESSION;
    
    if(!isset($this->session['Mini.session'])) $this->session['Mini.session'] = 'Session started at '.date("U");
  }
  
/**
 * Write session data
 *
 * @param string $name key of session, string $value for session
 * @return boolean
 * @access public
 */
  function write($name = null, $value){
    $this->session[$name] = $value;
    if(isset($this->session[$name]) AND $this->session[$name] == $value) return true;
    return false;
  }
  
/**
 * Read session data
 *
 * @param string $name key of session
 * @return string session data if success, else boolean false
 * @access public
 */
  function read($name = null){
    if(isset($this->session[$name])) return $this->session[$name];
    return false;
  }
  
/**
 * Delete session data
 *
 * @param string $name key of session
 * @return boolean
 * @access public
 */
  function delete($name = null){
    if(isset($this->session[$name])) unset($this->session[$name]);
    if(!isset($this->session[$name])) return true;
    return false;
  }
  
/**
 * Show or write flash message
 *
 * @param string $data message to write, if null show and delete message
 * @return boolean if $data message is not empty, else string message
 * @access public
 */
  function flash($data = null){
    if(empty($data)){
      if($flash = $this->read('flash')){
        $this->delete('flash');
        return $flash;
      }
    } else {
      if($this->write('flash', $data)) return true;
      return false;
    }
    return '';
  }
  
/**
 * Save session
 *
 * @return void
 * @access public
 */
  function __destruct(){
    $_SESSION = $this->session;
  }
  
}

?>