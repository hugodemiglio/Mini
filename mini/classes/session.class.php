<?php

class Session {
  var $session = null;
  
  function __construct(){
    $this->session = $_SESSION;
    
    if(!isset($this->session['Mini.session'])) $this->session['Mini.session'] = 'Session started at '.date("U");
  }
  
  function write($name = null, $value){
    $this->session[$name] = $value;
    if(isset($this->session[$name]) AND $this->session[$name] == $value) return true;
    return false;
  }
  
  function read($name = null){
    if(isset($this->session[$name])) return $this->session[$name];
    return false;
  }
  
  function delete($name = null){
    if(isset($this->session[$name])) unset($this->session[$name]);
    if(!isset($this->session[$name])) return true;
    return false;
  }
  
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
  
  function __destruct(){
    $_SESSION = $this->session;
  }
  
}

?>