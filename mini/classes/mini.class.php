<?php

$mini = new Mini();

class Mini {
  var $Configure = null;
  var $Database = null;
  var $Request = null;
  var $Session = null;
  var $TarTable = null;
  
  function __construct(){    
    $this->Configure = Configure::return_data();
    $this->Database = new Database;
    $this->Request = new Request;
    $this->Session = new Session;
    $this->TarTable = new TarTable;
    
    $this->check_salt();
  }
  
  function check_salt(){
    if(Configure::read('Mini.security_salt')){
      $salt = Configure::read('Mini.security_salt');
      if(strlen($salt) != 62 OR $salt == $this->Database->salt) echo __('salt-invalid');
      else $this->Database->salt = $salt;
    } else {
      echo __('salt-not-found');
    }
  }
  
}

?>