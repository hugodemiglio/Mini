<?php

/**
 * Request Class
 *
 * PHP 5
 *
 * Mini : A very easy php framework. For small applications.  (http://mini.hgbrasil.com)
 * Copyright 2011, Hugo Demiglio
 *
 * @copyright     Copyright 2011, Hugo Demiglio
 * @link          http://mini.hgbrasil.com (Mini)
 */

class Request {
  
/**
 * Post data received
 *
 * @var array
 * @access public
 */
  var $post;
  
/**
 * Get data received
 *
 * @var array
 * @access public
 */
  var $get;
  
/**
 * Server data received
 *
 * @var array
 * @access public
 */
  var $server;
  
/**
 * Construct class
 *
 * @return void
 * @access public
 */
  function __construct(){
    $this->post = $this->protect($_POST);
    $this->get = $this->protect($_GET);
    $this->server = $_SERVER;
  }
  
/**
 * Verifies if there Post
 *
 * @return boolean
 * @access public
 */
  function isset_post(){
    if(is_array($this->post) AND count($this->post) > 0) return true;
    return false;
  }
  
/**
 * Return Get url mode
 *
 * @return string
 * @access public
 */
  function returnGets(){
    if(is_array($this->get) AND count($this->get) > 0){
      $i = 1; foreach($this->get as $key => $value){
        if($i == 1) $return = '?';
        $return .= $key.'='.$value;
        if($i != count($this->get)) $return .= '&';
        $i++;
      }
      return $return;
    }
    return '';
  }
  
/**
 * Send HTTP Post
 *
 * @param array $post_data to post, string $url destination
 * @return string of response HTTP
 * @access public
 */
  function send_post($post_data = array(), $url = null){
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_POST, 1 );
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    $return = curl_exec($ch);

    if (curl_errno($ch)) {
    return curl_error($ch);
    }
    curl_close($ch);
    return $return;
  }
  
/**
 * Scape MySQL string on array data
 *
 * @param array $array to scape
 * @return string of response HTTP
 * @access public
 */
  function protect($array = array()){
    if(is_array($array)) foreach($array as $key => $value){
      $array[$key] = mysql_real_escape_string($value);
    }
    return $array;
  }
  
/**
 * Redirect to page
 *
 * @param string $location to redirect, string $method header/meta
 * @return void
 * @access public
 */
  function redirect($location = '', $method = 'header'){
    if($method == 'header') header("Location: ".$location);
    else echo '<meta http-equiv="refresh" content="0;url='.$location.'" />';
  }
  
}

?>