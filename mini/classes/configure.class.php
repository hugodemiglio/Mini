<?php

class Configure {
  var $data = array();
  
  function &getInstance() {
		static $instance = array();
		if (!$instance) {
			$instance[0] = new Configure();
		}
		return $instance[0];
	}
  
  function read($data_name){
    $_this =& Configure::getInstance();
    if(isset($_this->data[$data_name])) return $_this->data[$data_name];
    return false;
  }
  
  function write($data_name, $content){
    $_this =& Configure::getInstance();
    $_this->data[$data_name] = $content;
  }
  
  function delete($data_name){
    $_this =& Configure::getInstance();
    if(isset($_this->data[$data_name])){
      unset($_this->data[$data_name]);
      return true;
    }
    return false;
  }
  
  function return_data(){
    $_this =& Configure::getInstance();
    return $_this->data;
  }
  
}

?>