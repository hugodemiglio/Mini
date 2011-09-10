<?php

/**
 * Configure Class
 *
 * PHP 5
 *
 * Mini : A very easy php framework. For small applications.  (http://mini.hgbrasil.com)
 * Copyright 2011, Hugo Demiglio
 *
 * @copyright     Copyright 2011, Hugo Demiglio
 * @link          http://mini.hgbrasil.com (Mini)
 */

class Configure {
  
/**
 * Data configuration
 *
 * @var array
 * @access public
 */
  var $data = array();
  
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
 * Read configuration data
 *
 * @param string $data_name key of configuration
 * @return string Configuration data
 * @access public
 */
  function read($data_name){
    $_this =& Configure::getInstance();
    if(isset($_this->data[$data_name])) return $_this->data[$data_name];
    return false;
  }
  
/**
 * Write configuration data
 *
 * @param string $data_name key of configuration, string $content for configuration
 * @return void
 * @access public
 */
  function write($data_name, $content){
    $_this =& Configure::getInstance();
    $_this->data[$data_name] = $content;
  }
  
/**
 * Delete configuration data
 *
 * @param string $data_name key of configuration
 * @return boolean
 * @access public
 */  
  function delete($data_name){
    $_this =& Configure::getInstance();
    if(isset($_this->data[$data_name])){
      unset($_this->data[$data_name]);
      return true;
    }
    return false;
  }
  
/**
 * Read all configuration data
 *
 * @return array configuration data
 * @access public
 */  
  function return_data(){
    $_this =& Configure::getInstance();
    return $_this->data;
  }
  
}

?>